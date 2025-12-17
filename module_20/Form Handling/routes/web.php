<?php

use App\Http\Controllers\TasksController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TasksController::class, 'index'])->name('tasks.index');

Route::get('/tasks/addtask', [TasksController::class, 'create'])->name('tasks.add');

Route::post('/tasks/store', [TasksController::class,'store'])->name('tasks.store');

Route::get('/tasks/{id}/edit', [TasksController::class, 'edit'])->name('tasks.edit');

Route::post('/tasks/{id}/update', [TasksController::class, 'update'])->name('tasks.update');

Route::post('/tasks/{id}/delete', [TasksController::class, 'destroy'])->name('tasks.delete');

Route::get('/getTasks', [TestController::class, 'getTasks']);







// Route::get('/test', [TasksController::class, 'test']);