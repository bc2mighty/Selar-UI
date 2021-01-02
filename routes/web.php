<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Middleware\UserSignedIn;
use App\Http\Middleware\UserSignedOut;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => ''], function() {
    Route::middleware([UserSignedIn::class])->group(function () {
        Route::get('/login', [UserController::class, 'login'])->name('login');
        Route::get('/register', [UserController::class, 'register'])->name('register');
        Route::post('/login', [UserController::class, 'login_user'])->name('login_user');
        Route::post('/register', [UserController::class, 'register_user'])->name('register_user');
    });
    
    Route::middleware([UserSignedOut::class])->group(function () {
        Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/withdrawals', [WithdrawalController::class, 'withdrawals'])->name('withdrawals');
        Route::get('/withdraw', [WithdrawalController::class, 'withdraw'])->name('withdraw');
        Route::post('/withdraw', [WithdrawalController::class, 'withdraw_money'])->name('withdraw_money');
    }); 
});