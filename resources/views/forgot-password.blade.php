@extends('layouts.core')

@section('title', 'Forgot Password')

@section('content')
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h4 class="text-white">{{ __('ผลประโยชน์ที่ท่านจะได้รับ') }}</h4>
            <div class="card pt-3">
                <div class="card-body">
                    <ul>
                        <li>ฝากเงินขั้นต่ำ 100 บาท</li>
                        <li>เว็บตรง ฝาก ถอน ไว</li>
                        <li>เคลียร์บิลเดิมพันรวดเร็ว</li>
                        <li>มีเจ้าหน้าที่ให้บริการ 24 ชม.</li>
                        <li>ถ่ายทอดสดและผลการแข่งขันฟรี</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
        @if(session()->has('_t'))
            <div class="card pt-3 mt-5">
                <div class="card-body">
                    สวัสดี {{ session('name') }} คุณได้เข้าสู่ระบบเรียบร้อยแล้ว <a href="{{ url('/') }}">กลับหน้าหลัก</a>
                </div>
            </div>
        @else
            <h4 class="text-white">{{ __('ลืมรหัสผ่าน') }}</h4>
            @if($status == 100)
                <form method="POST" action="{{ url('/forgot-password') }}">
                @csrf
                    <div class="card pt-3">
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="phone" class="col-md-5 col-form-label text-md-right">{{ __('หมายเลขโทรศัพท์ที่ใช้สมัคร') }} <span class="text-danger">*</span></label>

                                <div class="col-md-7">
                                    <input placeholder="เฉพาะตัวเลขเท่านั้น" id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-sm btn-grad shadow-none m-0">
                                {{ __('ส่งข้อมูล') }}
                            </button>
                        </div>
                    </div>
                </form>
            @elseif($status == 200)
                <form method="POST" action="{{ url('/confirm-otp') }}">
                @csrf
                    <div class="card pt-3">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-12 text-center">
                                    รหัสอ้างอิงถูกส่งไปยังหมายเลขโทรศัพท์ของคุณ(อาจจะใช้เวลาซักพัก) <br/>กรุณาตรวจสอบและกรอกรหัส OTP<br/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="otp" class="col-md-5 col-form-label text-md-right">รหัสอ้างอิง : {{ $ref }} <span class="text-danger">*</span></label>

                                <div class="col-md-5">
                                    <input placeholder="เฉพาะตัวเลขเท่านั้น" id="otp" type="number" class="form-control @error('otp') is-invalid @enderror" name="otp" value="{{ old('otp') }}" required autocomplete="otp">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <small class="text-danger" style="font-size: 0.5rem;">รหัส OTP จะสามารถใช้ได้เพียงครั้งเดียวเท่านั้น กรุณาตรวจสอบให้แน่ใจก่อนกดยืนยัน</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <div class="col-md-6 offset-md-4">
                            <input type="hidden" name="ref" value="{{ $ref }}">
                            <button type="submit" class="btn btn-sm btn-grad shadow-none m-0">
                                {{ __('ยืนยัน OTP') }}
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
        @endif
    </div>
</div>
@endsection