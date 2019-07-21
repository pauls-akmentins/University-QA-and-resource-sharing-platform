@include('partials\_head')
    <body>
        @include('partials\_navigation')

        @include('partials\_message')

        <div class="container main-container">

            @yield('content')

            @include('partials\_footer')
        </div>
        
        @yield('scripts')
    </body>
</html>