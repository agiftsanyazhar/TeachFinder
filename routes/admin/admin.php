<?php

use App\Http\Controllers\Admin\{
    GuruController,
    MuridController,
    UserController,
};
use Illuminate\Support\Facades\Route;

// --------------------------------------------------------------------------
// Master
// --------------------------------------------------------------------------
Route::prefix('master')->name('master.')->group(function () {
    Route::prefix('degree')->name('degree.')->group(function () {
        Route::get('/', [DegreeController::class, 'index'])->name('index');
        Route::post('/store', [DegreeController::class, 'store'])->name('store');
        Route::post('/update', [DegreeController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [DegreeController::class, 'destroy'])->name('destroy');
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
        Route::post('/update/{id}', [GuruController::class, 'update'])->name('update');
    });
    Route::prefix('murid')->name('murid.')->group(function () {
        Route::get('/', [MuridController::class, 'index'])->name('index');
    });
});
