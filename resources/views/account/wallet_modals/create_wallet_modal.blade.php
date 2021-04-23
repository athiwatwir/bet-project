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