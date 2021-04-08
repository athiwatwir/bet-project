<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{
    public function index()
    {
        if(session()->has('_t')){
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. session('_t'),
            ])->get(RouteServiceProvider::API.'/user/view');

            $res = json_decode($response->getBody()->getContents(), true);
            // Log::debug($res['user']);

            return view('account.profile', ['user' => $res['user']]);
        }else{
            return redirect('/login')->with('warning', 'กรุณาเข้าสู่ระบบ');
        }
    }

    public function changePassword()
    {
        if(session()->has('_t')){
            return view('account.change-password');
        }else{
            return redirect('/login')->with('warning', 'กรุณาเข้าสู่ระบบ');
        }
    }

    public function personalUpdate(Request $request)
    {
        $this->validate($request, [
            'account_name' => ['required', 'string', 'max:255'],
            'account_phone' => ['required', 'string'],
        ],
        [
            'account_name.required' => 'กรุณาระบบชื่อ - สกุล',
            'account_phone.required' => 'กรุณาระบบหมายเลขโทรศัพท์'
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. session('_t'),
            ])->post(RouteServiceProvider::API.'/user/update',[
                'name' => $request->account_name,
                'phone' => $request->account_phone,
                'line' => $request->account_line,
        ]);

        $res = json_decode($response->getBody()->getContents(), true);

        if($res['status'] == 200){
            return redirect()->back()->with('success', 'แก้ไขเรียบร้อยแล้ว');
        }else{
            return redirect()->back()->with('error', $res['message']);
        }
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'account_current_password' => ['required', 'string'],
            'account_new_password' => ['required', 'string', 'min:6'],
            'account_new_password_confirmation' => ['required', 'string', 'min:6', 'same:account_new_password'],
        ],
        [
            'account_new_password.min' => 'รหัสผ่านจะต้องมีมากกว่า 6 ตัวอักษร'
        ]);
    }
}
