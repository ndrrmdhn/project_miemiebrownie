<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LoginBackend;
use App\Http\Controllers\Backend\HomeBackend;
use App\Http\Controllers\Backend\CustomerBackend;
use App\Http\Controllers\Backend\UserBackend;
use App\Http\Controllers\Backend\KategoriBackend;
use App\Http\Controllers\Backend\SubkategoriBackend;
use App\Http\Controllers\Backend\ProdukBackend;
use App\Http\Controllers\Backend\PesananBackend;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Frontend\HomeFrontend;


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

//Frontend 
Route::get('/', [HomeFrontend::class, 'index']);


//Login
Route::get('/login', [LoginBackend::class, 'index'])->name('login');
Route::post('/login', [LoginBackend::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginBackend::class, 'logout'])->name('logout');

// middleware auth
Route::middleware(['auth'])->group(function () {
  Route::get('backend/home', [HomeBackend::class, 'index'])->name('home');
  Route::resource('backend/customer', CustomerBackend::class);
  Route::resource('backend/kategori', KategoriBackend::class);
  Route::resource('backend/subkategori', SubkategoriBackend::class);
  Route::resource('backend/produk', ProdukBackend::class);
  Route::resource('backend/pesanan', PesananBackend::class);
});

Route::middleware(['auth', IsAdmin::class])->group(function () {
  Route::post('backend/getIdProduk', [PesananBackend::class, 'getIdProduk'])->name('backend/getIdProduk');
  Route::resource('backend/user', UserBackend::class);
});





