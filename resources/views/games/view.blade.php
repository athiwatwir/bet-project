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
                        เล่นเกม {{ $game }}
                    </h4>
                </div>
                <!-- /portlet : header -->

                <!-- portlet : body -->
                <div class="portlet-body pt-0 pl-4 pr-4 border-left-style">

                    <div class="row gutters-sm d-flex align-items-center">
                        @if($status != 301)
                            <div class="col-md-12 text-center">
                                <p>url : {{ $play['url'] }}</p>
                                <p>token : {{ $play['token'] }}</p>
                            </div>
                        @else
                            <div class="col-md-12 text-center mt-4">
                                <h5 class="text-primary">กรุณาเข้าสู่ระบบก่อนเล่นเกม</h5>
                                <p><a href="{{ url('/login') }}">เข้าสู่ระบบ</a> -หรือ- <a href="{{ url('/register') }}">สมัครสมาชิก</a></p>
                            </div>
                        @endif
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