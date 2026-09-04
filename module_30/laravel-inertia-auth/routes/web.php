<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
 

Route::get('/', [HomeController::class, 'homePage']);
 
// Auth Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/forgot-password', [PasswordResetController::class, 'showForgotForm'])->name('restform.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('reset.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');


Route::middleware('auth')->group(function() {

    Route::get('/verify-email', [EmailVerificationController::class, 'showOtpForm'])->name('verification.notice');
    Route::post('/verify-email', [EmailVerificationController::class, 'verifyOtp'])->name('verification.otp');
    Route::post('/verify-email/resend', [EmailVerificationController::class, 'sendOtp'])->name('resendVerfication.otp');
  
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    
    // Tasks Routes
    Route::get("/tasks", [TaskController::class, 'index'])->name('tasks.index');
    Route::get("/tasks/create", action: [TaskController::class, 'create'])->name('tasks.create');
    Route::post("/tasks/store", action: [TaskController::class, 'store'])->name('tasks.store');
    Route::get("/tasks/{task}/edit", [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put("/tasks/{task}", [TaskController::class, 'update'])->name('tasks.update');
    Route::delete("/tasks/{task}/delete", [TaskController::class, 'destroy'])->name('tasks.destroy');

});





Route::get('/test/mail', function () {

    try {
        Mail::raw('Hello from Browser Route!', function ($message) {
            $message->from('hello@robin.com')
                    ->to('test@example.com')
                    ->subject('Browser Test Mail');
        });

        return 'MAIL SENT SUCCESSFULLY';

    } catch (\Exception $e) {
        return $e->getMessage();
    }
});

