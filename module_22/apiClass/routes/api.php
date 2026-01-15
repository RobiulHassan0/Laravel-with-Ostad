<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Task2Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


// Get ----> /tasks ---> index
// POST ----> /tasks ---> store
// Get ----> /tasks/{id} ---> show
// Put/Patch ----> /tasks/{id} ---> update
// Delete ----> /tasks/{id} ---> destroy



Route::prefix('v1')->group(function () {
    Route::post('/test', [TaskController::class, 'test']);

    Route::get('index', [TaskController::class, 'getTasks']);
    Route::middleware('throttle:4,1')->post('store', [TaskController::class, 'store']);
    Route::get('/task/edit/{id}', [TaskController::class, 'edit']);
    Route::delete('/task/delete/{id}', [TaskController::class, 'destroy']);


    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categoryWithProduct', [CategoryController::class, 'categoryWithProduct']);
});

Route::apiResource('tasks', controller: Task2Controller::class);



Route::prefix('v2')->group(function () {
    // for  Future update
});