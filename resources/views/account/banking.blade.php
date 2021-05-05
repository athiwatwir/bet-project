@extends('layouts.core')

@section('title', 'จัดการบัญชีธนาคาร')

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
                        จัดการบัญชีธนาคาร
                    </h4>
                </div>
                <!-- /portlet : header -->

                <!-- portlet : body -->
                <div class="portlet-body pt-0 pl-4 border-left-style">

                    <div class="row gutters-sm d-flex align-items-center">
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
                    </div>

                </div>
                <!-- /portlet : body -->

            </div>
            <!-- /portlet -->

        </div>
    </div>
</div>
@endsection