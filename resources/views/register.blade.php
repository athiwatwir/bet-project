@extends('layouts.core')

@section('title', 'สมัครสมาชิก')

@section('content')
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    ผลประโยชน์ที่ท่านจะได้รับ
                </div>
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
            <div class="card">
                <div class="card-header">{{ __('สมัครสมาชิก') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อผู้ใช้') }}</label>

                            <div class="col-md-6">
                                <input placeholder="UserName" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <hr/>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ - สกุล') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row g-0">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('เบอร์ติดต่อ') }}</label>

                            <div class="col-md-2">
                                <select class="form-control" name="country_code">
                                    <option value="+66">[FLAG]66</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input placeholder="ตัวเลขเท่านั้น" id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

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
                                <input id="line" type="text" class="form-control" name="line" value="{{ old('line') }}" autocomplete="line" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="currency" class="col-md-4 col-form-label text-md-right">{{ __('ค่าเงิน') }}</label>

                            <div class="col-md-6">
                                <select id="currency" class="form-control" name="currency" required>
                                    <option value="THB">[FLAG] THB</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="how_know" class="col-md-4 col-form-label text-md-right">{{ __('คุณรู้จักเว็บไซต์เราได้อย่างไร') }}</label>

                            <div class="col-md-6">
                                <select id="how_know" class="form-control" name="how_to_know" required>
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('สมัครสมาชิก') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection