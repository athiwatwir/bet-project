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
            <h4 class="text-white">{{ __('รหัสผ่านใหม่') }}</h4>
            @if($status == 200)
                <form method="POST" action="{{ url('/reset-password') }}">
                @csrf
                    <div class="card pt-3">
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }} <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input placeholder="รหัสผ่านมากกว่า 8 ตัว" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" onkeyup="checkPasswordReset()">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="fi fi-eye field-icon showpwd" onClick="showPwd('password', this)"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }} <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input placeholder="ยืนยันรหัสผ่าน" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="password_confirmation" onkeyup="checkPasswordReset()">
                                    <span class="fi fi-eye field-icon showpwd" onClick="showPwd('password-confirm', this)"></span>
                                </div>
                            </div>

                            <div class="form-group row mb-0 p-0" id="password-notice" style="display: none;">
                                <div class="col-md-6 offset-4">
                                    <small id="notice-message" class="text-danger"></small>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <div class="col-md-6 offset-md-4">
                            <input type="hidden" name="user" value="{{ $user }}">
                            <button type="button" class="btn btn-sm btn-grad shadow-none m-0" id="disabled-btn" disabled>
                                {{ __('ยืนยัน') }}
                            </button>
                            <button type="submit" class="btn btn-sm btn-grad shadow-none m-0" id="visibled-btn" style="display: none;">
                                {{ __('ยืนยัน') }}
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