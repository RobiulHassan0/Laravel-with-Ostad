<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('hello', [TestController::class, 'hello']);

Route::get('/viewTest', function(){
    return view('products.productTest');
});

Route::get('/viewTestByController', [TestController::class, 'viewTestByController']);

Route::get('HomePage', function(){
    return view('home');
});

Route::get('aboutPage', function(){
    return view('aboutPage');
});