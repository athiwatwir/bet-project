@extends('layouts.core')

@section('title', 'บัญชีธนาคาร')

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
                        <div class="col-md-8 offset-2">
                            @if($status == 404)
                                <form novalidate class="bs-validate d-block mb-5 w-100" method="post" action="@if($status == 404) /account/banking @elseif($status == 200) /account/banking-edit @endif" enctype="multipart/form-data">
                                @csrf
                                    <div class="col-12">
                                        <div class="form-label-group mt-3">
                                            <select required id="bank_name" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror">
                                                <option value="" selected disabled>-- เลือกธนาคาร --</option>
                                                @foreach($b_lists as $list)
                                                    @if(isset($bank['bank_id']))
                                                        @if($list['id'] == $bank['bank_id'])
                                                            <option value="{{ $list['id'] }}" selected>{{ $list['name'] }} @if($list['name_en'] != '')- {{ $list['name_en'] }} @endif</option>
                                                        @else
                                                            <option value="{{ $list['id'] }}">{{ $list['name'] }} @if($list['name_en'] != '')- {{ $list['name_en'] }} @endif</option>
                                                        @endif
                                                    @else
                                                        <option value="{{ $list['id'] }}">{{ $list['name'] }} @if($list['name_en'] != '')- {{ $list['name_en'] }} @endif</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="bank_name">ธนาคาร</label>
                                            @error('bank_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-label-group mt-3">
                                            <input required placeholder="ชื่อบัญชี" id="bank_account_name" name="bank_account_name" value="@if($status != 404) {{ $bank['bank_account_name'] }} @endif" type="text" class="form-control @error('bank_account_name') is-invalid @enderror">
                                            <label for="bank_account_name">ชื่อบัญชี</label>
                                            @error('bank_account_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-label-group mt-3">
                                            <input required placeholder="เลขบัญชี" id="bank_account_number" name="bank_account_number" value="@if($status != 404) {{ $bank['bank_account_number'] }} @endif" type="text" class="form-control @error('bank_account_number') is-invalid @enderror">
                                            <label for="bank_account_number">เลขบัญชี</label>
                                            @error('bank_account_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6 offset-4">
                                        <div class="form-label-group mt-3">
                                            <button type="submit" class="btn btn-sm btn-grad shadow-none m-0">อัพเดทธนาคาร</button>
                                        </div>
                                    </div>
                                </form>
                            @elseif($status == 200)
                                <div class="card bg-light my-4">
                                    <div class="card-body pb-1 pt-4">
                                        <h5>รายละเอียดบัญชีธนาคาร</h5>
                                        <div class="card">
                                            <div class="card-body">
                                                <p><strong>ธนาคาร :</strong> {{ $bank['bank_name'] }} @if(isset($bank['bank_name_en']))<small>({{ $bank['bank_name_en'] }})</small>@endif</p>
                                                <p><strong>ชื่อบัญชี :</strong> {{ $bank['bank_account_name'] }}</p>
                                                <p class="mb-0"><strong>เลขที่บัญชี :</strong> {{ $bank['bank_account_number'] }}</p>
                                            </div>
                                        </div>
                                        <small class="float-end mt-3">หากต้องการแก้ไขบัญชีธนาคาร <a href="#!"><u>กรุณาแจ้งเจ้าหน้าที่</u></a></small>
                                    </div>
                                </div>
                            @endif
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