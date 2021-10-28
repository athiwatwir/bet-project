<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider as Route;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('forgot-password', ['status' => 100]);
    }

    // public function resetPassword1()
    // {
    //     return view('reset-password', ['status' => 200, 'user' => 'xxx']);
    // }

    public function forgotPassword(Request $request)
    {
        $this->validate($request, [
            'phone' => ['required', 'numeric', 'digits:10'],
        ],
        [
            'phone.required' => 'กรุณาระบุหมายเลขโทรศัพท์',
            'phone.numeric' => 'หมายเลขโทรศัพท์จะต้องเป็นตัวเลขเท่านั้น',
            'phone.digits' => 'จำนวนหมายเลขโทรศัพท์ไม่ถูกต้อง กรุณาตรวจสอบ'
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post(Route::API.'/forgot-password',[
            'phone' => $request->phone,
        ]);

        $res = json_decode($response->getBody()->getContents(), true);

        if(isset($res['status'])) {
            if($res['status'] == 200){
                return view('forgot-password', ['status' => $res['status'], 'ref' => $res['ref']]);
            }else{
                return redirect()->back()->with('error', $res['message']);
            }
        }else{
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่');
        }
    }

    public function confirmOtp(Request $request)
    {
        if(isset($request->otp)) {
            $response = Http::withHeaders([
                'Accept' => 'application/json'
            ])->post(Route::API.'/confirm-otp',[
                'ref' => $request->ref,
                'otp' => $request->otp
            ]);
    
            $res = json_decode($response->getBody()->getContents(), true);
    
            if(isset($res['status'])) {
                if($res['status'] == 200){
                    return view('reset-password', ['status' => $res['status'], 'user' => $res['user']]);
                }else{
                    return redirect()->back()->with('error', $res['message']);
                }
            }else{
                return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่');
            }
        }
    }

    public function resetPassword(Request $request)
    {
        if(isset($request->password)) {
            $response = Http::withHeaders([
                'Accept' => 'application/json'
            ])->post(Route::API.'/reset-password',[
                'user' => $request->user,
                'password' => $request->password
            ]);
    
            $res = json_decode($response->getBody()->getContents(), true);
    
            if(isset($res['status'])) {
                if($res['status'] == 200){
                    return redirect('/login')->with('success', 'เปลี่ยนรหัสผ่านใหม่เรียบร้อยแล้ว');
                }else{
                    return redirect('/login')->with('error', $res['message']);
                }
            }else{
                return redirect('/login')->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่');
            }
        }
    }
}
