<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Algoritma;
use App\Http\Controllers\CekRoleController;
use App\Http\Controllers\Peminjam\BukuController as PeminjamBukuController;
use App\Http\Controllers\Peminjam\KeranjangController;
use App\Http\Controllers\Peminjam\UtamaController;
use App\Http\Controllers\Petugas\BukuController;
use App\Http\Controllers\Petugas\ChartController;
use App\Http\Controllers\Petugas\DashboardController;
use App\Http\Controllers\Petugas\KategoriController;
use App\Http\Controllers\Petugas\RakController;
use App\Http\Controllers\Petugas\TransaksiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', UtamaController::class);
Route::get('/listbuku', PeminjamBukuController::class);
Route::get('/app/algoritma/setup', [Algoritma::class, 'setupPerhitunganAlgoritma']);
Route::post('/proses', [Algoritma::class, 'prosesAnalisaAlgoritma']);
Route::get('/app/algoritma/analisa/hasil/{kdPengujian}', [Algoritma::class, 'hasilAnalisa']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/cek-role', CekRoleController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // role admin dan petugas
    Route::middleware(['role:admin|petugas'])->group(function () {
        Route::get('/dashboard', DashboardController::class);

        Route::get('/kategori', KategoriController::class);
        Route::get('/rak', RakController::class);
        Route::get('/buku', BukuController::class);
        Route::get('/bukuexcel', [BukuController::class, 'bukuexcel'])->name('excel');
        Route::get('/transaksi', TransaksiController::class);
        Route::get('/chart', ChartController::class);
    });

    // role peminjam
    Route::middleware(['role:peminjam'])->group(function () {
        Route::get('/keranjang', KeranjangController::class);
        Route::get('/keranjangpdf', [KeranjangController::class, 'keranjangpdf'])->name('bukti');
    });

    // role admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/user', UserController::class);
    });
});
    
