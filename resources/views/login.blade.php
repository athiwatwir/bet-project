@extends('layouts.core')

@section('title', 'Login')

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
            <h4 class="text-white">{{ __('เข้าสู่ระบบ') }}</h4>
            <form method="POST" action="{{ url('/login') }}">
            @csrf
                <div class="card pt-3">
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อผู้ใช้') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input placeholder="Username" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="fi fi-eye field-icon showpwd" onClick="showPwd('password', this)"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 text-right">
                                <a href="#"><small>ลืมรหัสผ่าน</small></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-sm btn-grad shadow-none m-0">
                            {{ __('เข้าสู่ระบบ') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection