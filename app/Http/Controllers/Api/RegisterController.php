<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    protected $api = RouteServiceProvider::API;

    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {   
        $response = Http::post(RouteServiceProvider::API.'/register', [
            'username' => $request->username,
            'password' => $request->password,
            'name' => $request->name,
            'phone' => $request->phone,
            'line' => $request->line,
            'currency' => $request->currency,
            'how_to_know' => $request->how_to_know
        ]);

        dd($response);
    }
}
