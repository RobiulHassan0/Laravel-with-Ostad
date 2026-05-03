<?php

use App\Http\Controllers\OnlineTicketController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tickets/create', [OnlineTicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets/store', [OnlineTicketController::class, 'store'])->name('tickets.store');
});

require __DIR__.'/auth.php';
