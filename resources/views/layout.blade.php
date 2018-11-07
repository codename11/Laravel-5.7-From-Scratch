<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield("title", "Laracast")</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div id="app">  
            @include("navbar")
            
            <div class="container">
                @yield("content")
            </div>
    </div>
    </body>
</html>
