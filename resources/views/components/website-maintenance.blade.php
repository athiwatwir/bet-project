<div>
    @if($maintenance)
    <div class="alert alert-info alert-block timer-autohide" role="alert" data-timer-autohide="0">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fi fi-close" aria-hidden="true"></span>
        </button>
        <p class="text-center mb-0">
            <strong>แจ้งประกาศปิดปรับปรุงเว็บไซต์</strong><br/>
            ตั้งแต่วันที่ <strong>{{ $startdate }} เวลา {{ $starttime }}</strong> ถึงวันที่ <strong>{{ $enddate }} เวลา {{ $endtime }}</strong><br/>
            รายละเอียด : <strong>{{ $description }}</strong>
        </p>
    </div>
    @endif
</div>