<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routing Index Page / Home Page
Route::get('/', [HomeController::class, 'index']);

// Routing Product Page
Route::prefix('category')->group(function () {
    Route::get('/', [ProductsController::class, 'index']);
    Route::get('/food-beverage', [ProductsController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductsController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductsController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductsController::class, 'babyKid']);
});

// Routing User Page
Route::get('/user/{id}/name/{name}', [UserController::class, 'index']);

// Routing Halaman Transaksi
Route::get('/transaksi', [PenjualanController::class, 'index']);

// Routing Level Page
Route::get('/level', [LevelController::class, 'index']);

// Routing Kategori page
Route::get('/kategori', [KategoriController::class, 'index']);
