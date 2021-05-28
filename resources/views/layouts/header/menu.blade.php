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
                    <a href="{{ url('/') }}" id="menu-home" class="nav-link">
                        <i class="fi fi-home"></i>
                    </a>
                </li>

                <!-- MENU GAME -->
                <x-menugame/> 

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