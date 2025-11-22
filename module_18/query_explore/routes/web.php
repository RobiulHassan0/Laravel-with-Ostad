<?php

use App\Http\Controllers\DemoAction;
use App\Http\Controllers\JoinDemoController;
use Illuminate\Support\Facades\Route;

Route::get("/", [DemoAction::class,"DemoAction"]); 
Route::get("/", [DemoAction::class,"joiningTables"]); 

Route::get('/joindemo', [JoinDemoController::class, 'index']);
