<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\DashboardController;
use App\Http\Controllers\Api\v1\InvoiceController;
use App\Http\Controllers\Api\v1\ProductController;
use App\Http\Controllers\Api\v1\StockMovementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);

        // Dashboard 
        Route::get('/dashboard/summary', [DashboardController::class, 'summary']);

        // Cateogries
        Route::get('/categories', [CategoryController::class, 'index']);
        Route::post('/categories', [CategoryController::class, 'store']);
        Route::get('/categories/{id}', [CategoryController::class, 'show']);
        Route::put('/categories/{id}', [CategoryController::class, 'update']);
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

        // Products
        Route::get('/products', [ProductController::class, 'index']);
        Route::post('/products', [ProductController::class, 'store']);
        Route::get('/products/{id}', [ProductController::class, 'show']);
        Route::put('/products/{id}', [ProductController::class, 'update']);
        Route::delete('/products/{id}', [ProductController::class, 'destroy']);

        // Stcok Adjustment
        Route::get('/stocks', [StockMovementController::class, 'index']);
        Route::post('/stocks', [StockMovementController::class, 'store']);
        Route::post('/stocks/stockAdjustment', [StockMovementController::class, 'stockAdjustment']);

        // Invoices Routes
        Route::get('/invoices', [InvoiceController::class, 'index']);
        Route::post('/invoice', [InvoiceController::class, 'store']);
        Route::get('/invoice/{id}', [InvoiceController::class, 'show']);
        Route::put('/invoice/{id}', [InvoiceController::class, 'update']);
        Route::delete('/invoice/{id}', [InvoiceController::class, 'destroy']);
    });
});