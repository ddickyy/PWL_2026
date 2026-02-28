<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;    

Route::get('/', [HomeController::class, 'index']);

Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'food']);
    Route::get('/beauty-health', [ProductController::class, 'beauty']);
    Route::get('/home-care', [ProductController::class, 'home']);
    Route::get('/baby-kid', [ProductController::class, 'baby']);
});

Route::get('/user/{id}/name/{name}', [UserController::class, 'profile']);

Route::get('/penjualan', [PenjualanController::class, 'index']);

Route::get('/level', [LevelController::class, 'index']);

Route::get('/kategori', [KategoriController::class, 'index']);