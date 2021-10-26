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
                                        <p class="mb-0"><strong>จำนวนเงินคงเหลือ : <span class="text-success">{{ number_format($wallet['amount']) }}</span> {{ $wallet['currency'] }}</strong></p>
                                        <a href="#!" data-toggle="modal" data-target="#historiesWalletModal"><small><i class="fi fi-task-list"></i> ประวัติการทำรายการ</small></a>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <button type="button" class="btn btn-primary btn-sm btn-block btn-shadow" data-toggle="modal" data-target="#depositWalletModal" style="line-height: 13px;">ฝากเงิน<br/><small class="fs--10">(แจ้งโอนเงิน)</small></button>
                                        <button type="button" class="btn btn-success btn-sm btn-block ml-0 btn-shadow" data-toggle="modal" data-target="#withdrawWalletModal">ถอนเงิน</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 text-right">
                            <button type="button" class="btn btn-primary btn-sm btn-shadow" data-toggle="modal" data-target="#createWalletModal">
                                <i class="fi fi-plus"></i> เพิ่มกระเป๋าเงินเกม
                            </button>
                        </div>

                        <div class="col-md-12 mt-2">
                            <div class="table-responsive">

                                <table class="table table-align-middle border-bottom mb-6">

                                    <thead>
                                        <tr class="text-muted fs--13 bg-light">
                                            <th class="hidden-lg-down text-center">#</th>
                                            <th>
                                                <span class="px-2 p-0-xs">
                                                    กระเป๋าเงินเกม
                                                </span>
                                            </th>
                                            <!-- <th class="hidden-lg-down text-center">จำนวนเงิน</th> -->
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>

                                    <tbody id="item_list">

                                        @foreach($wallets as $key => $is_wallet)

                                            <tr id="message_id_{{ $key }}" class="text-dark">
                                                <td class="hidden-lg-down text-center">
                                                    <small>{{ $key+1 }}.</small>
                                                </td>
                                                <td>
                                                    <p class="mb-0 d-flex">
                                                        {{ $is_wallet['game_name'] }}
                                                    </p>

                                                    <!-- MOBILE ONLY -->
                                                    <div class="fs--13 d-block d-xl-none">
                                                        <span class="d-block text-muted"></span>
                                                        <span class="d-block text-muted"></span>
                                                    </div>
                                                    <!-- /MOBILE ONLY -->
                                                </td>

                                                <!-- <td class="hidden-lg-down text-center">
                                                    {{ number_format($is_wallet['amount']) }} {{ $is_wallet['currency'] }}
                                                </td> -->

                                                <td class="text-center">
                                                    <div class="flex text-right">
                                                        <!-- <button class="btn btn-info btn-sm btn-vv-sm rounded" title="ฝากเงินเข้ากระเป๋าเงินเกม {{ $is_wallet['game_name'] }}" 
                                                                data-toggle="modal" data-target="#" onClick=""
                                                        >
                                                            <i class="fi fi-arrow-download mr-0"></i>
                                                        </button>
                                                        <button class="btn btn-warning btn-sm btn-vv-sm rounded" title="ถอนเงินออกกระเป๋าเงินเกม {{ $is_wallet['game_name'] }}" 
                                                                data-toggle="modal" data-target="#" onClick=""
                                                        >
                                                            <i class="fi fi-arrow-upload mr-0"></i>
                                                        </button>
                                                        <button class="btn btn-secondary btn-sm btn-vv-sm rounded" title="ย้ายเงินไปกระเป๋าอื่น" 
                                                                data-toggle="modal" data-target="#" onClick=""
                                                        >
                                                            <i class="fi fi-arrow-right-3 mr-0"></i>
                                                        </button> -->
                                                        <button class="btn btn-primary btn-sm btn-vv-sm rounded" title="ประวัติการทำรายการเกม {{ $is_wallet['game_name'] }}" 
                                                                data-toggle="modal" data-target="#subHistoriesWalletModal" onClick="subWalletHistory({{ json_encode($is_wallet['trans']) }}, {{ $is_wallet['id'] }})"
                                                        >
                                                            <i class="fi fi-task-list mr-0"></i>
                                                        </button>
                                                        <button class="btn btn-success btn-sm btn-vv-sm rounded" title="จัดการกระเป๋าเงินเกม {{ $is_wallet['game_name'] }}" 
                                                                data-toggle="modal" data-target="#editWalletModal" onClick="editWallet({{ $is_wallet['id'] }}, '{{ $is_wallet['game_name'] }}', '{{ session('user') }}')"
                                                        >
                                                            <i class="fi fi-pencil mr-0"></i>
                                                        </button>
                                                        
                                                        <a	href="#!" 
                                                            class="js-ajax-confirm btn btn-danger btn-sm btn-vv-sm rounded" 
                                                            data-href="/account/delete-wallet/{{ $is_wallet['id'] }}"
                                                            data-ajax-confirm-body="<center><h4 class='mb-2'>ยืนยันการลบกระเป๋าเกม : {{ $is_wallet['game_name'] }}  ? </h4>
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
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
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
    @include('account.wallet_modals.create_wallet_modal')

    @include('account.wallet_modals.edit_wallet_modal')

    @include('account.wallet_modals.deposit_wallet_modal')

    @include('account.wallet_modals.withdraw_wallet_modal')

    @include('account.wallet_modals.histories_wallet_modal')

    @include('account.wallet_modals.sub_histories_wallet_modal')
@endsection