<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSController;

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
Route::get('/kategori', [KategoriController::class, 'index'])->name('manage.category');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('category.create');
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
Route::put('/kategori/{id}', [KategoriController::class, 'update']);
Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete']);

// Routing UserController
Route::get('/user', [UserController::class, 'index']);

// Routing Tambah
Route::get('/user/tambah', [UserController::class, 'tambah']);

// Routing Tambah Simpan
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);

// Routing Ubah
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);

// Routing Ubah Simpan
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);

// Routing Hapus
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

// Routing m_user
Route::resource('m_user', POSController::class);

// Routing Form User dan Level
Route::get('/formUser', [UserController::class, 'formUser']);
Route::get('/formLevel', [UserController::class, 'formLevel']);
