<?php

use App\Http\Controllers\MasterData\MataPelajaranController;
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

Route::prefix('mata-pelajaran')->name('mata-pelajaran.')->group(function () {
    Route::get('/', [MataPelajaranController::class, 'index'])->name('index');
});
