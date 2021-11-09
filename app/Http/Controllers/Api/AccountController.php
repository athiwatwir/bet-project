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
            $level = $this->loadUserLevel(session('_t'));

            return view('account.profile', ['user' => $res['user'], 'level' => $level['level'], 'menu' => 'profile']);
        }else{
            return redirect('/login');
        }
    }

    public function loadUserLevel($token)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $token,
        ])->get(RouteServiceProvider::API.'/user/level');

        $res = json_decode($response->getBody()->getContents(), true);
        return $res;
    }

    public function changePassword()
    {
        if(session()->has('_t')){
            $level = $this->loadUserLevel(session('_t'));
            return view('account.change-password', ['level' => $level['level'], 'menu' => 'password']);
        }else{
            return redirect('/login');
        }
    }

    public function banking()
    {
        if(session()->has('_t')){
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. session('_t'),
                ])->get(RouteServiceProvider::API.'/user/user-banking');

            $res = json_decode($response->getBody()->getContents(), true);
            $level = $this->loadUserLevel(session('_t'));
            // Log::debug($res);

            return view('account.banking', ['bank' => $res['bank'], 'b_lists' => $res['b_list'], 'status' => $res['status'], 'level' => $level['level'], 'menu' => 'bank']);
        }else{
            return redirect('/login');
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
            'account_new_password.min' => 'รหัสผ่านจะต้องมีมากกว่า 6 ตัวอักษร',
            'account_new_password_confirmation.same' => 'รหัสผ่านไม่ตรงกัน'
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. session('_t'),
            ])->post(RouteServiceProvider::API.'/user/change-password',[
                'current_password' => $request->account_current_password,
                'new_password' => $request->account_new_password,
        ]);

        $res = json_decode($response->getBody()->getContents(), true);

        if($res['status'] == 200){
            return redirect()->back()->with('success', 'แก้ไขรหัสผ่านเรียบร้อยแล้ว');
        }

        return redirect()->back()->with('error', $res['message']);
    }

    public function bankingUpdate(Request $request)
    {
        // Log::debug($request);
        $this->validate($request, [
            'bank_name' => ['required'],
            'bank_account_name' => ['required', 'string'],
            'bank_account_number' => ['required', 'numeric'],
        ],
        [
            'bank_name.required' => 'กรุณาเลือกธนาคาร',
            'bank_account_name.required' => 'กรุณาระบุชื่อบัญชี',
            'bank_account_number.required' => 'กรุณาระบุเลขบัญชี',
            'bank_account_number.numeric' => 'เลขบัญชีจะต้องเป็นตัวเลขเท่านั้น'
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. session('_t'),
            ])->post(RouteServiceProvider::API.'/user/user-banking',[
                'bank_name' => $request->bank_name,
                'bank_account_name' => $request->bank_account_name,
                'bank_account_number' => $request->bank_account_number,
        ]);

        $res = json_decode($response->getBody()->getContents(), true);

        if($res['status'] == 200) {
            return redirect()->back()->with('success', 'บันทึกบัญชีธนาคารเรียบร้อยแล้ว');
        }

        return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่');
    }

    public function bankingEdit(Request $request)
    {
        $this->validate($request, [
            'bank_name' => ['required'],
            'bank_account_name' => ['required', 'string'],
            'bank_account_number' => ['required', 'numeric'],
        ],
        [
            'bank_name.required' => 'กรุณาเลือกธนาคาร',
            'bank_account_name.required' => 'กรุณาระบุชื่อบัญชี',
            'bank_account_number.required' => 'กรุณาระบุเลขบัญชี',
            'bank_account_number.numeric' => 'เลขบัญชีจะต้องเป็นตัวเลขเท่านั้น'
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. session('_t'),
            ])->post(RouteServiceProvider::API.'/user/user-banking-edit',[
                'bank_name' => $request->bank_name,
                'bank_account_name' => $request->bank_account_name,
                'bank_account_number' => $request->bank_account_number,
        ]);

        $res = json_decode($response->getBody()->getContents(), true);

        if($res['status'] == 200) {
            return redirect()->back()->with('success', 'แก้ไขข้อมูลบัญชีธนาคารเรียบร้อยแล้ว');
        }

        return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่');
    }
}
