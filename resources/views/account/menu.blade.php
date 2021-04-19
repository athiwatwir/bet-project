<div class="col-md-4 text-white">
    <div class="card border-bottom-style">
        <div class="card-body">
            <div class="portlet-header pb-2 pt-0">
                <h4 class="d-block text-dark text-truncate font-weight-medium">
                    เมนูสมาชิก
                </h4>
            </div>
            <ul class="none-style pl-4">
                <li><i class="fi fi-arrow-right-full fs--12"></i> <a href="{{ url('/account/') }}">รายละเอียดผู้ใช้งาน</a></li>
                <li><i class="fi fi-arrow-right-full fs--12"></i> <a href="{{ url('/account/banking') }}">จัดการบัญชีธนาคาร</a></li>
                <li><i class="fi fi-arrow-right-full fs--12"></i> <a href="{{ url('/account/wallets') }}">จัดการกระเป๋าเงิน</a></li>
                <li><i class="fi fi-arrow-right-full fs--12"></i> <a href="{{ url('/account/change-password') }}">แก้ไขรหัสผ่าน</a></li>
                <li><i class="fi fi-arrow-right-full fs--12"></i> <a href="{{ url('/logout') }}">ออกจากระบบ</a>
            </ul>
        </div>
    </div>
</div>

<style>
    ul.none-style li {
        list-style-type: none;
        line-height: 28px;
        color: #333;
    }
    ul.none-style li a{
        color: #333;
    }
</style>