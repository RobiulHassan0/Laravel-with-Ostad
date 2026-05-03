<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get("/home", [FrontendController::class,"home"]);

Route::get("/about", [FrontendController::class,"about"]);