@extends('layouts.core')

@section('title', 'กระเป๋าเงิน')

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
                <div class="portlet-body pt-0 pl-4 pr-4">
                    
                    <div class="row" style="padding-top: 10px; border-top: 1px solid #333;">
                        <div class="col-md-6">
                            <div class="card" style="border-top: 7px solid #ff0000;">
                                <div class="card-body card-body-wallet">
                                    <div class="col-md-12 p-0">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-md-6 col-on-btn">
                                                        <button type="button" class="btn btn-primary btn-sm btn-block btn-shadow btn-wallet" data-toggle="modal" data-target="#depositWalletModal" style="line-height: 13px;">ฝากเงิน<br/><small class="fs--10">(แจ้งโอนเงิน)</small></button>
                                                        <button type="button" class="btn btn-success btn-sm btn-block ml-0 btn-shadow btn-wallet" data-toggle="modal" data-target="#withdrawWalletModal">ถอนเงิน</button>
                                                    </div>
                                                    <div class="col-md-6 col-on-btn">
                                                        <button type="button" class="btn btn-warning btn-sm btn-block btn-shadow btn-wallet" data-toggle="modal" data-target="#transferToGameModal">โอนเข้าเกมส์</button>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <a href="#!" data-toggle="modal" data-target="#historiesWalletModal"><small><i class="fi fi-task-list"></i> ประวัติการทำรายการ</small></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 text-right">
                                                <h5 class="mb-1 h5-wallet"><strong>กระเป๋าเงินหลัก</strong></h5>
                                                <span id="default-wallet" style="display: none;">{{$wallet['amount']}}</span>
                                                <h1 style="color: #ff0000;" class="wallet-money-size">฿{{ number_format($wallet['amount']) }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card" style="border-top: 7px solid #0008ff;">
                                <div class="card-body text-right card-body-wallet">
                                    <h5 class="mb-1 h5-wallet"><strong>กระเป๋าเงินเกมทั้งหมด</strong></h5>
                                    <h1 style="color: #0008ff;" class="wallet-money-size">฿<span id="realtime_amount_main"></span></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card" style="border-top: 7px solid #00cd06;">
                                <div class="card-body text-right card-body-wallet">
                                    <h5 class="mb-1 h5-wallet"><strong>รวมเงินทั้งหมด</strong></h5>
                                    <h1 style="color: #00cd06;" class="wallet-money-size">฿<span id="realtime_all_amount"></span></h1>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-12 mt-3 text-right">
                            <button type="button" class="btn btn-primary btn-sm btn-shadow" data-toggle="modal" data-target="#createWalletModal">
                                <i class="fi fi-plus"></i> เพิ่มกระเป๋าเงินเกม
                            </button>
                        </div> -->

                        <div class="col-md-12 mt-5">
                            <p class="text-dark fs--20 mb-0 d-flex">
                                <strong>กระเป๋าเงินแต่ละเกม</strong> 
                                <button class="btn btn-vv-sm btn-primary ml-2" data-toggle="modal" data-target="#createWalletModal" title="เพิ่มกระเป๋าเงินเกม"><strong><i class="fi fi-plus"></i></strong></button>
                            </p>
                            <hr class="bg-dark my-1"/>
                            <div class="table-responsive mt-1">

                                <table class="table table-align-middle border-bottom mb-6">

                                    <thead>
                                        <tr class="text-muted fs--13 bg-light">
                                            <th class="hidden-lg-down text-center" style="width: 5%;">#</th>
                                            <th style="width: 20%;">
                                                <span class="px-2 p-0-xs">
                                                    กระเป๋าเงินเกม
                                                </span>
                                            </th>
                                            <th class="hidden-lg-down text-center" style="width: 20%;">จำนวนเงิน</th>
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

                                                <td class="hidden-lg-down text-center">
                                                    <script>gamewallet("{{ $is_wallet['game_name'] }}", "{{ $key }}")</script>
                                                    <span id="wallet_game_{{ $key }}"></span> <small><small>{{ $is_wallet['currency'] }}</small></small>
                                                </td>

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
                                                        <button class="btn btn-warning btn-sm rounded" title="โอนเงินออกจากกระเป๋าเงินเกม {{ $is_wallet['game_name'] }}" 
                                                                data-toggle="modal" data-target="#transferToWallet" onClick="editWallet('{{ $is_wallet['id'] }}', '{{ $is_wallet['game_name'] }}', '{{ session('user') }}')"
                                                                style="padding: 3px 15px;"
                                                        >
                                                            <small>โอนออก</small>
                                                        </button>
                                                        <button class="btn btn-secondary btn-sm rounded" title="ประวัติการทำรายการเกม {{ $is_wallet['game_name'] }}" 
                                                                data-toggle="modal" data-target="#subHistoriesWalletModal" onClick="subWalletHistory({{ json_encode($is_wallet['trans']) }}, '{{ $is_wallet['id'] }}')"
                                                                style="padding: 3px 15px;"
                                                        >
                                                            <small>ประวัติการทำรายการ</small>
                                                        </button>
                                                        <button class="btn btn-secondary btn-sm rounded" title="รายละเอียดการเล่นเกม {{ $is_wallet['game_name'] }}" 
                                                                data-toggle="modal" data-target="#playerSummaryModal"
                                                                style="padding: 3px 15px;"
                                                        >
                                                            <small>รายละเอียดการเล่น</small>
                                                        </button>
                                                        
                                                        <!-- <a	href="#!" 
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
                                                        </a> -->
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

<style>
    .dt-buttons.btn-group.flex-wrap {
        display: none;
    }
</style>
@endsection

@section('modal')
    @include('account.wallet_modals.create_wallet_modal')

    @include('account.wallet_modals.deposit_wallet_modal')

    @include('account.wallet_modals.withdraw_wallet_modal')

    @include('account.wallet_modals.histories_wallet_modal')

    @include('account.wallet_modals.sub_histories_wallet_modal')

    @include('account.wallet_modals.transfer_to_game')

    @include('account.wallet_modals.transfer_to_wallet')

    @include('account.wallet_modals.pgsoftPlayerSummary')
@endsection