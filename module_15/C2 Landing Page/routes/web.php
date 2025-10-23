<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', [TestController::class, 'test']);

Route::get('compact', [TestController::class, 'dataPassByCompact']);

Route::get('cdp', [TestController::class, 'complexDataPass']);

Route::get('cdpbc', [TestController::class, 'complexDataPassByCompact']);

Route::get('with', [TestController::class, 'dataPassByUsingWith']);