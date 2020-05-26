{{--@include('main.header');--}}

@extends('main.app')

@section('content')
{{--            @if (Route::has('login'))--}}
                <div class="top-right links">
{{--                    @auth--}}
{{--                        <a href="{{ url('/home') }}">Home</a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}">Login</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
                </div>
{{--            @endif--}}

            <div class="content">
                <div class="title m-b-md">

                </div>

                <div class="links">
                    <a href="{{ route('products') }}">Produkty</a>
                    <a href="{{ route('recipes') }}">Przepisy</a>
                    <a href="#">Plan</a>
                </div>
            </div>
@endsection
