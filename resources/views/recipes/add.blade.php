@extends('main.app')

@section('rightSidebar')
    <div id="sidebarProducts">
        <ul class="list-group list-group-flush" id="productsList">
        </ul>
    </div>
@endsection

@section('content')
    <ul class="nav nav-tabs" id="recipesTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active show" id="name-tab" href="#name" data-toggle="tab" role="tab" aria-controls="name" aria-selected="true">Nazwa</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="products-tab" href="#products" data-toggle="tab" role="tab" aria-controls="products" aria-selected="false">Produkty</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="preparation-tab" href="#preparation" data-toggle="tab" role="tab" aria-controls="preparation" aria-selected="false">Przygotowanie</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="summary-tab" href="#summary" data-toggle="tab" role="tab" aria-controls="summary" aria-selected="false">Podsumowanie</a>
        </li>

        <li>
            <button type="button" class="btn btn-outline-secondary btn-sm" id="addRecipeBtn" onclick="FoodPlanner_AddRecipe.addRecipe()">Dodaj</button>
        </li>
    </ul>




{!! Form::open(['id' => 'addRecipeForm']) !!}
    <div class="tab-content" id="recipesTabsContent">

        <div class="tab-pane fade show active" id="name" role="tabpanel" aria-labelledby="name-tab">
            @include('recipes.form.name')
        </div>
        <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
            @include('recipes.form.products')
        </div>
        <div class="tab-pane fade" id="preparation" role="tabpanel" aria-labelledby="preparation-tab">
            @include('recipes.form.preparation')
        </div>
        <div class="tab-pane fade" id="summary" role="tabpanel" aria-labelledby="summary-tab">
            @include('recipes.form.summary')
        </div>
    </div>

@endsection

@section('script')
    <script>
    var FoodPlanner_AddRecipe = {
        table: null,
        counter: 0,
        modal: $('#modal'),

        init: () => {
            $('#select').selectpicker();
            FoodPlanner_AddRecipe.initTabsBootstrap();
            FoodPlanner_AddRecipe.searchProduct();
            FoodPlanner_AddRecipe.openModal();
            FoodPlanner_AddRecipe.loadProductsList();


        },
        loadTable: () => {
            FoodPlanner_AddRecipe.table = $('#productsTable').DataTable({

                'retrieve': true,
                'processing': true,
                'serverSide': true,
                'searching': false,
                'ajax': {
                    'url': '/searchProduct',
                    'type': 'POST',
                    'data': {
                        'searchProduct': function() { return $("input[name='searchInput']")[0].value }
                    }
                },
                "columnDefs": [
                        {
                            "targets": [ 0 ],
                            "visible": false,
                        }
                    ],
            });
            FoodPlanner_AddRecipe.searchProductVal = null;
        },
        initTabsBootstrap: () => {
            $('#recipesTabs a').on('click', function (e) {
                e.preventDefault();
                $(this).tab('show')
            });
        },
        searchProduct: () => {
            $('#searchBtn').on('click', () => {
                if ( $.fn.dataTable.isDataTable( '#productsTable' ) )
                {
                    FoodPlanner_AddRecipe.table.ajax.reload();
                }
                else {
                    FoodPlanner_AddRecipe.loadTable();
                }
            });
        },

        openModal: () => {
            // show modal
            $('#productsTable tbody').on('click', 'tr', function () {
                FoodPlanner_AddRecipe.modal.modal();
                let data = FoodPlanner_AddRecipe.table.row( this ).data();
                let productLabel = '<label for="productQty" id="productName" class="mb-3">'+ data[1] +'</label>';
                let productQty =
                    '<input type="text" id="productQty" data-id="' + data[0] + '" name="productQty" placeholder="Podaj ilość w gramach" class="form-control col-lg-6 mx-auto"> ' +
                    '<div id="productKcal" class="text-right mt-4  mt-md-0"></div>';
                let modalConfirmBtn = FoodPlanner_AddRecipe.modal.find('.modal-footer .btn-primary');

                FoodPlanner_AddRecipe.modal.find('.modal-title').text('Dodaj produkt');
                FoodPlanner_AddRecipe.modal.find('.modal-body').html(productLabel + productQty ).addClass('text-center');

                modalConfirmBtn[0].id = 'modalAddProduct';

                let productQtyInput = $("input[name='productQty']");

                // display kcal for given amount
                productQtyInput.on('change keydown keyup', function (value)
                {
                    if(!$.isNumeric(value.key) && value.key !== 'Backspace')
                    {
                        return;
                    }

                    let productQtyVal = productQtyInput.val();
                    let productQtyKcal = productQtyVal / 100 * data[2];
                    $("#productKcal").html(productQtyKcal + ' kcal');
                } );

                // add product to localstorage
                modalConfirmBtn.click(function () {
                    let productQtyInput = $("input[name='productQty']");

                    counter = localStorage.getItem('counter');

                    if(counter === null)
                    {
                        localStorage.setItem('counter', 0);
                        counter = 0;
                    }

                    localStorage.setItem('productId' + counter, productQtyInput[0].dataset.id);
                    localStorage.setItem('productQty' + counter, productQtyInput.val());
                    localStorage.setItem('productKcal' + counter, document.querySelector("#productKcal").textContent);
                    localStorage.setItem('productName' + counter, document.querySelector("#productName").textContent);

                    localStorage.removeItem('counter');
                    localStorage.setItem('counter', ++counter);

                    FoodPlanner_AddRecipe.loadProductsList();
                    FoodPlanner_AddRecipe.modal.modal('hide');
                });
            });

        },
        loadProductsList: () => {
            var iter = 0;

            productsList = $('#productsList');
            productsList.text('');

            for(i = 0; i <= iter; i++)
            {
                productId = localStorage.getItem('productId' + iter);
                productQty = localStorage.getItem('productQty' + iter);
                productName = localStorage.getItem('productName' + iter);
                productKcal = localStorage.getItem('productKcal' + iter);

                if(productId === null)
                {
                    break;
                }
                productsContent = FoodPlanner_AddRecipe.productsListDecorator(productName) +
                        FoodPlanner_AddRecipe.productsSumDecorator(productQty + ' gram = ' + productKcal);

                productsList.append(productsContent);
                iter++;
            }

        },
        productsListDecorator: (item) => {
            return '<li class="list-group-item text-center">' + item;
        },
        productsSumDecorator: (item) => {
            return '<p class="text-center"><small><em>' + item + '</em></small></p></li>';
        },
        addRecipe: () => {

            form = $('#addRecipeForm').serialize();
            // form +=
            form += '&preparation=' + encodeURIComponent($('#preparationInpt')[0].value);



            var iter = 0;

            let productsForm = '';

            for(i = 0; i <= iter; i++)
            {
                productId = localStorage.getItem('productId' + iter);
                productQty = localStorage.getItem('productQty' + iter);

                if(productId === null)
                {
                    break;
                }

                productsForm += '&productId'+iter+'=' + productId;
                productsForm += '&productQty'+iter+'=' + productQty;

                iter++;
            }

            form += productsForm;

            $.ajax({
                url: '/createRecipe',
                method: 'POST',
                data: form
            }).done(() => {
                // localStorage.clear();
                $('#responseBox').text('Recipe added successfully!');
                // $('#responseBox').css('display', 'flex');
                $('#responseBox').show(500).delay(2000).hide(500);

            });
        }
    };

FoodPlanner_AddRecipe.init();

@yield('summaryScript')

    </script>
@endsection