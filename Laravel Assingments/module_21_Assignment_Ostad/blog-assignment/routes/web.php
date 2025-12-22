<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Raw;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BlogController::class, 'home'])->name('home');

Route::middleware('guest')->group( function () {
    Route::get('/registration', [AuthController::class, 'registration'])->name('auth.registration');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('login.submit');
});

Route::prefix('admin')->middleware('auth')->group( function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Post Routes
    Route::get('/posts', [PostController::class, 'postIndex'])->name('posts.allpost');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');

    // Category Routes
    Route::get('categories', [CategoryController::class, 'showCategories'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'createCategory'])->name('categories.create');
    Route::post('categories/storeCategory', [CategoryController::class, 'storeCategory'])->name('categories.store');
    Route::get('categories/editCategory/{id}', [CategoryController::class, 'editCategory'])->name('categories.edit');
    Route::put('categories/updateCategory/{id}', [CategoryController::class, 'updateCategory'])->name('categories.update');
    Route::delete('categories/deleteCategory/{id}', [CategoryController::class, 'deleteCategory'])->name('categories.delete');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});

