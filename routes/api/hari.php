<?php

use App\Http\Controllers\MasterData\HariController;
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

Route::prefix('hari')->name('hari.')->group(function () {
    Route::get('/', [HariController::class, 'index'])->name('index');
});
