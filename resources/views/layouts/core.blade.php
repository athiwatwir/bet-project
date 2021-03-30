<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

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
        <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-thai.css') }}" rel="stylesheet">

        <!-- preloading icon font is helping to speed up a little bit -->
        <link rel="preload" href="{{ asset('assets/fonts/flaticon/Flaticon.woff2') }}" as="font" type="font/woff2" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">
        <link rel="apple-touch-icon" href="demo.files/logo/icon_512x512.png">

        <link rel="manifest" href="{{ asset('assets/images/manifest/manifest.json') }}">
        <meta name="theme-color" content="#377dff">
    </head>
<body class="layout-admin header-sticky" data-s2t-class="btn-primary btn-sm bg-gradient-default rounded-circle b-0">
    <div id="wrapper" class="d-flex align-items-stretch flex-column">
        <header id="header" class="shadow-xs w-100">
            <div id="top_bar" class="fs--14 d-none d-sm-block"> <!-- optional if body.header-sticky is present: add .js-ignore class to ignore autohide and stay visible all the time -->
                <div class="container">

                    <div class="text-nowrap"><!-- change with .scrollable-horizontal to horizontally scroll, if -only- no dropdown is present -->
                        <div class="d-flex justify-content-between">
                            <div class="d-inline-block float-start">
                                <a class="navbar-brand" href="#">
                                    <img src="img/logo/logo-w.png" width="110" height="50" alt="...">
                                </a>
                            </div>
                            <div class="d-inline-block float-end pt--5">
                                <ul class="list-inline list-unstyled mb-0 d-flex align-items-end">

                                    <li class="list-inline-item mx-1 dropdown">

                                        <a href="#" aria-label="Account Options" id="dropdownAccountOptions" class="btn btn-sm rounded-circle btn-secondary" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                            <span class="group-icon">
                                                <i class="fi fi-user-male"></i>
                                                <i class="fi fi-close"></i>
                                            </span>
                                        </a>



                                        <div aria-labelledby="dropdownAccountOptions" class="prefix-link-icon prefix-icon-dot dropdown-menu dropdown-menu-clean dropdown-menu-invert dropdown-click-ignore dropdown-menu-dark p-0 mt--18 fs--15">
                                <div class="dropdown-header">
                                    John Doe
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="account-settings.html" title="Account Settings" class="dropdown-item text-truncate font-weight-light">
                                    Account Settings
                                </a>
                                <div class="dropdown-divider mb-0"></div>
                                <a href="#!" title="Log Out" class="prefix-icon-ignore dropdown-footer dropdown-custom-ignore">
                                    <i class="fi fi-power float-start"></i>
                                    Log Out
                                </a>
                            </div>

                        </li>

                                <li class="list-inline-item ml--6 mr--6 float-start d-lg-inline-block">
                                    <a target="_blank" href="{{ url('/register') }}" class="btn btn-sm btn-grad shadow-none m-0">
                                    สมัครสมาชิก
                                    </a>
                                </li>

                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="wrapper_content" class="d-flex flex-fill">
            <div class="container-xlg w-100 px-0">
                <div id="middle" class="flex-fill">
                    <div class="page-title bg-transparent b-0">
                        <h1 class="h4 mt-4 mb-0 px-3 font-weight-normal">
                            @yield('title')
                        </h1>
                    </div>
                    
                    @yield('content')
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/smarty_js/core.min.js') }}"></script>
</body>
</html>
