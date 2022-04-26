<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Providers\RouteServiceProvider;

class PlayerSummary extends Component
{
    public $report = '';
    public $gameCodeId = '';

    public function __construct($gameCode)
    {
        $this->gameCodeId = $gameCode;
        // $response = Http::withHeaders([
        //     'Accept' => 'application/json',
        //     'Authorization' => 'Bearer '. session('_t'),
        // ])->get(RouteServiceProvider::API.'/game/player-summaries/'.$gameCode);

        // $res = json_decode($response->getBody()->getContents(), true);
        // $this->report = $res['results'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.player-summary');
    }
}
