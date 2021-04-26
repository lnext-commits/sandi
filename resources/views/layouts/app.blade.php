<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{$title}}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            .cur {
                cursor: pointer
            }
            .menu0 {
                margin-left: 50px;
            }
            .menu1 {
                margin-left: 150px;
            }
            .menu2 {
                margin-left: 250px;
            }
            .product0 {
                margin-left: 75px;
            }
            .product1 {
                margin-left: 175px;
            }
            .product2 {
                margin-left: 275px;
            }
        </style>
    </head>
    <body>
    @yield('content')
    </body>
</html>
