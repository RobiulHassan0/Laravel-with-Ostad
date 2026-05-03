<?php

use App\Http\Controllers\DemoController;
use App\Http\Middleware\DemoMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/hello1/{key}', [DemoController::class, 'DemoAction1'])->middleware([DemoMiddleware::class]);

Route::get('/hello2/{key}', [DemoController::class, 'DemoAction2'])->middleware([DemoMiddleware::class]);

Route::get('/hello3/{key}', [DemoController::class, 'DemoAction3'])->middleware([DemoMiddleware::class]);

Route::get('/hello4/{key}', [DemoController::class, 'DemoAction4'])->middleware([DemoMiddleware::class]);