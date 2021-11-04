<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} - @yield('title')</title>

        <!-- Scripts -->
        <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- up to 10% speed up for external res -->
        <link rel="dns-prefetch" href="https://fonts.googleapis.com/">
        <link rel="dns-prefetch" href="https://fonts.gstatic.com/">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/">

        <!-- Smarty Style -->
        <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/vendor_bundle.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-thai.css') }}" rel="stylesheet">

        <!-- Custom -->
        <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
        <script src="{{ asset('js/myapp.js') }}"></script>

        <!-- preloading icon font is helping to speed up a little bit -->
        <link rel="preload" href="{{ asset('assets/fonts/flaticon/Flaticon.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">
        <link rel="apple-touch-icon" href="demo.files/logo/icon_512x512.png">

        <link rel="manifest" href="{{ asset('assets/images/manifest/manifest.json') }}">
        <meta name="theme-color" content="#377dff">
        @if(session()->has('_t'))
            <script>userlogs("{{ session('_t') }}")</script>
        @endif
    </head>
<body class="header-sticky">
    <div id="wrapper">
        @include('layouts/header.mainheader')

        <section class="bg-bet pt--10">
            <div class="container z-index-1">
                @include('flash-message')
                
                @yield('content')
            </div>
        </section>

        @include('layouts/footer/mainfooter')

    </div>
    @yield('modal')

    <script src="{{ asset('assets/js/core.js') }}"></script>
</body>
</html>
