@extends('main.app')

@section('content')
            <a href="{{ url('/addRecipe') }}" class="btn btn-outline-secondary btn-block">Dodaj przepis</a>
            <a href="{{ url('/addCategory') }}" class="btn btn-outline-secondary btn-block">Dodaj kategorie</a>
@endsection
