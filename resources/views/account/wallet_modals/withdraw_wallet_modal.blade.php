<!-- Withdraw Wallet Modal -->
<div class="modal fade" id="withdrawWalletModal" tabindex="-1" role="dialog" aria-labelledby="withdrawWalletModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 650px;">
        <div class="modal-content">
            <form method="POST" action="{{ url('/account/withdraw-wallet') }}" enctype="multipart/form-data">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ถอนเงินออกจากกระเป๋า <span id="is_amount"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(isset($user_bank))
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h6>{{ $user_bank['bank_name'] }}</h6>
                                <p class="mb-1">{{ $user_bank['bank_account_name'] }}</p>
                                <p class="mb-0">{{ $user_bank['bank_account_number'] }}</p>
                            </div>
                        </div>
                        
                        <hr class="bg-secondary text-secondary">

                        <div class="row">
                            <div class="col-md-10 offset-1">
                                <div class="card px-2 py-3">
                                    <div class="card-body p-0">
                                        <div class="form-label-group row mt-3">
                                            <label for="payment_amount" class="col-md-3 col-form-label text-md-right">{{ __('จำนวนเงิน') }} <span class="text-danger">*</span></label>

                                            <div class="col-md-8">
                                                <small class="text-dark"><strong>ยอดเงินที่ถอนได้ :</strong> <span class="text-danger">{{ number_format($wallet['amount']) }}</span> <small>{{ $wallet['currency'] }}</small></small>
                                                <input required placeholder="0" id="payment_amount" type="number" class="form-control" name="payment_amount" value="{{ old('payment_amount') }}" autocomplete="payment_amount">
                                                <small class="text-danger fs--10">*สูงสุดได้ไม่เกิน {{ number_format($level['limit_withdraw']) }}฿</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="user_bank" value="{{ $user_bank['id'] }}">
                    @else
                        <p>ยังไม่ได้เพิ่มบัญชีธนาคาร กรุณา<a href="{{ url('/account/banking') }}">เพิ่มบัญชีธนาคาร</a></p>
                    @endif

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">ยกเลิก</button>
                    @if(isset($user_bank))
                        <button type="submit" class="btn btn-primary btn-sm">แจ้งถอนเงิน</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>