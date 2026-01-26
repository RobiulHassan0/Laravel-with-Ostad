<?php

use Illuminate\Support\Facades\Route;

Route::get("/login", function () {
    return view("auth.login");
});

Route::get('/', function () {
    return view('index');
});

Route::get('/create', function () {
    return view('create');
});

Route::get('/edit', function () {
    return view('edit');
});