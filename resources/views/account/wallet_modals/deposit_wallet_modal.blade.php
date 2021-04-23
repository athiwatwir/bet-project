<!-- Deposit Wallet Modal -->
<div class="modal fade" id="depositWalletModal" tabindex="-1" role="dialog" aria-labelledby="depositWalletModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 650px;">
        <div class="modal-content">
            <form method="POST" action="{{ url('/account/deposit-wallet') }}" enctype="multipart/form-data">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ฝากเงินเข้ากระเป๋า <span id="is_amount"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    สมาชิกสามารถฝากเงินเข้ากระเป๋าได้โดยวิธีการดังนี้...
                    <ol>
                        <li>โอนเงินมาได้ที่ 
                            <div class="row my-3">
                                <div class="col-md-10 offset-1 table-responsive">
                                    <table class="table-align-middle border-bottom">
                                        <thead>
                                            <tr class="text-muted fs--13 bg-light">
                                                <th class="w--40 text-center">#</th>
                                                <th class="w--200">ธนาคาร</th>
                                                <th class="w--200">ชื่อบัญชี</th>
                                                <th class="w--120 text-center">เลขที่บัญชี</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($banks as $key=>$bank)
                                            <tr>
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td>{{ $bank['bank_name'] }}</td>
                                                <td>{{ $bank['account_name'] }}</td>
                                                <td class="text-center">{{ $bank['account_number'] }}</td>
                                            @endforeach
                                        <tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li>แจ้งโอนเงิน โดยสามารถแจ้งได้ที่แบบฟอร์มข้างล่างนี้...</li>
                    </ol>

                    <hr class="bg-secondary text-secondary">

                    <div class="card">
                        <div class="card-body">
                            <div class="form-label-group row mt-3">
                                <label for="payment_bank" class="col-md-3 col-form-label text-md-right">{{ __('ธนาคารที่โอน') }} <span class="text-danger">*</span></label>
                                
                                <div class="col-md-8">
                                    <select required id="payment_bank" name="payment_bank" class="form-control">
                                        <option value="" disabled selected>-- เลือกธนาคารที่โอนเงิน --</option>
                                            @foreach($banks as $is_bank)
                                                <option value="{{ $is_bank['id'] }}">ธ.{{ $is_bank['bank_name'] }} [{{ $is_bank['account_name'] }} : {{ $is_bank['account_number'] }}]</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        
                            <div class="form-label-group row mt-3">
                                <label for="payment_amount" class="col-md-3 col-form-label text-md-right">{{ __('จำนวนเงิน') }} <span class="text-danger">*</span></label>

                                <div class="col-md-8">
                                    <input required placeholder="0" id="payment_amount" type="number" class="form-control" name="payment_amount" value="{{ old('payment_amount') }}" autocomplete="payment_amount">
                                </div>
                            </div>

                            <div class="form-label-group row mt-3">
                                <label for="payment_slip" class="col-md-3 col-form-label text-md-right">{{ __('หลักฐานการโอน') }} <span class="text-danger">*</span></label>

                                <div class="col-md-8">
                                    <input required placeholder="กรุณาแนบสลิปโอนเงิน เพื่อความรวดเร็วในการตรวจสอบ" id="payment_slip" type="file" class="form-control" name="payment_slip" value="{{ old('payment_slip') }}" autocomplete="payment_slip">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary btn-sm">แจ้งโอนเงิน</button>
                </div>
            </form>
        </div>
    </div>
</div>