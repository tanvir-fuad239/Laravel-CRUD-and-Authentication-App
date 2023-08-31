@include('frontend.layouts.header')
@include('frontend.layouts.navbar')
@include('frontend.layouts.side-brand')
@include('frontend.layouts.main-menu')

 

    <main>

        @yield('main-content')

    </main>
   
    
    
    @include('frontend.layouts.footer-top')
    
    @include('frontend.layouts.copyright')
    

@include('frontend.layouts.footer')
