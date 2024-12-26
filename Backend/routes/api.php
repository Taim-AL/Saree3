<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(['auth:sanctum']);

Route::get('products', [ProductController::class, 'index']);
Route::post('products', [ProductController::class, 'store'])->middleware(['auth:sanctum']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::put('products/{id}', [ProductController::class, 'update'])->middleware(['auth:sanctum']);
Route::delete('products/{id}', [ProductController::class, 'destroy'])->middleware(['auth:sanctum']);

Route::get('categories', [CategoryController::class, 'index']);
Route::post('categories', [CategoryController::class, 'store'])->middleware(['auth:sanctum']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::put('categories/{id}', [CategoryController::class, 'update'])->middleware(['auth:sanctum']);
Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->middleware(['auth:sanctum']);
