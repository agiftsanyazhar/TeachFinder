<?php

use App\Http\Controllers\Admin\{
    GuruController,
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
        Route::prefix('detail')->name('detail.')->group(function () {
            Route::get('/{guru_id}', [GuruController::class, 'detail'])->name('index');
        });
    });
    Route::prefix('murid')->name('murid.')->group(function () {
        Route::get('/', [MuridController::class, 'index'])->name('index');
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
