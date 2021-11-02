<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider as Route;
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
        // Log::debug($request);
        $this->validate($request, [
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ],
        [
            'password.min' => 'รหัสผ่านจะต้องมีมากกว่า 6 ตัวอักษร'
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post(Route::API.'/login',[
            'username' => $request->username,
            'password' => $request->password,
        ]);

        $res = json_decode($response->getBody()->getContents(), true);
        // Log::debug($res);
        // return redirect()->back();
        if(isset($res['status'])) {
            if($res['status'] == 200){
                session(['_t' => $res['token'], 'name' => $res['name'], 'user' => $res['user']]);
                return redirect()->route('wallets')->with('success', 'เข้าสู่ระบบแล้ว...');
            }else{
                return redirect()->back()->with('error', $res['message']);
            }
        }else{
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่');
        }
    }

    public function login2(Request $request)
    {
        Log::debug($request);
    }

    public function logout(Request $request)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. session('_t'),
        ])->get(Route::API.'/logout');
        $res = json_decode($response->getBody()->getContents(), true);

        session()->forget(['_t', 'name']);
        return redirect()->back()->with('success', 'ออกจากระบบเรียบร้อยแล้ว...');

        // if($res['status'] == 200){
        //     session()->forget(['_t', 'name']);
        //     return redirect()->back()->with('success', 'ออกจากระบบเรียบร้อยแล้ว...');
        // }else{
        //     return redirect()->back()->with('error', 'เกิดข้อผิดพลาด...กรุณาลองใหม่อีกครั้ง');
        // }
    }
}
