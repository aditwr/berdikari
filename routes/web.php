<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\CatatanController;
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
Route::get('/test', [FrontController::class, 'test'])->name('landing-page.test');
Route::post('/simpan-catatan', [FrontController::class, 'simpancatatan'])->name('landing-page.simpan-catatan');


// Dashboard Route
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    // Route Keuangan
    Route::prefix('keuangan')->group(function () {
        Route::get('/', [KeuanganController::class, 'index'])->name('dashboard.keuangan.index');
        Route::get('/laporan', [KeuanganController::class, 'laporan'])->name('dashboard.keuangan.laporan');
        Route::get('/pemasukan', [KeuanganController::class, 'pemasukan'])->name('dashboard.keuangan.pemasukan');
        Route::get('/pengeluaran', [KeuanganController::class, 'pengeluaran'])->name('dashboard.keuangan.pengeluaran');
        Route::get('/kelola', [KeuanganController::class, 'kelola'])->name('dashboard.keuangan.kelola');
    });

    // Route Catatan
    Route::prefix('catatan')->middleware(['auth'])->group(
        function () {
            Route::get('/jenis', [CatatanController::class, 'jenis'])->name('dashboard.catatan.jenis');
            Route::get('/catatan', [CatatanController::class, 'index'])->name('dashboard.catatan.index');
            Route::get('/tambah', [CatatanController::class, 'tambah'])->name('dashboard.catatan.tambah');
            Route::post('/simpan', [CatatanController::class, 'simpan'])->name('dashboard.catatan.simpan');
            Route::get('/baca/{id}', [CatatanController::class, 'baca'])->name('dashboard.catatan.baca');
            Route::post('/update', [CatatanController::class, 'update'])->name('dashboard.catatan.update');
            // Route::get('/edit/{id}', [CatatanController::class, 'edit'])->name('dashboard.catatan.edit');
            // Route::get('/hapus/{id}', [CatatanController::class, 'hapus'])->name('dashboard.catatan.hapus');
        }
    );
});

require __DIR__ . '/auth.php';
