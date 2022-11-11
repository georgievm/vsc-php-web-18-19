<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Comfortaa" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div id="overlayer"></div>
        <span class="loader">
            <span class="loader-inner"></span>
        </span>

        <header>
            @include('inc.nav')
        </header>

        <main class="py-4" style="background-color: transparent !important;">
            @yield('content')
        </main>

        <footer class="bg-dark text-center text-secondary">
            <div class="footer-main d-inline-block bg-dark">
                {{__('auth.Made_by')}} <span class="text-success">KvotheBG</span> & <span class="text-success">Martin G</span>, 2019
            </div>
            <div style="position: relative !important; top: -27px;">
                Photos and icons: <a target="_blank" class="text-success" href="https://pixabay.com">Pixabay</a> & <a target="_blank" class="text-success" href="https://www.flaticon.com">FLATICON</a>
            </div>
        <footer>
    </div>
    <script src="{{ asset('js/script.js') }}" ></script>
</body>
</html>
