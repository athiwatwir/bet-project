<!-- Edit Wallet Modal -->
<div class="modal fade" id="transferToWallet" tabindex="-1" role="dialog" aria-labelledby="adminRegisterModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ url('/account/edit-wallet') }}">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">กระเป๋าเงินเกม <span id="is_game_name"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-label-group row">
                        <div class="col-md-12 flex mb-3">
                            <p class="text-dark"><strong>โอนเงินออกกระเป๋า</strong></p>
                            <div class="form-label-group row mt-3">
                                <label for="change_amount_wallet" class="col-md-3 col-form-label text-md-right">{{ __('จำนวนเงิน') }}</label>
                                <div class="col-md-8">
                                    <input placeholder="0" id="change_amount_wallet" type="number" class="form-control" name="change_amount_wallet" value="{{ old('change_amount') }}" autocomplete="change_amount">
                                    <small class="text-dark"><strong>ยอดเงินที่ถอนได้ :</strong> <span id="game_balance_2" class="text-danger"></span> {{ $wallet['currency'] }}</small>
                                    <input type="hidden" name="to_wallet" value="{{ $wallet['id'] }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="wallet_id" name="wallet_id" value="">
                    <input type="hidden" id="wallet_action" name="wallet_action" value="withdraw">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary btn-sm">ยืนยัน</button>
                </div>
            </form>
        </div>
    </div>
</div>