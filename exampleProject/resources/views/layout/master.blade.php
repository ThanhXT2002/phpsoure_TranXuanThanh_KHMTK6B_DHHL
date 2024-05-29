<!DOCTYPE html>
<html>
    <head>
        @include('layout.head')
    </head>
    <body>  
        <div id="wrapper">
            @include('layout.sidebar')
            <div id="page-wrapper" class="gray-bg">
                @include('layout.nav')
                
                @yield('content')

                @include('layout.footer')
            </div>
            @include('layout.rightside')
        </div>
        @include('layout.script')
    </body>
</html>
