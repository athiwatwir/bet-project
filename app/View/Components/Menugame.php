<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Http\Controllers\Api\GamesController;
use Illuminate\Support\Facades\Cache;

class Menugame extends Component
{
    public $menugames;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menugames = Cache::remember('menugames', 86000, function () {
            return (new GamesController)->menuGame();
        });
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.menugame');
    }
}
