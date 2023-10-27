<?php

use App\Http\Controllers\JadwalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('jadwal')->name('jadwal.')->group(function () {
    Route::get('/', [JadwalController::class, 'index'])->name('index');
    Route::get('/show/{id}', [JadwalController::class, 'show'])->name('show');
    Route::get('/filter-jadwal', [JadwalController::class, 'filterJadwal'])->name('filter-jadwal');
    Route::middleware('auth.guru')->post('/store', [JadwalController::class, 'store'])->name('store');
    Route::post('/update/{id}', [JadwalController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [JadwalController::class, 'destroy'])->name('destroy');
});
