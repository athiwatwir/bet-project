<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Api\GamesController as Games;
use App\Http\Controllers\Api\AccountController as Account;

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
            // Log::debug($res);

            $histories = $this->historiesWallet();
            $default_wallet_history = $this->defaultWalletHistories($histories);
            $sub_wallet = $this->subWalletHistories($res['wallets'], $histories);
            $games = $this->getUserLevelGames();
            $level = (new Account)->loadUserLevel(session('_t'));
            $banks = $this->getBankList();
            $pgsoft_player_summary = $this->getPlayerSummary2('PGGAME');
            $wmgame_player_summary = $this->getPlayerSummary2('WMGAME');
            // $this->getPlayerSummary2($res['wallets']);
            // Log::debug($sub_wallet);

            // $pgSoftWallet = $this->getPgsoftgameWallet(session('user'));
            // $walletAmount = ($res['wallet']['amount'] + $pgSoftWallet);

            return view('account.wallets', 
                        ['wallet' => $res['wallet'], 'wallets' => $sub_wallet, 'banks' => $res['banks'], 
                        'user_bank' => $res['user_bank'], 'default_histories' => $default_wallet_history, 
                        'histories' => $histories, 'games' => $games, 'status' => $res['status'], 
                        // 'wallet_amount' => $walletAmount, 
                        'level' => $level['level'], 'menu' => 'wallet', 'banklists' => $banks['b_list'], 
                        'pgsoft_player_summaries' => $pgsoft_player_summary, 
                        'wmgame_player_summaries' => $wmgame_player_summary]);
        }else{
            return redirect('/login');
        }
    }

    private function getUserLevelGames() {
        $games = (new Games)->userLevelApiGame();
        $active = [];
        $unactive = [];
        foreach($games as $game) {
            $game['isactive'] ? array_push($active, $game) : array_push($unactive, $game);
        }

        return array_merge($active, $unactive);
    }

    private function getPlayerSummary()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. session('_t'),
        ])->get(RouteServiceProvider::API.'/game/pgsoft/player-summary');

        $res = json_decode($response->getBody()->getContents(), true);
        $hands = array_column($res['results'], 'hands');
        array_multisort($hands, SORT_DESC, $res['results']);
        return $res;
    }

    private function getPlayerSummary2($gamecode)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. session('_t'),
        ])->get(RouteServiceProvider::API.'/game/player-summaries/'.$gamecode);

        $res = json_decode($response->getBody()->getContents(), true);
        return $res['results'];
    }

    private function getBankList()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. session('_t'),
            ])->get(RouteServiceProvider::API.'/user/user-banking');

        $res = json_decode($response->getBody()->getContents(), true);
        return $res;
    }

    private function getPgsoftgameWallet($username)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            ])->get('http://127.0.0.1:8000/api/v2/pgsoftgame/wallet/'.$username);

        // ->get('https://88.playszone.com/api/v2/pgsoftgame/wallet/'.$username);

        return $response['data'];
    }

    public function createWallet(Request $request)
    {
        $ex = explode('__', $request->game);
        if(count($ex) > 1) {
            $game_id = Crypt::decrypt($ex[0]);
            $gamecode = Crypt::decrypt($ex[1]);

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. session('_t'),
                ])->post(RouteServiceProvider::API.'/user/create-wallet',[
                    'api_game_id' => $game_id,
                    'game_code' => $gamecode,
                    'amount' => $request->amount,
            ]);

            $res = json_decode($response->getBody()->getContents(), true);

            if($res['status'] == 200) {
                return redirect()->back()->with('success', 'เพิ่มกระเป๋าเงินเรียบร้อยแล้ว');
            }else if($res['status'] == 404) {
                return redirect()->back()->with('error', $res['error']);
            }

            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่...');
        }

        return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการเลือกเกม...');
    }


    public function editWallet(Request $request)
    {
        if($request->wallet_action == 'deposit') {

            $ex = explode('__', $request->wallet_id);
            $wallet_id = Crypt::decrypt($ex[0]);
            $gamecode = Crypt::decrypt($ex[1]);

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. session('_t'),
                ])->post(RouteServiceProvider::API.'/user/add-wallet',[
                    'wallet_id' => $wallet_id,
                    'gamecode' => $gamecode,
                    'amount' => $request->add_amount_wallet,
            ]);
    
            $res = json_decode($response->getBody()->getContents(), true);
    
            if($res['status'] == 200) {
                return redirect()->back()->with('success', 'เพิ่มเงินเข้ากระเป๋าเงินเรียบร้อยแล้ว');
            }else if($res['status'] == 301) {
                return redirect()->back()->with('error', 'เงินในกระเป๋าหลักไม่เพียงพอ...กรุณาเพิ่มเงิน หรือ โยกย้ายมาจากเกมอื่น');
            }else if($res['status'] == 400) {
                return redirect()->back()->with('error', $res['message']);
            }
    
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่');
            
        }else if($request->wallet_action == 'withdraw') {

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. session('_t'),
                ])->post(RouteServiceProvider::API.'/user/transfer-wallet',[
                    'id' => Crypt::decrypt($request->wallet_id),
                    'gamecode' => Crypt::decrypt($request->gamecode),
                    'to' => Crypt::decrypt($request->to_wallet),
                    'amount' => $request->change_amount_wallet,
            ]);
    
            $res = json_decode($response->getBody()->getContents(), true);
            if($res['status'] == 200) {
                return redirect()->back()->with('success', 'ย้ายเงินไปยังกระเป๋าเกมส์อื่นเรียบร้อยแล้ว');
            }else if($res['status'] == 301) {
                return redirect()->back()->with('error', 'เงินในกระเป๋าเกมไม่ถูกต้อง...กรุณาตรวจสอบ');
            }else if($res['status'] == 400) {
                return redirect()->back()->with('error', $res['message']);
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
            }else if($res['status'] == 400) {
                return redirect()->back()->with('error', $res['message']);
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
            'bank_id' => $request->payment_bank_from,
            'account_name' => $request->payment_account_name,
            'payment_date' => $request->payment_date,
            'payment_time' => $request->payment_time,
            'account_number' => $request->payment_account_number,
            'amount' => $request->payment_amount,
            'slip' => $request->payment_slip
        ]);

        $res = json_decode($response->getBody()->getContents(), true);

        if($res['status'] == 200) {
            return redirect()->back()->with('success', 'แจ้งโอนเงินเรียบร้อยแล้ว เมื่อตรวจสอบเรียบร้อยแล้วระบบจะเพิ่มเงินเข้ากระเป๋าหลักของคุณ');
        }else if($res['status'] == 400) {
            return redirect()->back()->with('error', $res['message']);
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
        }else if($res['status'] == 400) {
            return redirect()->back()->with('error', $res['message']);
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
            if($history['code'] == 'DEPOSIT' || $history['code'] == 'WITHDRAW') {
                array_push($default_wallet_history, $history);
            }else if($history['code'] == 'TRANSFER' && $history['from_default'] == 'Y' || $history['to_default'] == 'Y') {
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
                    if($history['code'] == 'TRANSFER' && $history['from_wallet_id'] == $wallet['id'] || $history['code'] == 'TRANSFER' && $history['to_wallet_id'] == $wallet['id']) {
                        array_push($a_wallet['trans'], $history);
                    }else if($history['code'] == 'เพิ่ม' && $history['to_wallet_id'] == $wallet['id'] || $history['code'] == 'ลด' && $history['to_wallet_id'] == $wallet['id']) {
                        array_push($a_wallet['trans'], $history);
                    }
                }
                array_push($is_wallet, $a_wallet);
            }
            
            return $is_wallet;
        }
    }
}
