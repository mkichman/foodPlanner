
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/products') }}">
           Produkty
        </a>
        <a class="navbar-brand" href="{{ url('/recipes') }}">
           Przepisy
        </a>
        <a class="navbar-brand" href="{{ url('/') }}">
            Plan
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobileSidebar"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

    </div>
</nav>