<!-- WMGAME Player Summary Modal -->
<div class="modal fade" id="playerSummaryModal-WMGAME" tabindex="-1" role="dialog" aria-labelledby="playerSummaryModal-WMGAME" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle-WMGAME">รายละเอียดการเล่น</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table class="table-datatable table table-bordered table-hover table-striped"
                    data-lng-empty="ไม่มีข้อมูล..." 
                    data-lng-page-info="แสดงผลข้อมูลที่ _START_ ถึง _END_ จากทั้งหมด _TOTAL_ ข้อมูล" 
                    data-lng-filtered="(filtered from _MAX_ total entries)" 
                    data-lng-loading="กำลังโหลด..." 
                    data-lng-processing="กำลังดำเนินการ..." 
                    data-lng-search="ค้นหา..." 
                    data-lng-norecords="ไม่มีข้อมูลที่ค้นหา..." 
                    data-lng-sort-ascending=": activate to sort column ascending" 
                    data-lng-sort-descending=": activate to sort column descending" 

                    data-lng-column-visibility="ปิดการแสดงผลคอลัมน์" 
                    data-lng-csv="CSV" 
                    data-lng-pdf="PDF" 
                    data-lng-xls="XLS" 
                    data-lng-copy="Copy" 
                    data-lng-print="Print" 
                    data-lng-all="ทั้งหมด" 

                    data-main-search="true" 
                    data-column-search="false" 
                    data-row-reorder="false" 
                    data-col-reorder="true" 
                    data-responsive="true" 
                    data-header-fixed="true" 
                    data-select-onclick="false" 
                    data-enable-paging="true" 
                    data-enable-col-sorting="false" 
                    data-autofill="false" 
                    data-group="false" 
                    data-items-per-page="10" 

                    data-lng-export="<i class='fi fi-squared-dots fs--18 line-height-1'></i>" 
                    dara-export-pdf-disable-mobile="true" 
                    data-export='["csv", "pdf", "xls"]' 
                    data-options='["copy", "print"]' 
                >
                    <thead>
                        <tr class="text-muted fs--13">
                            <th>รายชื่อเกมที่เล่น</th>
                            <th class="text-center">จำนวนการเล่น <small>(ครั้ง)</small></th>
                            <th class="text-center">จำนวนเงินเดิมพัน <small>(THB)</small></th>
                            <th class="text-center"><span class="text-success">ชนะ</span> / <span class="text-danger">แพ้</span> <small>(THB)</small></th>
                        </tr>
                    </thead>

                    <tbody id="item_list">
                        @foreach ($wmgame_player_summaries as $key => $result)
                            <tr>
                                <td><strong class="text-dark">{{ $result['gameName'] }}</strong></td>

                                <td class="text-center">{{ number_format($result['hands']) }}</td>

                                <td class="text-center">{{ number_format($result['betAmount'], 2) }}</td>

                                <td class="text-center">
                                    <strong class="@if($result['winLossAmount'] > 0) text-success @elseif($result['winLossAmount'] < 0) text-danger @endif">
                                    {{ number_format($result['winLossAmount'], 2) }}
                                    </strong>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr class="text-muted fs--13">
                            <th>รายชื่อเกมที่เล่น</th>
                            <th class="text-center">จำนวนการเล่น</th>
                            <th class="text-center">จำนวนเงินเดิมพัน</th>
                            <th class="text-center"><span class="text-success">ชนะ</span> / <span class="text-danger">แพ้</span></th>
                        </tr>
                    </tfoot>

                </table>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>