<?php

use App\Http\Controllers\PesananController;
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

Route::prefix('pesanan')->name('pesanan.')->group(function () {
    Route::get('/', [PesananController::class, 'index'])->name('index');
    Route::post('/store', [PesananController::class, 'store'])->name('store');
    Route::post('/store-array', [PesananController::class, 'storeArray'])->name('storeArray');
    Route::patch('/update/{id}', [PesananController::class, 'update'])->name('update');
});
