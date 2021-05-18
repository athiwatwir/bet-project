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

                    <table id="sub_wallet_history_table" class="table table-align-middle border-bottom mb-3">

                        <thead>
                            <tr class="text-muted fs--13 bg-light">
                                <th>
                                    <span class="px-2 p-0-xs">
                                        วัน-เวลา
                                    </span>
                                </th>
                                <th class="hidden-lg-down text-center">ประเภท</th>
                                <th class="hidden-lg-down text-center">รับมาจากบัญชี</th>
                                <th class="hidden-lg-down text-center">ส่งไปยังบัญชี</th>
                                <th class="hidden-lg-down text-center">จำนวนเงิน</th>
                                <th class="hidden-lg-down text-center">สถานะ</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody id="item_list">

                            

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