<?php

use App\Http\Controllers\DemoAction;
use Illuminate\Support\Facades\Route;

Route::get("/", [DemoAction::class,"DemoAction"]); 