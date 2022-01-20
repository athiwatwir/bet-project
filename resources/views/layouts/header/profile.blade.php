<div class="text-nowrap"><!-- change with .scrollable-horizontal to horizontally scroll, if -only- no dropdown is present -->
    <div class="d-flex justify-content-between">
        @include('layouts.header.logo')
        <div class="d-inline-block float-end pt--5">
            <ul class="list-inline list-unstyled mb-0 d-flex align-items-end">
                @if(session()->has('_t'))
                    <li class="list-inline-item mx-1 dropdown">
                        <a href="{{ url('/account/wallets') }}">
                            <span class="group-icon btn btn-sm rounded-circle btn-secondary">
                                <i class="fi fi-user-male"></i>
                                <i class="fi fi-close"></i>
                            </span>
                            <span class="text-white p-1 mt-1 fs--15">สวัสดี {{ session('user') }}</span>
                        </a>
                    </li>
                    <li class="list-inline-item mx-1 dropdown">
                        <a href="{{ url('/logout') }}"
                            title="ออกจากระบบ"
                            class="js-ajax-confirm text-white prefix-icon-ignore dropdown-footer dropdown-custom-ignore"
                            data-ajax-confirm-btn-yes-class="btn-sm btn-secondary" 
                            data-ajax-confirm-body="ออกจากระบบ?" 
                            data-ajax-confirm-btn-yes-text="ออกจากระบบ" 
                            data-ajax-confirm-btn-yes-icon="fi fi-check" 
                            data-ajax-confirm-btn-no-text="ยกเลิก" 
                            data-ajax-confirm-type="secondary"
                        >
                            <i class="fi fi-power float-start"></i>
                            {{ __('ออกจากระบบ') }}
                        </a>
                    </li>
                @else
                    @include('layouts.header.register')
                @endif
            </ul>
        </div>
    </div>
</div>