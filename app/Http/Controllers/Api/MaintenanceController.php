<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

use App\Helpers\PrivateKeyComponent;

class MaintenanceController extends Controller
{
    public function websiteMaintenanceDown(Request $request) {
        if($request->private_key == PrivateKeyComponent::PRIVATE_KEY) {
            Artisan::call('down --secret="'.$request->secret_key.'"');
        }
    }

    public function websiteMaintenanceUp(Request $request) {
        if($request->private_key == PrivateKeyComponent::PRIVATE_KEY) {
            Artisan::call('up');
        }
    }
}
