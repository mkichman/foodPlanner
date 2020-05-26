
<div class="form-group text-center py-4">
{{--    {!! Form::text('searchProduct', '', ['class' => 'form-control col-lg-6 mx-auto', 'placeholder' => 'Przeszukaj bazę..']) !!}--}}
{{--    {!! Form::submit('Szukaj', ['class' => 'form-control btn btn-outline-secondary col-lg-6 btn-block mx-auto mt-3']) !!}--}}

    <input type="text" name="searchInput" id="searchInput" class="form-control col-lg-6 mx-auto" placeholder="Przeszukaj bazę...">
    <input typpe="button" id="searchBtn" class="form-control btn btn-outline-secondary col-lg-6 btn-block mx-auto mt-3" value="Szukaj">
</div>

<table class="table" id="productsTable">
    <thead>
    <tr>
        <td hidden>Id</td>
        <td>Nazwa</td>
        <td>Kcal</td>
    </tr>
    </thead>
    <tbody>
{{--    @if(!empty($products))--}}
{{--        @foreach($products as $row => $key)--}}
{{--            <tr data-toggle="modal" data-target="#modal">--}}
{{--                @foreach($key as $elem => $child)--}}
{{--                    <td {{ $elem === 'id' ? 'hidden id=' . $child : '' }}> {{$child}}</td>--}}
{{--                @endforeach--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    @endif--}}
    </tbody>
</table>
