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
                        จัดการกระเป๋าเงิน
                    </h4>
                </div>
                <!-- /portlet : header -->

                <!-- portlet : body -->
                <div class="portlet-body pt-0 pl-4 pr-4 border-left-style">

                    <div class="row gutters-sm d-flex align-items-center">
                        <div class="col-md-12 card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4>กระเป๋าเงินหลัก</h4>
                                        <p><strong>จำนวนเงินคงเหลือ : <span class="text-success">{{ $wallet['amount'] }}</span> {{ $wallet['currency'] }}</strong></p>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <button type="button" class="btn btn-primary btn-sm btn-block btn-shadow">ฝากเงิน</button>
                                        <button type="button" class="btn btn-success btn-sm btn-block ml-0 btn-shadow">ถอนเงิน</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 text-right">
                            <button type="button" class="btn btn-primary btn-sm btn-shadow" data-toggle="modal" data-target="#createWalletModal">
                                <i class="fi fi-plus"></i> เพิ่มกระเป๋าเงินเกม
                            </button>
                        </div>
                        <hr class="bg-secondary my-3"/>
                        <div class="col-md-12">
                            <div class="row mt-3 p-2 rounded bg-light">
                                @foreach($wallets as $key => $is_wallet)
                                    <div id="card_id_{{ $key }}" class="col-md-6 mt-3">
                                        <div class="card" style="background-color: #f6f2ff;">
                                            <div class="card-body p-3">
                                                <h5>กระเป๋าเงินเกม : {{ $is_wallet['game_id'] }}</h5>
                                                <p><strong>จำนวนเงิน : <span class="text-success">{{ $is_wallet['amount'] }}</span> {{ $is_wallet['currency'] }}</strong></p>
                                                <div class="flex text-right">
                                                    <button class="btn btn-success btn-sm btn-vv-sm rounded" title="แก้ไขกระเป๋าเงินเกม{{ $is_wallet['game_id'] }}" 
                                                            data-toggle="modal" data-target="#editWalletModal" onClick="editWallet({{ $is_wallet['id'] }}, {{ $is_wallet['game_id'] }}, {{ $is_wallet['amount'] }})"
                                                    >
                                                        <i class="fi fi-pencil mr-0"></i>
                                                    </button>
                                                    <a	href="#!" 
                                                        class="js-ajax-confirm btn btn-danger btn-sm btn-vv-sm rounded" 
                                                        data-href="/account/delete-wallet/{{ $is_wallet['id'] }}"
                                                        data-ajax-confirm-body="<center><h4 class='mb-2'>ยืนยันการลบกระเป๋าเกม : {{ $is_wallet['game_id'] }}  ? </h4>
                                                                                จำนวนยอดเงินที่มี (จำนวน : <span class='text-success'>{{ $is_wallet['amount'] }}</span> {{ $is_wallet['currency'] }}) จะถูกโอนกลับไปยังกระเป๋าหลักอัตโนมัติ...</center>" 

                                                        data-ajax-confirm-method="GET" 

                                                        data-ajax-confirm-btn-yes-class="btn-sm btn-danger" 
                                                        data-ajax-confirm-btn-yes-text="ลบกระเป๋า" 
                                                        data-ajax-confirm-btn-yes-icon="fi fi-check" 

                                                        data-ajax-confirm-btn-no-class="btn-sm btn-light" 
                                                        data-ajax-confirm-btn-no-text="ยกเลิก" 
                                                        data-ajax-confirm-btn-no-icon="fi fi-close">
                                                        <i class="fi fi-thrash mr-0"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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

