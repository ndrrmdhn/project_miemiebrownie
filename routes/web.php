<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LoginBackend;
use App\Http\Controllers\Backend\HomeBackend;
use App\Http\Controllers\Backend\CustomerBackend;
use App\Http\Controllers\Backend\UserBackend;
use App\Http\Controllers\Backend\KategoriBackend;
use App\Http\Controllers\Backend\ProdukBackend;
use App\Http\Controllers\Backend\PesananBackend;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Frontend\HomeFrontend;
use App\Http\Controllers\Frontend\ProdukFrontend;

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

// Rute Login
Route::get('/login', [LoginBackend::class, 'index'])->name('login');
Route::post('/login', [LoginBackend::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginBackend::class, 'logout'])->name('logout');

// Rute Backend dengan middleware auth dan is_admin
Route::middleware(['auth'])->group(function () {
    Route::get('backend/home', [HomeBackend::class, 'index'])->name('home');
    Route::resource('backend/customer', CustomerBackend::class);
    Route::resource('backend/kategori', KategoriBackend::class);
    Route::resource('backend/produk', ProdukBackend::class);
    Route::resource('backend/pesanan', PesananBackend::class);
});

Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::post('backend/getIdProduk', [PesananBackend::class, 'getIdProduk'])->name('backend/getIdProduk');
    Route::resource('backend/user', UserBackend::class);
});

// Rute untuk Frontend
Route::get('/', function () {
    return view('frontend.home.index');
});
// Route::resource('/produk', ProdukFrontend::class);
Route::get('/produk', [ProdukFrontend::class, 'produk']);