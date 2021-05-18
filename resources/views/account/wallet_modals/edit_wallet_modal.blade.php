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
                                    <option value="{{ $is_wallet['id'] }}">กระเป๋าเกม : {{ $is_wallet['game_name'] }}</option>
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