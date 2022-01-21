@extends('layouts.core')

@section('title', 'GAME')

@section('content')
<div class="container pt-4 mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- portlet -->
            <div class="portlet">

                <!-- portlet : header -->
                <div class="portlet-header pb-2">
                    <h4 class="d-block text-dark text-truncate font-weight-medium">
                        {{ $game }}
                    </h4>
                </div>
                <!-- /portlet : header -->

                <!-- portlet : body -->
                <div class="portlet-body pt-0 pl-4 pr-4 border-left-style mt-2">
                    <div class="row gutters-sm d-flex align-items-center mb-5">
                        <div class="col-md-6 card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/pg_logo.png') }}" class="w-100">
                                    </div>
                                    <div class="col-md-8">
                                        <p class="fs--16 mb-0" style="text-indent: 40px;">ค่ายเกมสล๊อตที่ได้รับความนิยมสูงสุด กราฟฟิกสวยงาม เข้าใจง่าย และมีอัตราการแจกรางวัลสูง รวมทั้งมีเกมอัพเดทใหม่ๆให้เลือกเล่นอยู่มากมาย จึงเป็นที่นิยมกับนักเล่นสล็อตออนไลน์</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($status != 301)
                            <div class="col-md-6 text-center mb-4">
                                <a href="{{ route('logingame', ['name' => $game]) }}" target="_blank" title="เล่นเกม"><img src="{{ asset('img/playgame_btn.png') }}" class="w-75"></a>
                                @if(!$has_wallet)
                                    <p class="text-danger mt-2">คุณยังไม่มีกระเป๋าเกม <a href="{{ route('wallets') }}"><u><strong>สร้างกระเป๋าเกม</strong></u></a>ก่อนเข้าเล่นเกม</p>
                                @endif
                            </div>
                        @else
                            <div class="col-md-4 offset-1 text-center my-4">
                                <div class="card bg-dark">
                                    <div class="card-body">
                                        <h5 class="text-white">กรุณาเข้าสู่ระบบก่อนเล่นเกม</h5>
                                        <p class="mb-0 text-white">
                                            <a href="{{ url('/login') }}" class="text-danger"><strong>เข้าสู่ระบบ</strong></a> 
                                            -หรือ- 
                                            <a href="{{ url('/register') }}" class="text-danger"><strong>สมัครสมาชิก</strong></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="row align-items-center mt-5 card">
                        <div class="col-12 text-center card-body bg-light">
                            <h4 class="text-dark">ทดลองเล่น {{$game}}</h4>
                            @include('games.demo')
                        </div>
                    </div>

                </div>
                <!-- /portlet : body -->

            </div>
            <!-- /portlet -->

        </div>
    </div>
</div>
@endsection

@section('modal')
    
@endsection