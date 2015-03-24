<!DOCTYPE html>
<html lang="pt">
    @include('layout.header')
    
    
    <body>
        @include('layout.topnav')
        
        @yield('content')
        
        @include('layout.footer')

        <script src="{{elixir('js/a.js')}}"></script>

        @yield('js')
    </body>
</html>