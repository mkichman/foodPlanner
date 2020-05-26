
<div class="form-group py-4 form-inline">
    <label for="recipeNameSum" class="col-lg-2">Nazwa przepisu</label>
    <input type="text" class="form-control col-lg-6" id="recipeNameSum" disabled>
</div>
<div class="form-group py-4 form-inline">
    <label for="select" class="col-lg-2">Kategorie</label>
    <span id="selectBox" class="card p-2"></span>
</div>

<div class="form-group py-4 form-inline">
    <label for="productsSum" class="col-lg-2">Produkty</label>
    <div id="productsSum" class="card col-lg-6"></div>
</div>

<div class="form-group py-4 form-inline">
    <label for="preparationSum" class="col-lg-2">Sposób przygotowania</label>
    <textarea class="form-control col-lg-6" id="preparationSum" disabled></textarea>
</div>

@section('summaryScript')
        $('#summary-tab').on('click', () => {

            $('#productsSum').html('');
            $('#selectBox').html('');

            recipeName = $('input[name="recipeName"]');
            productsList = document.getElementById('productsList');
            clonedProductsList = productsList.cloneNode(true);
            preparation = $('#preparationInpt')[0].value;

            categories = $('#select').find(':selected').get();

            $.each(categories,(key, val) => {
                $('#selectBox').append(' ' + val.textContent + ',');

            });

            $('#recipeNameSum').val(recipeName[0].value);
            $('#productsSum').html(clonedProductsList);
            $('#preparationSum').html(preparation);
        });
@endsection