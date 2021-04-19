<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Log;

class WalletController extends Controller
{
    public function index()
    {
        if(session()->has('_t')){
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. session('_t'),
                ])->get(RouteServiceProvider::API.'/user/wallets');

            $res = json_decode($response->getBody()->getContents(), true);

            return view('account.wallets', ['wallet' => $res['wallet'], 'wallets' => $res['wallets'],'status' => $res['status']]);
        }else{
            return redirect('/login');
        }
    }

    public function createWallet(Request $request)
    {
        $this->validate($request, [
            'game' => ['required'],
        ],
        [
            'game.required' => 'กรุณาเลือกรายการเกม',
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. session('_t'),
            ])->post(RouteServiceProvider::API.'/user/create-wallet',[
                'game_id' => $request->game,
                'amount' => $request->amount,
        ]);

        $res = json_decode($response->getBody()->getContents(), true);

        if($res['status'] == 200) {
            return redirect()->back()->with('success', 'เพิ่มกระเป๋าเงินเรียบร้อยแล้ว');
        }else if($res['status'] == 301) {
            return redirect()->back()->with('error', 'เงินในกระเป๋าหลักไม่เพียงพอ...กรุณาเพิ่มเงิน หรือ โยกย้ายมาจากเกมอื่น');
        }

        return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่');
    }


    public function editWallet(Request $request)
    {
        if($request->wallet_option == 1) {
            $this->validate($request, [
                'add_amount' => ['required'],
            ],
            [
                'add_amount.required' => 'กรุณาเลือกระบุจำนวนเงิน',
            ]);

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. session('_t'),
                ])->post(RouteServiceProvider::API.'/user/add-wallet',[
                    'id' => $request->wallet_id,
                    'amount' => $request->add_amount,
            ]);
    
            $res = json_decode($response->getBody()->getContents(), true);
    
            if($res['status'] == 200) {
                return redirect()->back()->with('success', 'เพิ่มเงินเข้ากระเป๋าเงินเรียบร้อยแล้ว');
            }else if($res['status'] == 301) {
                return redirect()->back()->with('error', 'เงินในกระเป๋าหลักไม่เพียงพอ...กรุณาเพิ่มเงิน หรือ โยกย้ายมาจากเกมอื่น');
            }
    
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่');
            
        }else if($request->wallet_option == 2) {
            $this->validate($request, [
                'to_wallet' => ['required'],
                'change_amount' => ['required']
            ],
            [
                'to_wallet.required' => 'กรุณาเลือกกระเป๋าเงิน',
                'change_amount.required' => 'กรุณาระบุจำนวนเงิน',
            ]);

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. session('_t'),
                ])->post(RouteServiceProvider::API.'/user/transfer-wallet',[
                    'id' => $request->wallet_id,
                    'to' => $request->to_wallet,
                    'amount' => $request->change_amount,
            ]);
    
            $res = json_decode($response->getBody()->getContents(), true);
    
            if($res['status'] == 200) {
                return redirect()->back()->with('success', 'ย้ายเงินไปยังกระเป๋าเกมส์อื่นเรียบร้อยแล้ว');
            }else if($res['status'] == 301) {
                return redirect()->back()->with('error', 'เงินในกระเป๋าไม่เพียงพอ...กรุณาเพิ่มเงิน หรือ โยกย้ายมาจากกระเป๋าอื่น');
            }
    
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่');
        }
    }
}
