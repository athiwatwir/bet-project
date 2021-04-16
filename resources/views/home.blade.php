@extends('layouts.home')

@section('title', 'หน้าหลัก')

@section('content')
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
@endsection