<?php

use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('demoAction', [DemoController::class, 'DemoAction']);

Route::get('demo', [DemoController::class, 'demo']);

Route::get('sessionPut/{email}', [DemoController::class,'sessionPut']);
Route::get('sessionGet', [DemoController::class,'sessionGet']);
Route::get('sessionPull', [DemoController::class,'sessionPull']);
Route::get('sessionForget', [DemoController::class,'sessionForget']);
 