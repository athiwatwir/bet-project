<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Api\GamesController as isGame;

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

            $histories = $this->historiesWallet();
            $default_wallet_history = $this->defaultWalletHistories($histories);
            $sub_wallet = $this->subWalletHistories($res['wallets'], $histories);
            $games = (new isGame)->menuGame();
            $pgSoftWallet = $this->getPgsoftgameWallet(session('user'));
            // Log::debug($games);
            // Log::debug($default_wallet_history);

            return view('account.wallets', ['wallet' => $res['wallet'], 'wallets' => $sub_wallet, 'banks' => $res['banks'], 'user_bank' => $res['user_bank'], 'default_histories' => $default_wallet_history, 'histories' => $histories, 'games' => $games, 'status' => $res['status'], 'pgsoft_wallet' => $pgSoftWallet]);
        }else{
            return redirect('/login');
        }
    }

    private function getPgsoftgameWallet($username)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            ])->get('https://88.playszone.com/api/v2/pgsoftgame/wallet/'.$username);

        return $response['data'];
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
        }else if($res['status'] == 404) {
            return redirect()->back()->with('error', 'กระเป๋าเงินเกมส์ไม่อนุญาตให้ซ้ำกัน...กรุณาตรวจสอบ');
        }

        return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่');
    }


    public function editWallet(Request $request)
    {
        if($request->wallet_action == 'deposit') {
            $this->validate($request, [
                'add_amount_wallet' => ['required'],
            ],
            [
                'add_amount_wallet.required' => 'กรุณาเลือกระบุจำนวนเงิน',
            ]);

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. session('_t'),
                ])->post(RouteServiceProvider::API.'/user/add-wallet',[
                    'id' => $request->wallet_id,
                    'amount' => $request->add_amount_wallet,
            ]);
    
            $res = json_decode($response->getBody()->getContents(), true);
    
            if($res['status'] == 200) {
                return redirect()->back()->with('success', 'เพิ่มเงินเข้ากระเป๋าเงินเรียบร้อยแล้ว');
            }else if($res['status'] == 301) {
                return redirect()->back()->with('error', 'เงินในกระเป๋าหลักไม่เพียงพอ...กรุณาเพิ่มเงิน หรือ โยกย้ายมาจากเกมอื่น');
            }
    
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่');
            
        }else if($request->wallet_action == 'withdraw') {
            $this->validate($request, [
                'change_amount_wallet' => ['required']
            ],
            [
                'change_amount_wallet.required' => 'กรุณาระบุจำนวนเงิน'
            ]);

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. session('_t'),
                ])->post(RouteServiceProvider::API.'/user/transfer-wallet',[
                    'id' => $request->wallet_id,
                    'to' => $request->to_wallet,
                    'amount' => $request->change_amount_wallet,
            ]);
    
            $res = json_decode($response->getBody()->getContents(), true);
            if($res['status'] == 200) {
                return redirect()->back()->with('success', 'ย้ายเงินไปยังกระเป๋าเกมส์อื่นเรียบร้อยแล้ว');
            }else if($res['status'] == 301) {
                return redirect()->back()->with('error', 'เงินในกระเป๋าเกมไม่ถูกต้อง...กรุณาตรวจสอบ');
            }
    
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่');

        }else if($request->wallet_action == 'transfer') {
            $this->validate($request, [
                'to_wallet' => ['required'],
                'change_amount_wallet' => ['required']
            ],
            [
                'to_wallet.required' => 'กรุณาเลือกกระเป๋าเงิน',
                'change_amount_wallet.required' => 'กรุณาระบุจำนวนเงิน',
            ]);

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. session('_t'),
                ])->post(RouteServiceProvider::API.'/user/transfer-wallet',[
                    'id' => $request->wallet_id,
                    'to' => $request->to_wallet,
                    'amount' => $request->change_amount_wallet,
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

    public function deleteWallet(Request $request)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. session('_t'),
            ])->get(RouteServiceProvider::API.'/user/delete-wallet/'.$request->id);

        $res = json_decode($response->getBody()->getContents(), true);

        if($res['status'] == 200) {
            return redirect()->back()->with('success', 'ลบกระเป๋าเงินเกมออกเรียบร้อยแล้ว');
        }

        return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่...');
    }

    public function depositWallet(Request $request)
    {
        $request->validate([
            'payment_slip' => 'required|mimes:jpg,png,jpeg|max:1024',
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. session('_t'),
        ])->attach(
            'attachment', file_get_contents($request->payment_slip), 'slip.jpg'
        )->post(RouteServiceProvider::API.'/user/deposit-wallet',[
            'c_bank_account_id' => $request->payment_bank,
            'amount' => $request->payment_amount,
            'slip' => $request->payment_slip
        ]);

        $res = json_decode($response->getBody()->getContents(), true);

        if($res['status'] == 200) {
            return redirect()->back()->with('success', 'แจ้งโอนเงินเรียบร้อยแล้ว เมื่อตรวจสอบเรียบร้อยแล้วระบบจะเพิ่มเงินเข้ากระเป๋าหลักของคุณ');
        }

        return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง');
    }

    public function withdrawWallet(Request $request)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. session('_t'),
        ])->post(RouteServiceProvider::API.'/user/withdraw-wallet',[
            'user_bank_id' => $request->user_bank,
            'amount' => $request->payment_amount,
        ]);

        $res = json_decode($response->getBody()->getContents(), true);

        if($res['status'] == 200) {
            return redirect()->back()->with('success', 'แจ้งถอนเงินเรียบร้อยแล้ว เมื่อตรวจสอบเรียบร้อยแล้วระบบจะโอนเงินไปยังบัญชีของคุณ');
        }else if($res['status'] == 301) {
            return redirect()->back()->with('warning', 'เงินในกระเป๋าหลักไม่เพียงพอต่อการถอน...');
        }

        return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง');
    }

    public function getGameWallet(Request $request)
    {
        Log::debug('getGameWallet');
    }

    private function historiesWallet()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. session('_t'),
            ])->get(RouteServiceProvider::API.'/user/histories-wallet');

        $res = json_decode($response->getBody()->getContents(), true);
        // Log::debug($res);

        return $res['histories'];
    }

    private function defaultWalletHistories($histories)
    {
        // Log::debug($histories);
        $default_wallet_history = [];
        foreach($histories as $history) {
            if($history['type'] == 'ฝาก' || $history['type'] == 'ถอน') {
                array_push($default_wallet_history, $history);
            }else if($history['type'] == 'ย้าย' && $history['from_default'] == 'Y' || $history['to_default'] == 'Y') {
                array_push($default_wallet_history, $history);
            }
        }
        // array_replace($histories, $default_wallet_history);

        return $default_wallet_history;
    }

    private function subWalletHistories($wallets, $histories)
    {
        // Log::debug($histories);
        if(isset($histories)){
            $is_wallet = [];
            foreach($wallets as $wallet) {
                $a_wallet = $wallet;
                $a_wallet['trans'] = [];
                foreach($histories as $history) {
                    if($history['type'] == 'ย้าย' && $history['from_wallet_id'] == $wallet['id'] || $history['type'] == 'ย้าย' && $history['to_wallet_id'] == $wallet['id']) {
                        array_push($a_wallet['trans'], $history);
                    }else if($history['type'] == 'เพิ่ม' && $history['to_wallet_id'] == $wallet['id'] || $history['type'] == 'ลด' && $history['to_wallet_id'] == $wallet['id']) {
                        array_push($a_wallet['trans'], $history);
                    }
                }
                array_push($is_wallet, $a_wallet);
            }
            
            return $is_wallet;
        }
    }
}
