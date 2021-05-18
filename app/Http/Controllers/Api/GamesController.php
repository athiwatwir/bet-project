<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\Log;

class GamesController extends Controller
{
    public function menuGame()
    {
        $response = Http::get(RouteServiceProvider::API.'/menu/games');

        $res = json_decode($response->getBody()->getContents(), true);
        foreach($res['menugames'] as $key => $groups) {
            foreach($groups['games'] as $item => $game) {
                if(isset($game['logo'])) $res['menugames'][$key]['games'][$item]['logo'] = RouteServiceProvider::STORAGE.'/logogames/'.$game['logo'];
            }
        }
        // Log::debug($res);

        return $res['menugames'];
    }

    public function view(Request $request)
    {
        Log::debug(Crypt::decrypt($request->id));
        return view('games.view');
    }
}
