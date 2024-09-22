<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @vite('resources/css/app.css')
        <title>@yield('Title')</title>
    </head>

    <body>

        @yield('Css')

            @include('layout.navbar')

                @yield('Content')

            @include('layout.footer')

        @yield('Js')

    </body>

</html>
