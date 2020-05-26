@extends('main.app')

@section('content')

            @if(isset($actionMessage))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">&times;</a>
                    {{ $actionMessage }}
                </div>
            @endif

            {!! Form::open(['url' => 'addCategory']) !!}
                <div class="form-group text-center">
                    {!! Form::text('categoryName', '',['class' => 'form-control col-lg-6 mx-auto py-4', 'placeholder' => 'Wpisz nazwę kategorii']) !!}
                    <br>
                    {!! Form::submit('Dodaj', ['class' => 'btn btn-outline-secondary btn-lg btn-block col-lg-3 mx-auto']) !!}
                </div>
            {!! Form::close() !!}




            <div class="alert-info py-7">
                Dodać tutaj przepisy do przypisania do dodanej kategorii
            </div>
@endsection