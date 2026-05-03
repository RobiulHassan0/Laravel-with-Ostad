<?php

use App\Http\Controllers\portfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', [portfolioController::class, 'test']);

Route::get('hello', [portfolioController::class, 'helloWorld']);