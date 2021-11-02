@extends('layouts.core')

@section('title', 'จัดการข้อมูลส่วนตัว')

@section('content')
<div class="container pt-4 mt-4">
    <div class="row justify-content-center">
        <!-- @include('account.menu') -->
        <div class="col-md-12">

            <!-- portlet -->
            <div class="portlet">

                <!-- portlet : header -->
                @include('account.menu')
                <!-- /portlet : header -->

                <!-- portlet : body -->
                <div class="portlet-body pt-0 pl-4 border-left-style">
                    <div class="row gutters-sm d-flex align-items-center" style="padding-top: 10px; border-top: 1px solid #333;">
                        <form novalidate class="bs-validate d-block mb-5 w-100" method="post" action="/account/change-password" enctype="multipart/form-data">
                        @csrf
                            <div class="col-12">
                                <div class="form-label-group mt-3">
                                    <input required placeholder="รหัสผ่านเดิม" id="account_current_password" name="account_current_password" type="password" value="" class="form-control">
                                    <label for="account_current_password">รหัสผ่านเดิม</label>
                                    <span class="fi fi-eye field-icon showpwd" onClick="showPwd('account_current_password', this)"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group mt-3">
                                    <input required placeholder="รหัสผ่านใหม่" id="account_new_password" name="account_new_password" type="password" value="" class="form-control @error('account_new_password') is-invalid @enderror">
                                    <label for="account_new_password">รหัสผ่านใหม่</label>
                                    @error('account_new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="fi fi-eye field-icon showpwd" onClick="showPwd('account_new_password', this)"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group mt-3">
                                    <input required placeholder="ยืนยันรหัสผ่านใหม่" id="account_new_password_confirmation" name="account_new_password_confirmation" type="password" value="" class="form-control @error('account_new_password_confirmation') is-invalid @enderror">
                                    <label for="account_new_password_confirmation">ยืนยันรหัสผ่านใหม่</label>
                                    @error('account_new_password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="fi fi-eye field-icon showpwd" onClick="showPwd('account_new_password_confirmation', this)"></span>
                                </div>
                            </div>

                            <div class="col-6 offset-4">
                                <div class="form-label-group mt-3">
                                    <button type="submit" class="btn btn-sm btn-grad shadow-none m-0">แก้ไขรหัสผ่าน</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /portlet : body -->

            </div>
            <!-- /portlet -->

        </div>
    </div>
</div>
@endsection