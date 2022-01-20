@foreach($menugames as $group)
    <li class="nav-item dropdown dropdown-mega">
        <a href="#" id="mainNavShop" class="nav-link dropdown-toggle" 
            data-toggle="dropdown" 
            aria-haspopup="true" 
            aria-expanded="false">
            {{ $group['name'] }}
        </a>
        <div aria-labelledby="mainNavShop" class="dropdown-menu dropdown-menu-hover bg-bet-05">
            <ul class="list-unstyled m-0 p-0">
                <li class="dropdown-item bg-transparent">
                    <div class="row col-border-md menugame">
                        @foreach($group['games'] as $key => $game)
                            <div class="col-4 col-md-2 my-2">
                                <a href="{{ route('viewgame', ['id' => Crypt::encrypt($game['id']), 'gamecode' => Crypt::encrypt($game['gamecode']), 'name' => $game['name']]) }}" class="transition-hover-zoom-img">
                                    <img class="w-100" src="{{ $game['logo'] }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- <hr/> -->
                </li>
            </ul>
        </div>
    </li>
@endforeach