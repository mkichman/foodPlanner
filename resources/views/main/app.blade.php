@include('main.partials.header')
@include('main.partials.navbar')
@include('main.partials.modal')

<body>
    <div id="mobileSidebar" class="collapse">
{{--        @yield('rightSidebar')--}}
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div id="leftSidebar" class="col d-none d-md-block">
                <div id="responseBox" class="shadow"></div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                     @yield('content')
                    </div>
                </div>
             </div>
            <div class="col d-none d-md-block">
                <div class="bg-white shadow-sm" id="rightSidebarChevronWrapper">
                    <span class="fa fa-chevron-left" data-toggle="collapse" href="#rightSidebar" aria-expanded="false" aria-controls="rightSidebar" id="sidebarRightIcon"></span>
                </div>
                    <nav id="rightSidebar" class="bg-white shadow-sm collapse">
                    @yield('rightSidebar')
                </nav>
            </div>
        </div>
    </div>
</body>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let rightWrapper = $('#rightSidebarChevronWrapper');
        rightWrapper.click(() => {
            let rightPosition = rightWrapper.css('right');

            if(rightPosition === '0px')
            {
                rightWrapper.css('right', '330px');
            } else
            {
                rightWrapper.css('right', '0');
            }
        });

    </script>
    @yield('script')
</html>