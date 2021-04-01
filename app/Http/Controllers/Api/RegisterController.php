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
        $this->validate($request, [
            'username' => ['required', 'alpha', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'min:6'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:10', 'max:10'],
            'currency' => ['required', 'string', 'max:5'],
            'how_to_know' => ['required', 'string', 'max:255'],
        ],
        [
            'username.alpha' => 'ชื่อผู้ใช้ต้องเป็นภาษาอังกฤษเท่านั้น',
            'password.confirmed' => 'รหัสผ่านไม่ตรงกัน...',
            'password.min' => 'รหัสผ่านจะต้องมีมากกว่า 6 ตัวอักษร'
        ]);

        $how_to_know_desc = ($request->how_to_know == 'friend' || $request->how_to_know == 'etc') ? $request->how_to_know_desc : '';
        $response = Http::post(RouteServiceProvider::API.'/register', [
            'username' => $request->username,
            'password' => $request->password,
            'name' => $request->name,
            'phone' => $request->phone,
            'line' => $request->line,
            'currency' => $request->currency,
            'how_to_know' => $request->how_to_know,
            'how_to_know_desc' => $how_to_know_desc,
        ]);

        if($response->getStatusCode() == 200){
            return redirect()->back()->with('success', 'ลงทะเบียนเรียบร้อยแล้ว');
        }else{
            return redirect()->back()->with('danger', 'เกิดข้อผิดพลาด กรุณาลองใหม่ภายหลัง');
        }
        // dd($response->getBody()->getContents());
    }
}
