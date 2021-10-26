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
            'username' => ['required', 'string', 'max:255', 'regex:/(^([a-zA-Z]+)(\d+)?$)/u'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'min:6'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:10', 'max:10'],
            'currency' => ['required', 'string', 'max:5'],
            'how_to_know' => ['required', 'string', 'max:255'],
        ],
        [
            'username.regex' => 'ชื่อผู้ใช้ต้องเป็นภาษาอังกฤษเท่านั้น',
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

        $res = json_decode($response->getBody()->getContents(),true);
        if($res['status'] == 200){
            $result = $this->withLogin($request->username, $request->password);
            if($result['status'] == 200) {
                session(['_t' => $result['token'], 'name' => $result['name']]);
                return redirect('/')->with('success', 'ลงทะเบียนเรียบร้อยแล้ว');
            }
            // return redirect()->back()->with('success', 'ลงทะเบียนเรียบร้อยแล้ว');
        }else{
            return redirect()->back()->with('error', $res['message']);
        }
        // dd($response->getBody()->getContents());
    }

    private function withLogin($username, $password)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post(RouteServiceProvider::API.'/login',[
            'username' => $username,
            'password' => $password,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
