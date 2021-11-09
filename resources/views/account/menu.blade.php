<div class="portlet-header pb-2">
    <div class="d-flex">
        <a href="{{ url('/account/wallets') }}" class="btn btn-sm @if($menu == 'wallet') btn-primary @else btn-outline-secondary btn-custom @endif">กระเป๋าเงิน</a>
        <a href="{{ url('/account/') }}" class="btn btn-sm @if($menu == 'profile') btn-primary @else btn-outline-secondary btn-custom @endif">ข้อมูลส่วนตัว</a>
        <a href="{{ url('/account/banking') }}" class="btn btn-sm @if($menu == 'bank') btn-primary @else btn-outline-secondary btn-custom @endif">บัญชีธนาคาร</a>
        <a href="{{ url('/account/change-password') }}" class="btn btn-sm @if($menu == 'password') btn-primary @else btn-outline-secondary btn-custom @endif">แก้ไขรหัสผ่าน</a>
    </div>
    <div class="d-flex">
        <p class="mt-2 mb-0 mr-3"><strong class="text-dark">เลเวล ::</strong> {{ $level['name'] }}</p>
        <p class="mt-2 mb-0 mr-3"><strong class="text-dark">ฝากได้สูงสุด ::</strong> {{ number_format($level['limit_deposit']) }}฿</p>
        <p class="mt-2 mb-0 mr-3"><strong class="text-dark">ถอนได้สูงสุด ::</strong> {{ number_format($level['limit_withdraw']) }}฿</p>
        <p class="mt-2 mb-0 mr-3"><strong class="text-dark">โอนได้สูงสุด ::</strong> {{ number_format($level['limit_transfer']) }}฿</p>
    </div>
</div>

<style>
    .btn-custom:hover {
        background-color: rgb(55 125 255 / 70%);
    }
</style>