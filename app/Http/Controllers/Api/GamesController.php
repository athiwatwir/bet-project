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
        if(isset($res)) {
            foreach($res['menugames'] as $key => $groups) {
                foreach($groups['games'] as $item => $game) {
                    if(isset($game['logo'])) $res['menugames'][$key]['games'][$item]['logo'] = RouteServiceProvider::STORAGE.'/logogames/'.$game['logo'];
                }
            }
            return $res['menugames'];
        }
        
    }

    public function view(Request $request, $name, $id)
    {
        // $this->demo($name);
        if(session()->has('_t')){
            $table = $this->getTableName($name);
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. session('_t'),
                ])->get(RouteServiceProvider::API.'/game/play/'.Crypt::decrypt($id));
    
            $res = json_decode($response->getBody()->getContents(), true);
            // Log::debug($res['_tk']);
    
            return view('games.view', ['game' => $name, 'play' => $res['playgame'], 'status' => 200]);
        }

        return view('games.view', ['game' => $name, 'status' => 301]);
    }

    public function loginToGame(Request $request, $name)
    {
        if(session()->has('_t')){
            $table = $this->getTableName($name);
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. session('_t'),
                ])->get(RouteServiceProvider::API.'/game/login/'.$table);

            // $res = json_decode($response->getBody()->getContents(), true);
            if(isset($response['data'])) {
                $url = 'https://pg.playszone.com/'.$response['data'];
                return redirect()->away($url);
            }
        }
    }

    public function playDemo(Request $request, $game)
    {
        $demo_url = 'https://m.pg-demo.com/';
        $demo_option = '/index.html?__refer=m.pg-redirect.com&__sv=0&language=en-US&bet_type=2&operator_token=8735ze6y8kp7jpwmxvau7gvytu3adwj4';
        $demo = $demo_url.$game.$demo_option;
        return view('games.game-demo', ['demo' => $demo]);
    }

    private function demo($game)
    {
        $table = $this->getTableName($game);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. session('_t'),
            ])->get(RouteServiceProvider::API.'/game/demo/'.$table);

        $res = json_decode($response->getBody()->getContents(), true);
    }

    private function getTableName($game)
    {
        if($game == 'PG Softgame') return 'pgsoftgames';
    }
}
