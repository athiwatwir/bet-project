<div class="text-nowrap"><!-- change with .scrollable-horizontal to horizontally scroll, if -only- no dropdown is present -->
    <div class="d-flex justify-content-between">
        <div class="d-inline-block float-start">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo/logo-w.png') }}" width="110" height="50" alt="...">
            </a>
            

        </div>
        <div class="d-inline-block float-end pt--5">
            <ul class="list-inline list-unstyled mb-0 d-flex align-items-end">

                <li class="list-inline-item mx-1 dropdown">

                    <a href="#" aria-label="Account Options" id="dropdownAccountOptions" class="btn btn-sm rounded-circle btn-secondary" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        <span class="group-icon">
                            <i class="fi fi-user-male"></i>
                            <i class="fi fi-close"></i>
                        </span>
                    </a>

                    <div aria-labelledby="dropdownAccountOptions" class="prefix-link-icon prefix-icon-dot dropdown-menu dropdown-menu-clean dropdown-menu-invert dropdown-click-ignore dropdown-menu-dark p-0 mt--18 fs--15">
            <div class="dropdown-header">
                John Doe
            </div>
            <div class="dropdown-divider"></div>
            <a href="account-settings.html" title="Account Settings" class="dropdown-item text-truncate font-weight-light">
                Account Settings
            </a>
            <div class="dropdown-divider mb-0"></div>
            <a href="#!" title="Log Out" class="prefix-icon-ignore dropdown-footer dropdown-custom-ignore">
                <i class="fi fi-power float-start"></i>
                Log Out
            </a>
        </div>

    </li>

        @include('layouts.header.register')

        </ul>
        </div>
    </div>
</div>