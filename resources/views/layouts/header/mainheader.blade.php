<!-- HEADER -->
<header id="header" class="shadow-xs bg-bet">
    <div id="top_bar" class="fs--14 d-none d-sm-block"> <!-- optional if body.header-sticky is present: add .js-ignore class to ignore autohide and stay visible all the time -->
        <div class="container">
            @include('layouts.header.profile')
        </div>
    </div>

    @include('layouts.header.menu')
</header>
<!-- /HEADER -->