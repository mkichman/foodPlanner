@include('main.header')

<main class="py-4">

<div class="cont]\
<div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <table class="table" id="productsTable">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nazwa</td>
                            <td>Url</td>
                            <td>Kcal</td>
                            <td>Białko</td>
                            <td>Węglowodany</td>
                            <td>Tłuszcz</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $row => $key)
                        <tr>
                            @foreach($key as $sth => $ss)
                                <td> {{$ss}}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</main>
<script>
    $(document).ready( function () {
        $('#productsTable').DataTable({
                responsive: true

            }
        );
    });

</script>