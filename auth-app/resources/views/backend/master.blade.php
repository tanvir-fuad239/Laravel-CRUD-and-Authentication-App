@include('backend.includes.header')
@include('backend.includes.top-nav')


       
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('backend.includes.side-nav')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('main-content')
                </main>
            @include('backend.includes.copyright')
               
            </div>
        </div>
@include('backend.includes.footer')
