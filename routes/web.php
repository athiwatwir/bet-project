<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\GamesController;
use App\Http\Controllers\Api\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/forgot-password', [ForgotPasswordController::class, 'index']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
Route::post('/confirm-otp', [ForgotPasswordController::class, 'confirmOtp']);
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);
// Route::get('/reset-password', [ForgotPasswordController::class, 'resetPassword1']);

Route::prefix('account')->group(function () {
    Route::get('/', [AccountController::class, 'index']);
    Route::get('/change-password', [AccountController::class, 'changePassword']);
    Route::get('/banking', [AccountController::class, 'banking']);
    Route::get('/wallets', [WalletController::class, 'index']);
    Route::get('/delete-wallet/{id}', [WalletController::class, 'deleteWallet']);
    Route::get('/sub-wallet/{id}', [WalletController::class, 'subWalletHistory']);
    Route::get('/game-wallet', [WalletController::class, 'getGameWallet']);

    Route::post('/update', [AccountController::class, 'personalUpdate']);
    Route::post('/change-password', [AccountController::class, 'passwordUpdate']);
    Route::post('/banking', [AccountController::class, 'bankingUpdate']);
    Route::post('/banking-edit', [AccountController::class, 'bankingEdit']);
    Route::post('/create-wallet', [WalletController::class, 'createWallet']);
    Route::post('/edit-wallet', [WalletController::class, 'editWallet']);
    Route::post('/deposit-wallet', [WalletController::class, 'depositWallet']);
    Route::post('/withdraw-wallet', [WalletController::class, 'withdrawWallet']);
});

Route::prefix('games')->group(function () {
    Route::get('view/{name}/{id}', [GamesController::class, 'view'])->name('viewgame');
    Route::get('demo/{game}', [GamesController::class, 'playDemo'])->name('demo');
    Route::get('login/{name}', [GamesController::class, 'loginToGame'])->name('logingame');
});