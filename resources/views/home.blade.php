<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title></title>
        <meta name="description" content="...">

        <meta name="viewport" content="width=device-width, maximum-scale=5, initial-scale=1, user-scalable=0">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

        <!-- up to 10% speed up for external res -->
        <link rel="dns-prefetch" href="https://fonts.googleapis.com/">
        <link rel="dns-prefetch" href="https://fonts.gstatic.com/">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <!-- preloading icon font is helping to speed up a little bit -->
        <link rel="preload" href="assets/fonts/flaticon/Flaticon.woff2" as="font" type="font/woff2" crossorigin>

        <link rel="stylesheet" href="{{url('assets/css/core.css')}}">
        <link rel="stylesheet" href="{{url('assets/css/vendor_bundle.min.css')}}">
        <link rel="stylesheet" href="{{url('css/mystyle.css')}}">
        <link rel="stylesheet" href="{{url('css/font-thai.css')}}">

        <!-- favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="apple-touch-icon" href="demo.files/logo/icon_512x512.png">

        <link rel="manifest" href="assets/images/manifest/manifest.json">
        <meta name="theme-color" content="#377dff">

    </head>
    <body class="header-sticky">
        <div id="wrapper">

            <!-- HEADER -->
            <header id="header" class="shadow-xs bg-bet">
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
                                        <a target="_blank" href="#" class="btn btn-sm btn-grad shadow-none m-0">
                                        สมัครสมาชิก
                                        </a>
                                    </li>

                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- NAVBAR -->
                <div class="container position-relative">

                    <nav class="navbar navbar-expand-lg navbar-dark text-white justify-content-lg-between justify-content-md-inherit">

                        <div class="align-items-start d-block d-sm-none">

                            <!-- mobile menu button : show -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false" aria-label="Toggle navigation">
                                <svg width="25" viewBox="0 0 20 20">
                                    <path fill="#fff" d="M 19.9876 1.998 L -0.0108 1.998 L -0.0108 -0.0019 L 19.9876 -0.0019 L 19.9876 1.998 Z"></path>
                                    <path fill="#fff" d="M 19.9876 7.9979 L -0.0108 7.9979 L -0.0108 5.9979 L 19.9876 5.9979 L 19.9876 7.9979 Z"></path>
                                    <path fill="#fff" d="M 19.9876 13.9977 L -0.0108 13.9977 L -0.0108 11.9978 L 19.9876 11.9978 L 19.9876 13.9977 Z"></path>
                                    <path fill="#fff" d="M 19.9876 19.9976 L -0.0108 19.9976 L -0.0108 17.9976 L 19.9876 17.9976 L 19.9876 19.9976 Z"></path>
                                </svg>
                            </button>

                            <!-- 
                                Logo : height: 70px max
                            -->
                            <a class="navbar-brand" href="index.html">
                                 <img src="img/logo/logo-w.png" width="110" height="50" alt="...">
                            </a>

                        </div>

                        <div class="collapse navbar-collapse navbar-animate-fadein" id="navbarMainNav">

                            <!-- MOBILE MENU NAVBAR -->
                            <div class="navbar-xs d-none"><!-- .sticky-top -->

                                <!-- mobile menu button : close -->
                                <button class="navbar-toggler pt-0" type="button" data-toggle="collapse" data-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <svg width="20" viewBox="0 0 20 20">
                                        <path d="M 20.7895 0.977 L 19.3752 -0.4364 L 10.081 8.8522 L 0.7869 -0.4364 L -0.6274 0.977 L 8.6668 10.2656 L -0.6274 19.5542 L 0.7869 20.9676 L 10.081 11.679 L 19.3752 20.9676 L 20.7895 19.5542 L 11.4953 10.2656 L 20.7895 0.977 Z"></path>
                                    </svg>
                                </button>

                                <!-- 
                                    Mobile Menu Logo 
                                    Logo : height: 70px max
                                -->
                                <a class="navbar-brand" href="index.html">
   
                                    <img src="img/logo/logo-w.png" width="110" height="" alt="...">
                                </a>

                            </div>


                            <!-- NAVIGATION -->
                            <ul class="navbar-nav">

                                
                            

                                <!-- home -->
                                <li class="nav-item dropdown active">
                                    <a href="#" id="menu-home" class="nav-link">
                                        <i class="fi fi-home"></i>
                                    </a>
                                </li>

                                <li class="nav-item dropdown dropdown-mega">
                                    <a href="#" id="mainNavShop" class="nav-link dropdown-toggle" 
                                        data-toggle="dropdown" 
                                        aria-haspopup="true" 
                                        aria-expanded="false">
                                        คาสิโน
                                    </a>
                                    <div aria-labelledby="mainNavShop" class="dropdown-menu dropdown-menu-hover bg-bet-05">
                                        <ul class="list-unstyled m-0 p-0">
                                            <li class="dropdown-item bg-transparent">
                                                <div class="row col-border-md">
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/casino/game-ag.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/casino/game-dream.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/casino/game-ebet.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/casino/game-evolution.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/casino/game-mg.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/casino/game-micro.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                    
                                                    

                                                </div>
                                                <hr/>
                                                <div class="row col-border-md">
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/casino/game-playtech.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/casino/game-sa.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/casino/game-sexy.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item dropdown dropdown-mega">
                                    <a href="#" id="menu-sport" class="nav-link dropdown-toggle" 
                                        data-toggle="dropdown" 
                                        aria-haspopup="true" 
                                        aria-expanded="false">
                                        กีฬา
                                    </a>
                                    <div aria-labelledby="menu-sport" class="dropdown-menu dropdown-menu-hover bg-bet-05">
                                        <ul class="list-unstyled m-0 p-0">
                                            <li class="dropdown-item bg-transparent">
                                                <div class="row col-border-md">
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/sport/sport-bet.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/sport/sport-cmd.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/sport/sport-m8bet.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/sport/sport-maxbet.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/sport/sport-sbobet.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/sport/sport-ufa.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item dropdown dropdown-mega">
                                    <a href="#" id="menu-esport" class="nav-link dropdown-toggle" 
                                        data-toggle="dropdown" 
                                        aria-haspopup="true" 
                                        aria-expanded="false">
                                        อีสปอร์ต
                                    </a>
                                    <div aria-labelledby="menu-esport" class="dropdown-menu dropdown-menu-hover bg-bet-05">
                                        <ul class="list-unstyled m-0 p-0">
                                            <li class="dropdown-item bg-transparent">
                                                <div class="row col-border-md">
                                                    <div class="col-4 col-md-2">
                                                        <a href="#" class="transition-hover-zoom-img">
                                                            <img class="w-100" src="{{url('img/menu/esport/esport.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item dropdown dropdown-mega">
                                    <a href="#" id="menu-slot" class="nav-link dropdown-toggle" 
                                        data-toggle="dropdown" 
                                        aria-haspopup="true" 
                                        aria-expanded="false">
                                         สล๊อต
                                    </a>
                                    <div aria-labelledby="menu-slot" class="dropdown-menu dropdown-menu-hover bg-bet-05">
                                        <ul class="list-unstyled m-0 p-0">
                                            <li class="dropdown-item bg-transparent">
                                                <div class="row col-border-md">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="#" id="mainNavHome" class="nav-link">
                                        แทงบอลออนไลน์
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="#" id="mainNavHome" class="nav-link">
                                        ผลบอลสดวันนี้
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="#" id="mainNavHome" class="nav-link">
                                         LIVE
                                         <div class="spinner-grow spinner-grow-sm text-danger" role="status">
                                            
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="#" id="mainNavHome" class="nav-link">
                                        โปรโมชั่น
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="#" id="mainNavHome" class="nav-link">
                                        ติดต่อเรา
                                    </a>
                                </li>

                            </ul>
                            <!-- /NAVIGATION -->

                        </div>

                        <!-- OPTIONS -->
                        
                        <!-- /OPTIONS -->
                    </nav>

                </div>
                <!-- /NAVBAR -->
            </header>
            <!-- /HEADER -->

            <section class="d-none d-sm-block swiper-container swiper-btn-group swiper-btn-group-end text-white p-0 h-60vh overflow-hidden"
                data-swiper='{
                    "slidesPerView": 1,
                    "spaceBetween": 0,
                    "autoplay": { "delay" : 3500, "disableOnInteraction": false },
                    "loop": true,
                    "pagination": { "type": "bullets" }
                }'>

                <div class="swiper-wrapper h-100">

                    <!-- slide 2 -->
                    <div class="lazy h-100 swiper-slide d-middle bg-white overlay-dark overlay-opacity-1 bg-cover" style="background-image:url('img/sliders/master-01.jpg')">
                    </div>
                    
                    <div class="lazy h-100 swiper-slide d-middle bg-white overlay-dark overlay-opacity-1 bg-cover" style="background-image:url('img/sliders/master-02.jpg')">
                    </div>

                    <div class="lazy h-100 swiper-slide d-middle bg-white overlay-dark overlay-opacity-1 bg-cover" style="background-image:url('img/sliders/master-01.jpg')">
                    </div>

                    <div class="lazy h-100 swiper-slide d-middle bg-white overlay-dark overlay-opacity-1 bg-cover" style="background-image:url('img/sliders/master-02.jpg')">
                    </div>

                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>

                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </section> 


            <section class="d-block d-sm-none swiper-container text-white p-0"
                data-swiper='{
                    "slidesPerView": 1,
                    "spaceBetween": 0,
                    "autoplay": { "delay" : 3500, "disableOnInteraction": false },
                    "loop": true,
                    "pagination": { "type": "bullets" }
                }'>

                <div class="swiper-wrapper h-100">

                    <!-- slide 2 -->
                    <div class="swiper-slide d-middle bg-white" >
                        <img class="img-fluid" src="img/sliders/master-01.jpg" alt="...">
                    </div>
                    <div class="swiper-slide d-middle bg-white" >
                        <img class="img-fluid" src="img/sliders/master-02.jpg" alt="...">
                    </div>
                    
                   

                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>

                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </section>  

            <!-- Content -->
            <section class="bg-bet pt--10">
                <div class="container z-index-1">
                    <div class="row">
                        <div class="col-md-1 p--0">
                            <span class="badge bg-bet-red text-white"><h6 class="mb-0">ประกาศ <i class="fi fi-arrow-right-full"></i></h6></span>
                        </div>
                        <div class="col-md-11 p--0">

                                        <marquee direction="left" width="100%" class="text-white" >Siam Lotto หรือ S-Lotto เหมาะสำหรับคอหวยที่ชอบลุ้นตัวเลขกัน ไม่ต้องเสียเวลารอวันที่ 15 และ สิ้นเดือนกันอีกต่อไป เพราะคุณสามารถลุ้นกันได้ทุกวัน เวลา 2 ทุ่ม ( 20:00 น. ) กับ สยามล็อตโต้ ซึ่งเป็นบริการลอ</marquee>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 bg-bet-red text-white">
                            <h2>เกมส์ยอดฮิต</h2>
                        </div>
                    </div>
                    <div class="row mt--10">
                        <div class="col-6 col-md-3 pb--10">
                            <a class="transition-hover-zoom-img" href="#" >
                            <img src="{{url('img/game/vivo-game.jpg')}}" alt="" class="img-fluid w-100">
                            </a>
                        </div>
                        <div class="col-6 col-md-3 pb--10">
                            <a class="transition-hover-zoom-img" href="#" >
                            <img src="{{url('img/game/chase-game.jpg')}}" alt="" class="img-fluid w-100">
                            </a>
                        </div>
                        <div class="col-6 col-md-3 pb--10">
                            <a class="transition-hover-zoom-img" href="#" >
                            <img src="{{url('img/game/joker-game.jpg')}}" alt="" class="img-fluid w-100">
                            </a>
                        </div>
                        <div class="col-6 col-md-3 pb--10">
                            <a class="transition-hover-zoom-img" href="#" >
                            <img src="{{url('img/game/vivo-game.jpg')}}" alt="" class="img-fluid w-100">
                            </a>
                        </div>
                    </div>

                    <hr/>
                    <div class="row mt--10 col-border-md">
                        <div class="col-12 col-md-4 text-white">
                            <h4 class="font-weight-300">นัดสำคัญ</h4>
                            <table class="table table-borderless table-sm text-center">
                                <tbody class="text-white">
                                    <tr>
                                        <td colspan="3">วันอาทิตย์ 22/02/2021 เวลา 22:30</td>
                                    </tr>
                                    <tr class="">
                                        <td class="text-right">
                                            <img width="60" src="{{url('img/football-logo/premire-league/manu.png')}}" alt="">
                                        </td>
                                        <td>
                                            <img width="60" src="{{url('img/vs.png')}}" alt="">
                                        </td>
                                        <td class="text-left">
                                            <img width="60" src="{{url('img/football-logo/premire-league/mancity.png')}}" alt="">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3">วันอาทิตย์ 22/02/2021 เวลา 22:30</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">
                                            <img width="60" src="{{url('img/football-logo/premire-league/manu.png')}}" alt="">
                                        </td>
                                        <td>
                                            <img width="60" src="{{url('img/vs.png')}}" alt="">
                                        </td>
                                        <td class="text-left">
                                            <img width="60" src="{{url('img/football-logo/premire-league/mancity.png')}}" alt="">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3">วันอาทิตย์ 22/02/2021 เวลา 22:30</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">
                                            <img width="60" src="{{url('img/football-logo/premire-league/manu.png')}}" alt="">
                                        </td>
                                        <td>
                                            <img width="60" src="{{url('img/vs.png')}}" alt="">
                                        </td>
                                        <td class="text-left">
                                            <img width="60" src="{{url('img/football-logo/premire-league/mancity.png')}}" alt="">
                                        </td>
                                    </tr>

                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 col-md-4 text-white">
                            <h4 class="font-weight-300">ศูนย์ข้อมูล</h4>
                            <div id="clipboard_1" class="mb-4">
                                                <!-- Aero List -->
                                                <ul class="list-group list-group-flush rounded overflow-hidden">
                                                    
                                                    <li class="list-group-item pt-4 pb-4">
                                                        <div class="d-flex">

                                                            <div class="badge badge-warning badge-soft badge-ico-sm rounded-circle float-start">
                                                                <i class="fi fi-check"></i>
                                                            </div>

                                                            <div class="pl--12 pr--12">
                                                                <p class="text-dark font-weight-medium m-0">
                                                                    คำถามที่พบบ่อย?
                                                                </p>

                                                
                                                            </div>

                                                        </div>
                                                    </li>

                                                    <li class="list-group-item pt-4 pb-4">
                                                        <div class="d-flex">

                                                            <div class="badge badge-warning badge-soft badge-ico-sm rounded-circle float-start">
                                                                <i class="fi fi-check"></i>
                                                            </div>

                                                            <div class="pl--12 pr--12">
                                                                <p class="text-dark font-weight-medium m-0">
                                                                    วิธีการฝากเงิน?
                                                                </p>

                                                          
                                                            </div>

                                                        </div>
                                                    </li>

                                                    <li class="list-group-item pt-4 pb-4">
                                                        <div class="d-flex">

                                                            <div class="badge badge-warning badge-soft badge-ico-sm rounded-circle float-start">
                                                                <i class="fi fi-check"></i>
                                                            </div>

                                                            <div class="pl--12 pr--12">
                                                                <p class="text-dark font-weight-medium m-0">
                                                                    วิธีการถอนเงิน?
                                                                </p>

                                                            </div>

                                                        </div>
                                                    </li>

                                                    <li class="list-group-item pt-4 pb-4">
                                                        <div class="d-flex">

                                                            <div class="badge badge-warning badge-soft badge-ico-sm rounded-circle float-start">
                                                                <i class="fi fi-check"></i>
                                                            </div>

                                                            <div class="pl--12 pr--12">
                                                                <p class="text-dark font-weight-medium m-0">
                                                                    วิธีเล่นเกมส์?
                                                                </p>

                                                            </div>

                                                        </div>
                                                    </li>

                                                    

                                                </ul>
                                                <!-- /Aero List -->
                                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-white">
                            <h4 class="font-weight-300">ติดต่อเรา!</h4>
                            <table class="table table-borderless table-sm">
                                <tbody>
                                    <tr>
                                        <td class="align-middle text-right">
                                            <img src="{{url('img/icon/line.png')}}" width="70" alt="" class="">
                                        </td>
                                        <td class="align-middle">
                                            <a href="#" class="text-white"><h2 class="font-weight-300">@betbet8888</h2></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-right">
                                            <img src="{{url('img/icon/call.png')}}" width="70" alt="" class="">
                                        </td>
                                        <td class="align-middle">
                                            <a href="#" class="text-white"><h2 class="font-weight-300">099 999 9999</h2></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-right">
                                            <img src="{{url('img/icon/facebook.png')}}" width="70" alt="" class="">
                                        </td>
                                        <td class="align-middle">
                                            <a href="#" class="text-white"><h2 class="font-weight-300">betbet8888</h2></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/mgwrQs0ggys?autoplay=1&mute=1&showinfo=0&controls=0" allow='autoplay' title="" frameborder="0" allowfullscreen></iframe>
                            
                                                </div>
                                            
                        </div>
                    </div>

                </div>
                
            </section>
            <!-- End Content -->

            <section class="bg-bet pb--0 pt--0">
                <div class="container z-index-1">
                    <div class="row">
                        <div class="col-12 col-md-10 offset-md-1">
                            <img src="{{url('img/title-01.png')}}" alt="" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </section>

            <section class="p-0 bg-bet-red text-white">
                <div class="container py-3">

                    <div class="row">

                        <div class="col-12 col-lg-4 p--15 d-flex d-block-xs text-center-xs bw--1 bt-0 br-0 bb-0 b--0-lg" data-aos="fade-in" data-aos-delay="150">

                            <div class="pl--10 pr--20 fs--50 line-height-1 pt--6">
                                <img width="60" height="60" src="{{url('img/icon/icon-24h.png')}}" alt="...">
                            </div>

                            <div class="my-2">
                                <h2 class="font-weight-medium fs--20 mb-0">
                                    อัพเดตตลอด 24 ชั่วโมง
                                </h2>

                                <p class="m-0">
                                    อัพเดตตลอด 24 ชั่วโมง
                                </p>
                            </div>

                        </div>

                        <div class="col-12 col-lg-4 p--15 d-flex d-block-xs text-center-xs bw--1 bt-0 br-0 bb-0 b--0-lg" data-aos="fade-in" data-aos-delay="250">

                            <div class="pl--10 pr--20 fs--50 line-height-1 pt--6">
                                <img width="60" height="60" src="{{url('img/icon/icon-money.png')}}" alt="...">
                            </div>

                            <div class="my-2">
                                
                                <h2 class="font-weight-medium fs--20 mb-0">
                                    ฝาก-ถอนไว
                                </h2>

                                <p class="m-0">
                                    ฝาก-ถอนไว
                                </p>
                            </div>

                        </div>

                        <div class="col-12 col-lg-4 p--15 d-flex d-block-xs text-center-xs bw--1 bl-0 br-0 bb-0 b--0-lg" data-aos="fade-in" data-aos-delay="350">

                            <div class="pl--10 pr--20 fs--50 line-height-1 pt--6">
                                <img width="60" height="60" src="{{url('img/icon/icon-like.png')}}" alt="...">
                            </div>

                            <div class="my-2">
                                
                                <h2 class="font-weight-medium fs--20 mb-0">
                                    เล่นจริง แจกจริง 100%
                                </h2>

                                <p class="m-0">
                                    เล่นจริง แจกจริง 100%
                                </p>

                            </div>

                        </div>

                    </div>

                </div>
            </section>

            <!-- Footer -->
            <footer id="footer" class="bg-bet">
                <div class="container">

                    <div class="row">
                        
                        <div class="col-12 col-md-12 py-3 fs--15 text-center">
                            <img height="45" src="{{url('img/icon/ftr_brand_ag_ov.png')}}" alt="">
                            <img height="45" src="{{url('img/icon/ftr_brand_allbet_ov.png')}}" alt="">
                            <img height="45" src="{{url('img/icon/ftr_brand_dream_ov.png')}}" alt="">
                            <img height="45" src="{{url('img/icon/ftr_brand_jkr_ov.png')}}" alt="">
                            <img height="45" src="{{url('img/icon/ftr_brand_maxbet_ov.png')}}" alt="">
                            <img height="45" src="{{url('img/icon/ftr_brand_ufabet_ov.png')}}" alt="">
                            <img height="45" src="{{url('img/icon/ftr_brand_scr_ov.png')}}" alt="">
                            <img height="45" src="{{url('img/icon/ftr_brand_mg_ov.png')}}" alt="">
                        </div>
                    </div>
                </div>

            </footer>
            <!-- /Footer -->

        </div>
        <a href="#" class="transition-hover-zoom-img fix-icon-left d-none d-sm-block d-md-block">
            <img src="{{url('img/game/logo-temmax888-min.png')}}" width="160" alt="" class="">
        </a>

        <script src="{{url('assets/js/core.js')}}"></script>
    </body>
</html>