@section('modal')
<!-- Create Wallet Modal -->
<div class="modal fade" id="createWalletModal" tabindex="-1" role="dialog" aria-labelledby="adminRegisterModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ url('/account/create-wallet') }}">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มกระเป๋าเงิน</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-label-group row mt-3">
                        <label for="amount" class="col-md-3 col-form-label text-md-right">{{ __('เกม') }} <span class="text-danger">*</span></label>

                        <div class="col-md-8">
                            <select required id="game" name="game" class="form-control @error('game') is-invalid @enderror">
                                <option value="" selected disabled>-- เลือกเกม --</option>
                                <option value="1">game 1</option>
                                <option value="2">game 2</option>
                                <option value="3">game 3</option>
                            </select>
                            @error('game')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-label-group row mt-3">
                        <label for="amount" class="col-md-3 col-form-label text-md-right">{{ __('จำนวนเงิน') }}</label>

                        <div class="col-md-8">
                            <input placeholder="0" id="amount" type="number" class="form-control" name="amount" value="{{ old('amount') }}" autocomplete="amount">
                            <small class="text-dark"><strong>ยอดเงินที่ใช้ได้ :</strong> <span class="text-danger">{{ number_format($wallet['amount']) }}</span> {{ $wallet['currency'] }}</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary btn-sm">เพิ่มกระเป๋า</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Wallet Modal -->
<div class="modal fade" id="editWalletModal" tabindex="-1" role="dialog" aria-labelledby="adminRegisterModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ url('/account/edit-wallet') }}">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขกระเป๋าเงินเกม <span id="is_amount"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-label="Close" onClick="editWalletSelectedOption(false)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-label-group row mt-3">
                        <label for="amount" class="col-md-3 col-form-label text-md-right">{{ __('การจัดการ') }} <span class="text-danger">*</span></label>

                        <div class="col-md-8">
                            <select required id="wallet_option" name="wallet_option" class="form-control" onChange="editWalletSelectedOption(true)">
                                <option value="" selected disabled>-- เลือกรายการ --</option>
                                <option value="1">เติมเงินเข้ากระเป๋าเกม</option>
                                <option value="2">โยกย้ายเงินไปยังกระเป๋าอื่น</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- เติมเงินเข้ากระเป๋าเกม -->
                    <div id="add_amount" style="display: none;">
                        <div class="form-label-group row mt-3">
                            <label for="add_amount_wallet" class="col-md-3 col-form-label text-md-right">{{ __('จำนวนเงิน') }}</label>

                            <div class="col-md-8">
                                <input placeholder="0" id="add_amount_wallet" type="number" class="form-control" name="add_amount_wallet" value="{{ old('add_amount') }}" autocomplete="add_amount">
                                <small class="text-dark"><strong>ยอดเงินจากกระเป๋าหลัก :</strong> <span class="text-danger">{{ number_format($wallet['amount']) }}</span> {{ $wallet['currency'] }}</small>
                            </div>
                        </div>
                    </div>

                    <!-- ย้ายเงินไปยังกระเป๋าอื่น -->
                    <div id="change_amount" style="display: none;">
                        <div class="form-label-group row mt-3">
                            <label for="to_wallet" class="col-md-3 col-form-label text-md-right">{{ __('ไปยัง') }} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <select required id="to_wallet" name="to_wallet" class="form-control">
                                    <option value="" disabled selected>-- เลือกกระเป๋า --</option>
                                    <option value="{{ $wallet['id'] }}">กระเป๋าหลัก</option>
                                @foreach($wallets as $is_wallet)
                                    <option value="{{ $is_wallet['id'] }}">กระเป๋าเกม : {{ $is_wallet['game_id'] }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-label-group row mt-3">
                            <label for="change_amount_wallet" class="col-md-3 col-form-label text-md-right">{{ __('จำนวนเงิน') }}</label>
                            <div class="col-md-8">
                                <input placeholder="0" id="change_amount_wallet" type="number" class="form-control" name="change_amount_wallet" value="{{ old('change_amount') }}" autocomplete="change_amount">
                                <small class="text-dark"><strong>ยอดเงินที่ใช้ได้ :</strong> <span id="wallet_amount" class="text-danger"></span> {{ $wallet['currency'] }}</small>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="wallet_id" name="wallet_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" onClick="editWalletSelectedOption(false)" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary btn-sm">ยืนยัน</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection