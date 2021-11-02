<div class="portlet-header d-flex pb-2">
    <a href="{{ url('/account/wallets') }}" class="btn btn-sm @if($menu == 'wallet') btn-primary @else btn-outline-secondary btn-custom @endif">กระเป๋าเงิน</a>
    <a href="{{ url('/account/') }}" class="btn btn-sm @if($menu == 'profile') btn-primary @else btn-outline-secondary btn-custom @endif">ข้อมูลส่วนตัว</a>
    <a href="{{ url('/account/banking') }}" class="btn btn-sm @if($menu == 'bank') btn-primary @else btn-outline-secondary btn-custom @endif">บัญชีธนาคาร</a>
    <a href="{{ url('/account/change-password') }}" class="btn btn-sm @if($menu == 'password') btn-primary @else btn-outline-secondary btn-custom @endif">แก้ไขรหัสผ่าน</a>
</div>

<style>
    .btn-custom:hover {
        background-color: rgb(55 125 255 / 70%);
    }
</style>