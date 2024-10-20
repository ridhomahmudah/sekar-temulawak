<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/auth/google/redirect', [SocialiteController::class, 'redirect']);
Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);
Route::post('/register', [RegisterController::class, 'register'])->middleware(VerifyCsrfToken::except('/register'));
Route::post('/login', [LoginController::class, 'login'])->middleware(VerifyCsrfToken::except('/login'));

Route::get('/keranjang', [KeranjangController::class, 'index'])->middleware(VerifyCsrfToken::except('/keranjang'));
Route::post('/keranjang', [KeranjangController::class, 'store'])->middleware(VerifyCsrfToken::except('/keranjang'));    
Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->middleware(VerifyCsrfToken::except('/keranjang/*'));
Route::get('/produk', [ProdukController::class, 'index'])->middleware(VerifyCsrfToken::except('/produk'));

Route::get('/pesanan', [PesananController::class, 'index'])->middleware(VerifyCsrfToken::except('/pesanan'));
Route::post('/pesanan/confirm/{id}', [PesananController::class, 'confirm'])->middleware(VerifyCsrfToken::except('/pesanan'));
Route::post('/pesanan/create', [PesananController::class, 'create'])->middleware(VerifyCsrfToken::except('/pesanan/create/*'));
Route::post('/pesanan/cancel/{id}', [PesananController::class, 'cancel'])->middleware(VerifyCsrfToken::except('/pesanan/*'));

Route::get('/artikel', [ArtikelController::class, 'index'])->middleware(VerifyCsrfToken::except('/artikel'));
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->middleware(VerifyCsrfToken::except('/artikel'));
