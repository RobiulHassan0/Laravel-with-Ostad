<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/oneToOne', [TestController::class, 'oneToOne']);
Route::get('/oneToMany', [TestController::class, 'oneToMany']);
Route::get('/manyToMany', [TestController::class, 'manyToMany']);
Route::get('/productWithCat', [TestController::class, 'productWithCat']);
Route::get('/manyToManyTest', [TestController::class, 'manyToManyTest']);
Route::get('/selfReff', [TestController::class, 'selfReff']);

Route::get('/summery', [ReportController::class, 'summery']);