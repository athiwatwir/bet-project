@extends('layouts.core')

@section('title', 'ข้อมูลส่วนตัว')

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
                        <form novalidate class="bs-validate d-block mb-5 w-100" method="post" action="/account/update" enctype="multipart/form-data">
                        @csrf
                            <div class="col-12">
                                <div class="form-label-group mt-3">
                                    <input placeholder="ชื่อผู้ใช้" id="account_user_name" name="account_username" type="text" value="{{ $user['username'] }}" class="form-control" disabled>
                                    <label for="account_company_name">ชื่อผู้ใช้ (ไม่สามารถแก้ไขได้)</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group mt-3">
                                    <input required placeholder="ชื่อ - สกุล" id="account_name" name="account_name" type="text" value="{{ $user['name'] }}" class="form-control">
                                    <label for="account_name">ชื่อ - สกุล</label>
                                    @error('account_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group mt-3">
                                    <input required placeholder="เบอร์โทร" id="account_phone" name="account_phone" type="number" value="{{ $user['phone'] }}" class="form-control">
                                    <label for="account_phone">เบอร์โทร</label>
                                    @error('account_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-label-group mt-3">
                                    <input placeholder="ไลน์" id="account_line" name="account_line" type="text" value="{{ $user['line'] }}" class="form-control">
                                    <label for="account_line">ไลน์</label>
                                </div>
                            </div>

                            <div class="col-6 offset-4">
                                <div class="form-label-group mt-3">
                                    <button type="submit" class="btn btn-sm btn-grad shadow-none m-0">แก้ไขรายละเอียด</button>
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