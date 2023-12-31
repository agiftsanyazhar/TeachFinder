<?php

use App\Http\Controllers\Admin\Guru\{
    DetailGuruController,
    GuruController,
};
use App\Http\Controllers\Admin\{
    MuridController,
    PesananController,
    TestimonialController,
    UserController,
};
use App\Http\Controllers\Admin\MasterData\{
    HariController,
    JenjangController,
    LokasiController,
    MataPelajaranController,
    RoleController,
};
use Illuminate\Support\Facades\Route;

// --------------------------------------------------------------------------
// Master Data
// --------------------------------------------------------------------------
Route::prefix('master-data')->name('master-data.')->group(function () {
    Route::prefix('hari')->name('hari.')->group(function () {
        Route::get('/', [HariController::class, 'index'])->name('index');
    });
    Route::prefix('jenjang')->name('jenjang.')->group(function () {
        Route::get('/', [JenjangController::class, 'index'])->name('index');
    });
    Route::prefix('lokasi')->name('lokasi.')->group(function () {
        Route::get('/', [LokasiController::class, 'index'])->name('index');
    });
    Route::prefix('mata-pelajaran')->name('mata-pelajaran.')->group(function () {
        Route::get('/', [MataPelajaranController::class, 'index'])->name('index');
    });
    Route::prefix('role')->name('role.')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
    });
});

// --------------------------------------------------------------------------
// User
// --------------------------------------------------------------------------
Route::prefix('users')->name('users.')->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
    });
    Route::prefix('guru')->name('guru.')->group(function () {
        Route::get('/', [GuruController::class, 'index'])->name('index');
        Route::post('/store', [GuruController::class, 'store'])->name('store');
        Route::post('/update', [GuruController::class, 'update'])->name('update');
        Route::post('/update/{id}', [GuruController::class, 'updateStatus'])->name('update-status');
        Route::get('/destroy/{id}', [GuruController::class, 'destroy'])->name('destroy');
        Route::prefix('detail')->name('detail.')->group(function () {
            Route::get('/{guru_id}', [DetailGuruController::class, 'index'])->name('index');

            // Alamat Guru
            Route::post('/{guru_id}/store-alamat-guru', [DetailGuruController::class, 'storeAlamatGuru'])->name('store-alamat-guru');
            Route::post('/{guru_id}/update-alamat-guru', [DetailGuruController::class, 'updateAlamatGuru'])->name('update-alamat-guru');
            Route::get('/{guru_id}/destroy-alamat-guru/{id}', [DetailGuruController::class, 'destroyAlamatGuru'])->name('destroy-alamat-guru');

            // Jadwal
            Route::post('/{guru_id}/store-jadwal', [DetailGuruController::class, 'storeJadwal'])->name('store-jadwal');
            Route::post('/{guru_id}/update-jadwal', [DetailGuruController::class, 'updateJadwal'])->name('update-jadwal');
            Route::get('/{guru_id}/destroy-jadwal/{id}', [DetailGuruController::class, 'destroyJadwal'])->name('destroy-jadwal');
        });
    });
    Route::prefix('murid')->name('murid.')->group(function () {
        Route::get('/', [MuridController::class, 'index'])->name('index');
        Route::post('/store', [MuridController::class, 'store'])->name('store');
        Route::post('/update', [MuridController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [MuridController::class, 'destroy'])->name('destroy');
    });
});

// --------------------------------------------------------------------------
// Pesanan
// --------------------------------------------------------------------------
Route::prefix('pesanan')->name('pesanan.')->group(function () {
    Route::get('/', [PesananController::class, 'index'])->name('index');
    Route::prefix('detail')->name('detail.')->group(function () {
        Route::get('/{pesanan_id}', [PesananController::class, 'detail'])->name('index');
    });
});

// --------------------------------------------------------------------------
// Testimonial
// --------------------------------------------------------------------------
Route::prefix('testimonial')->name('testimonial.')->group(function () {
    Route::get('/', [TestimonialController::class, 'index'])->name('index');
});
