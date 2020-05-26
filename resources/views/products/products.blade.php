@extends('main.app')

@section('content')
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
@endsection

<script>
    $(document).ready( function () {
        $('#productsTable').DataTable({
                responsive: true
            }
        );
    });

</script>