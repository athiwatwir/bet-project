<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ],
        [
            'password.min' => 'รหัสผ่านจะต้องมีมากกว่า 6 ตัวอักษร'
        ]);

        $response = Http::post(RouteServiceProvider::API.'/login',[
            'username' => $request->username,
            'password' => $request->password,
        ]);

        $res = json_decode($response->getBody()->getContents(), true);
        // Log::debug($res);
        // return redirect()->back();
        if($res['status'] == 200){
            session(['_t' => $res['token'], 'name' => $res['name']]);
            return redirect()->back()->with('success', 'เข้าสู่ระบบแล้ว...');
        }else{
            return redirect()->back()->with('error', $res['message']);
        }
    }

    public function logout(Request $request)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. session('_t'),
        ])->get(RouteServiceProvider::API.'/logout');
        $res = json_decode($response->getBody()->getContents(), true);

        if($res['status'] == 200){
            session()->forget(['_t', 'name']);
            return redirect()->back()->with('success', 'ออกจากระบบเรียบร้อยแล้ว...');
        }else{
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด...กรุณาลองใหม่อีกครั้ง');
        }
    }
}
