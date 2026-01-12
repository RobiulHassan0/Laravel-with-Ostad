<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Raw;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/test', [TaskController::class, 'test']);