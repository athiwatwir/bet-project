<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Providers\RouteServiceProvider;

class WebsiteMaintenance extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $maintenance = false;
    public $startdate = '';
    public $starttime = '';
    public $enddate = '';
    public $endtime = '';
    public $description = '';

    public function __construct()
    {
        $response = Http::get(RouteServiceProvider::API.'/website-maintenance');

        $res = json_decode($response->getBody()->getContents(), true);
        if(isset($res['data'])) {
            $this->startdate = date('d-m-Y', strtotime($res['data']['startdate']));
            $this->starttime = date('H:i', strtotime($res['data']['startdate']));
            $this->enddate = date('d-m-Y', strtotime($res['data']['enddate']));
            $this->endtime = date('H:i', strtotime($res['data']['enddate']));
            $this->description = $res['data']['description'];
            $this->maintenance = true;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.website-maintenance');
    }
}
