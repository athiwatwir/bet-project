<!-- Withdraw Wallet Modal -->
<div class="modal fade" id="subHistoriesWalletModal" tabindex="-1" role="dialog" aria-labelledby="subHistoriesWalletModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ประวัติการทำรายการ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="table-responsive">

                    <table class="table table-align-middle border-bottom mb-6">

                        <thead>
                            <tr class="text-muted fs--13 bg-light">
                                <th>
                                    <span class="px-2 p-0-xs">
                                        รายการ
                                    </span>
                                </th>
                                <th class="hidden-lg-down text-center">วัน-เวลา</th>
                                <th class="hidden-lg-down text-center">ไปยังบัญชี</th>
                                <th class="hidden-lg-down text-center">จำนวนเงิน</th>
                                <th class="hidden-lg-down text-center">สถานะ</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody id="item_list">

                            @foreach ($sub_history as $key => $history)
                                @if($history['type'] == 'ย้าย' && $history['from_wallet_id'] == 8)
                                <tr id="message_id_{{ $key }}" class="text-dark">
                                    <td>
                                        <p class="mb-0 d-flex">
                                            <span class="badge badge-warning font-weight-normal fs--16">
                                                {{ $history['type'] }}
                                            </span>
                                        </p>

                                        <!-- MOBILE ONLY -->
                                        <div class="fs--13 d-block d-xl-none">
                                            <span class="d-block text-muted"></span>
                                            <span class="d-block text-muted"></span>
                                        </div>
                                        <!-- /MOBILE ONLY -->
                                    </td>

                                    <td class="hidden-lg-down text-center">
                                        {{ $history['action_date'] }}
                                    </td>

                                    <td class="hidden-lg-down text-center" style="line-height: 16px;">
                                        @if($history['type'] == 'ฝาก')
                                            {{ $history['bank_name'] }}<br/>
                                            <small>{{ $history['account_name'] }}</small><br/>
                                            <small>{{ $history['account_number'] }}</small>
                                        @elseif($history['type'] == 'ถอน')
                                            {{ $history['user_bank_name'] }}<br/>
                                            <small>{{ $history['bank_account_name'] }}</small><br/>
                                            <small>{{ $history['bank_account_number'] }}</small>
                                        @elseif($history['type'] == 'ย้าย')
                                            <small>
                                                @if($history['from_default'] == 'Y')
                                                    กระเป๋าหลัก
                                                @else
                                                    กระเป๋าเกม : {{ $history['from_game'] }}
                                                @endif
                                            </small><br/>
                                            <small>-></small></br>
                                            <small>
                                                @if($history['to_default'] == 'Y')
                                                    กระเป๋าหลัก
                                                @else
                                                    กระเป๋าเกม : {{ $history['to_game'] }}
                                                @endif
                                            </small>
                                        @endif
                                    </td>

                                    <td class="hidden-lg-down text-center">
                                        <strong class=" @if($history['type'] == 'ฝาก') text-success 
                                                    @elseif($history['type'] == 'ถอน') text-danger 
                                                    @elseif($history['type'] == 'ย้าย') text-warning
                                                    @endif "
                                        >{{ number_format($history['amount']) }}
                                        </strong>
                                    </td>

                                    <td class="hidden-lg-down text-center">
                                        @if($history['status'] == 'CO') 
                                            <small class="badge badge-success font-weight-normal">ยืนยันแล้ว</small>
                                        @elseif($history['status'] == 'VO')
                                            <small class="badge badge-danger font-weight-normal">ปฏิเสธแล้ว</small>
                                        @else
                                            <small class="badge badge-secondary font-weight-normal">รอยืนยัน</small>
                                        @endif
                                    </td>

                                </tr>
                                @endif
                            @endforeach

                        </tbody>

                    </table>
                </div>

                <!-- options and pagination -->
                <div class="row text-center-xs">

                    <div class="col-12 col-xl-6 float-end">

                        <!-- pagination -->
                        <nav aria-label="pagination">
                            
                        </nav>
                        <!-- pagination -->

                    </div>

                </div>
                <!-- /options and pagination -->

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>