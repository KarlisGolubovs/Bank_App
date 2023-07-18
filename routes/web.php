<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptoController;

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

Route::get('/accounts', [AccountController::class, 'index'])->name('accounts');

Route::get('/exchange', [ExchangeController::class, 'index'])->name('currency-exchange');

Route::get('/crypto', [CryptoController::class, 'index'])->name('crypto');

Route::post('/update', [UserController::class, 'updateUserId'])->name('update');

Route::post('/create-account', 'AccountController@createAccount')->name('create-account');

Route::get('/exchange/search', [ExchangeController::class, 'search'])->name('exchange.search');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/createaccount', 'AccountController@createAccountPage')->name('create.account');

Route::post('/createaccount', 'AccountController@createAccount')->name('store.account');
