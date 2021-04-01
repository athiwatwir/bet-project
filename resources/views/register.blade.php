@extends('layouts.core')

@section('title', 'สมัครสมาชิก')

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
            <h4 class="text-white">{{ __('สมัครสมาชิก') }}</h4>
            <div class="card pt-3">
                <div class="card-body">
                    <form method="POST" action="{{ url('/register') }}">
                        @csrf

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
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="password_confirmation" onfocusout="checkPassword()">
                            </div>
                        </div>

                        <div class="form-group row mb-0 p-0" id="password-notice" style="display: none;">
                            <div class="col-md-6 offset-4">
                                <small class="text-danger">รหัสผ่านไม่ตรงกัน กรุณาตรวจสอบ</small>
                            </div>
                        </div>

                        <hr class="bg-secondary my-4"/>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ - สกุล') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row g-0">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('เบอร์ติดต่อ') }} <span class="text-danger">*</span></label>

                            <div class="col-md-2">
                                <select class="form-control" name="country_code" style="padding: 5px;">
                                    <option value="+66"><img src="{{ asset('img/icon/thai_flag_64.png') }}" style="border-radius: 50%;"> 66</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input placeholder="ตัวเลขเท่านั้น" id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="line" class="col-md-4 col-form-label text-md-right">{{ __('Line') }}</label>

                            <div class="col-md-6">
                                <input id="line" type="text" class="form-control" name="line" value="{{ old('line') }}" autocomplete="line">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="currency" class="col-md-4 col-form-label text-md-right">{{ __('ค่าเงิน') }} <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="currency" class="form-control" name="currency" required>
                                    <option value="THB"><img src="{{ asset('img/icon/thai_flag_64.png') }}"> THB</option>
                                </select>
                            </div>
                        </div>

                        <hr class="bg-secondary my-4"/>

                        <div class="form-group row">
                            <label for="how_know" class="col-md-4 col-form-label text-md-right">{{ __('คุณรู้จักเว็บไซต์เราได้อย่างไร') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <select id="how_know" class="form-control" name="how_to_know" value="{{ old('how_to_know') }}" required onchange="howtoknowselected()">
                                    <option value="" selected disabled>-- โปรดเลือก --</option>
                                    <option value="google">กูเกิ้ล</option>
                                    <option value="facebook">เฟซบุ๊ค</option>
                                    <option value="line">ไลน์/ไลน์แอด</option>
                                    <option value="email">อีเมล์</option>
                                    <option value="ads">โฆษณา</option>
                                    <option value="twitter">ทวิตเตอร์</option>
                                    <option value="friend">เพื่อน</option>
                                    <option value="etc">อื่นๆ</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" id="know_desc" style="display: none;">
                            <label for="how_to_know_desc" class="col-md-4 col-form-label text-md-right">{{ __('กรุณาระบุ') }} <span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="how_to_know_desc" type="text" class="form-control" name="how_to_know_desc" value="{{ old('how_to_know_desc') }}" autocomplete="how_to_know_desc">
                            </div>
                        </div>

                        <hr class="bg-secondary my-4"/>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-sm btn-grad shadow-none m-0">
                                    {{ __('สมัครสมาชิก') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center" style="line-height: 14px;">
                                <small>หากคลิกที่ปุ่มสมัครสมาชิก จะถือว่าผู้สมัครได้รับรองว่าผู้สมัครมีอายุเกิน 18 ปี <br/>ได้อ่านและยอมรับ <a href="#">ข้อกำหนดและเงือนไข</a> แล้ว</small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function howtoknowselected() {
        let is_select = document.getElementById('how_know').value
        let is_style = document.getElementById('know_desc')
        if (is_select === "etc" || is_select === "friend") {
            document.getElementById('how_to_know_desc').placeholder = is_select === 'friend' ? "ยูสเซอร์คนแนะนำ" : ""
            document.getElementById('how_to_know_desc').required = true
            is_style.style.display = "flex";
        } else {
            document.getElementById('how_to_know_desc').required = false
            is_style.style.display = "none";
        }
    }

    function checkPassword() {
        let is_password = document.getElementById('password').value
        let is_confirmpassword = document.getElementById('password-confirm').value
        if(is_password !== is_confirmpassword) {
            document.getElementById('password-notice').style.display = "flex"
        }else{
            document.getElementById('password-notice').style.display = "none"
        }
    }
</script>
@endsection