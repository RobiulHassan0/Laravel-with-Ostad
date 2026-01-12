<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Task2Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;



Route::apiResource('tasks', Task2Controller::class);

// Get ----> /tasks ---> index
// POST ----> /tasks ---> store
// Get ----> /tasks/{id} ---> show
// Put/Patch ----> /tasks/{id} ---> update
// Delete ----> /tasks/{id} ---> destroy



Route::prefix('v1')->group(function () {
    Route::post('/test', [TaskController::class, 'test']);

    Route::get('index', [TaskController::class, 'getTasks']);
    Route::post('store', [TaskController::class, 'store']);
    Route::get('/task/edit/{id}', [TaskController::class, 'edit']);
    Route::delete('/task/delete/{id}', [TaskController::class, 'destroy']);


    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categoryWithProduct', [CategoryController::class, 'categoryWithProduct']);
});

Route::prefix('v2')->group(function () {
    // for  Future update
});