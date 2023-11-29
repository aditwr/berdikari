<?php

use App\Helpers\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\PengelolaanWebController;

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

Route::get('/user-helper', function () {
    return User::getUsername(1);
});

Route::get('/', [FrontController::class, 'landingPage'])->name('landing-page');
Route::get('/kegiatan', [FrontController::class, 'activity'])->name('landing-page.kegiatan');
Route::get('/kegiatan/{id}', [FrontController::class, 'activityDetail'])->name('landing-page.kegiatan.baca');
Route::get('/tulisan', [FrontController::class, 'article'])->name('landing-page.tulisan');
Route::get('/tulisan/{id}', [FrontController::class, 'articleDetail'])->name('landing-page.tulisan.baca');
Route::get('/galeri', [FrontController::class, 'gallery'])->name('landing-page.galeri');
Route::get('/tentang-kami', [FrontController::class, 'about'])->name('landing-page.tentang-kami');
Route::get('/kontak', [FrontController::class, 'contact'])->name('landing-page.kontak');
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
            Route::get('/tambah', [CatatanController::class, 'tambah'])->name('dashboard.catatan.tambah')->middleware(['can:buat-catatan']);
            Route::post('/simpan', [CatatanController::class, 'simpan'])->name('dashboard.catatan.simpan');
            Route::get('/baca/{id}', [CatatanController::class, 'baca'])->name('dashboard.catatan.baca');
            Route::post('/update', [CatatanController::class, 'update'])->name('dashboard.catatan.update');
            // Route::get('/edit/{id}', [CatatanController::class, 'edit'])->name('dashboard.catatan.edit');
            // Route::get('/hapus/{id}', [CatatanController::class, 'hapus'])->name('dashboard.catatan.hapus');
        }
    );

    // Route Inventaris
    Route::prefix('inventaris')->middleware(['auth'])->group(
        function () {
            Route::get('/', [InventarisController::class, 'index'])->name('dashboard.inventaris.index');
            Route::get('/daftar-barang/{id}', [InventarisController::class, 'daftarbarang'])->name('dashboard.inventaris.daftar-barang');
        }
    );

    // Route Pengelolaan Web
    Route::prefix('web')->middleware(['auth'])->group(
        function () {
            Route::get('/header', [PengelolaanWebController::class, 'header'])->name('dashboard.pengelolaan-web.header.index')->middleware(['can:edit-header']);
            Route::prefix('kegiatan')->group(function () {
                Route::get('/', [PengelolaanWebController::class, 'kegiatan'])->name('dashboard.pengelolaan-web.kegiatan.index');
                Route::get('/tambah', [PengelolaanWebController::class, 'kegiatanTambah'])->name('dashboard.pengelolaan-web.kegiatan.tambah')->middleware(['can:buat-artikel-kegiatan']);
                Route::post('/simpan', [PengelolaanWebController::class, 'kegiatanSimpan'])->name('dashboard.pengelolaan-web.kegiatan.simpan')->middleware(['can:buat-artikel-kegiatan']);
                Route::get('/edit/{id}', [PengelolaanWebController::class, 'kegiatanEdit'])->name('dashboard.pengelolaan-web.kegiatan.edit')->middleware(['can:edit-artikel-kegiatan']);
                Route::post('/update', [PengelolaanWebController::class, 'kegiatanUpdate'])->name('dashboard.pengelolaan-web.kegiatan.update')->middleware(['can:edit-artikel-kegiatan']);
                Route::get('/baca/{id}', [PengelolaanWebController::class, 'kegiatanBaca'])->name('dashboard.pengelolaan-web.kegiatan.baca');
            });

            Route::prefix('artikel')->group(
                function () {
                    Route::get('/', [PengelolaanWebController::class, 'artikel'])->name('dashboard.artikel.index');
                    Route::group(['middleware' => ['can:buat-artikel']], function () {
                        Route::get('/tambah', [PengelolaanWebController::class, 'artikelTambah'])->name('dashboard.artikel.tambah');
                        Route::post('/simpan', [PengelolaanWebController::class, 'artikelSimpan'])->name('dashboard.artikel.simpan');
                    });
                    Route::group(['middleware' => ['can:edit-artikel']], function () {
                        Route::get('/edit/{id}', [PengelolaanWebController::class, 'artikelEdit'])->name('dashboard.artikel.edit');
                        Route::post('/update', [PengelolaanWebController::class, 'artikelUpdate'])->name('dashboard.artikel.update');
                    });
                    Route::get('/baca/{id}', [PengelolaanWebController::class, 'artikelBaca'])->name('dashboard.artikel.baca');
                }
            );
            Route::prefix('gallery')->group(
                function () {
                    Route::get('/', [PengelolaanWebController::class, 'gallery'])->name('dashboard.pengelolaan-web.gallery.index');
                }
            );
            Route::prefix('izin-akses')->group(
                function () {
                    Route::get('/', [PengelolaanWebController::class, 'izinAkses'])->name('dashboard.pengelolaan-web.izin-akses.index');
                }
            );
        }
    );
});

require __DIR__ . '/auth.php';
