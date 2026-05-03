<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [CustomAuthController::class, 'showLoginForm'])->name('custom.login');
Route::post('/login/submit', [CustomAuthController::class, 'loginSubmit'])->name('login.submit');


Route::middleware('custom.auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('custom.dashboard');
    Route::get('/logout', [CustomAuthController::class, 'logOut'])->name('custom.logout');
});