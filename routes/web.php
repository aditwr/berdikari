<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\KeuanganController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontController::class, 'landingPage'])->name('landing-page');
Route::get('/kegiatan', [FrontController::class, 'activity'])->name('landing-page.kegiatan');
Route::get('/tulisan', [FrontController::class, 'article'])->name('landing-page.tulisan');
Route::get('/tentang-kami', [FrontController::class, 'about'])->name('landing-page.tentang-kami');
Route::get('/coba', [FrontController::class, 'coba'])->name('landing-page.kontak');


// Dashboard Route
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    // Route Keuangan
    Route::prefix('keuangan')->group(function () {
        Route::get('/', [KeuanganController::class, 'index'])->name('dashboard.keuangan.index');
        Route::get('/laporan', [KeuanganController::class, 'laporan'])->name('dashboard.keuangan.laporan');
        Route::get('/pemasukan', [KeuanganController::class, 'pemasukan'])->name('dashboard.keuangan.pemasukan');
        Route::get('/pengeluaran', [KeuanganController::class, 'pengeluaran'])->name('dashboard.keuangan.pengeluaran');
    });
});

require __DIR__ . '/auth.php';
