<?php

use App\Http\Controllers\Admin\AdminCabangController;
use App\Http\Controllers\Admin\AdminKategoriController;
use App\Http\Controllers\Admin\AdminPenggunaController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\Admin\AdminSupplierController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'proses_login'])->name('proses.login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'proses_register'])->name('proses.register');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/barang', [BarangController::class, 'index'])->name('barang');

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/order/{id}', [OrderController::class, 'order'])->name('order');
    Route::get('/pesanan-saya', [OrderController::class, 'myOrder'])->name('my-order');

    Route::middleware('cek-role:admin')->group(function () {
        Route::resource('admin/cabang', AdminCabangController::class);
        Route::resource('admin/supplier', AdminSupplierController::class);
        Route::resource('admin/kategori', AdminKategoriController::class);
        Route::resource('admin/produk', AdminProdukController::class);
        Route::resource('admin/pengguna', AdminPenggunaController::class);
        Route::get('admin/transaksi-masuk', [TransaksiController::class, 'masuk'])->name('transaksi.masuk');
        Route::get('admin/transaksi-selesai', [TransaksiController::class, 'selesai'])->name('transaksi.selesai');
        Route::post('admin/transaksi/terima/{id}', [TransaksiController::class, 'terima'])->name('transaksi.terima');
        Route::post('admin/transaksi/tolak/{id}', [TransaksiController::class, 'tolak'])->name('transaksi.tolak');
    });
});

