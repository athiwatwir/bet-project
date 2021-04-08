@extends('layouts.core')

@section('title', 'จัดการข้อมูลส่วนตัว')

@section('content')
<div class="container pt-4 mt-4">
    <div class="row justify-content-center">
        @include('account.menu')
        <div class="col-md-8">

            <!-- portlet -->
            <div class="portlet">

                <!-- portlet : header -->
                <div class="portlet-header pb-2">
                    <h4 class="d-block text-dark text-truncate font-weight-medium">
                        แก้ไขรหัสผ่าน
                    </h4>
                </div>
                <!-- /portlet : header -->

                <!-- portlet : body -->
                <div class="portlet-body pt-0 pl-4" style="border-left: 12px solid #dd0000; border-radius: 0 0 0 4px;">
                    <div class="row gutters-sm d-flex align-items-center">
                        <form novalidate class="bs-validate d-block mb-5 w-100" method="post" action="/account/change-password" enctype="multipart/form-data">
                        @csrf
                            <div class="col-12">
                                <div class="form-label-group mt-3">
                                    <input required placeholder="รหัสผ่านเดิม" id="account_current_password" name="account_current_password" type="password" value="" class="form-control">
                                    <label for="account_current_password">รหัสผ่านเดิม</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group mt-3">
                                    <input required placeholder="รหัสผ่านใหม่" id="account_new_password" name="account_new_password" type="password" value="" class="form-control">
                                    <label for="account_new_password">รหัสผ่านใหม่</label>
                                    @error('account_new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group mt-3">
                                    <input required placeholder="ยืนยันรหัสผ่านใหม่" id="account_new_password_confirmation" name="account_new_password_confirmation" type="password" value="" class="form-control">
                                    <label for="account_new_password_confirmation">ยืนยันรหัสผ่านใหม่</label>
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