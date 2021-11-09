<!-- Create Wallet Modal -->
<div class="modal fade" id="transferToGameModal" tabindex="-1" role="dialog" aria-labelledby="transferToGameModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ url('/account/edit-wallet') }}">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">โอนเข้าเกมส์</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-label-group row mt-3">
                        <label for="amount" class="col-md-3 col-form-label text-md-right">{{ __('เกม') }} <span class="text-danger">*</span></label>

                        <div class="col-md-8">
                            <select required id="game" name="wallet_id" class="form-control">
                                <option value="" selected disabled>-- เลือกเกม --</option>
                                @foreach($wallets as $key => $is_wallet)
                                    <option value="{{ $is_wallet['id'] }}">{{ $is_wallet['game_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-label-group row mt-3">
                        <label for="amount" class="col-md-3 col-form-label text-md-right">{{ __('จำนวนเงิน') }}</label>

                        <div class="col-md-8">
                            <small class="text-dark"><strong>ยอดเงินที่ใช้ได้ :</strong> <span class="text-danger">{{ number_format($wallet['amount']) }}</span> <small>{{ $wallet['currency'] }}</small></small>
                            <input placeholder="0" id="add_amount_wallet" type="number" class="form-control" name="add_amount_wallet" value="{{ old('amount') }}" autocomplete="amount">
                            <small class="text-danger fs--10">*สูงสุดได้ไม่เกิน {{ number_format($level['limit_transfer']) }}฿</small>
                        </div>
                    </div>
                    <input type="hidden" id="wallet_action" name="wallet_action" value="deposit">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary btn-sm">โอนเข้าเกมส์</button>
                </div>
            </form>
        </div>
    </div>
</div>