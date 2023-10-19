<?php

use App\Http\Controllers\MuridController;
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

Route::prefix('murid')->name('murid.')->group(function () {
    Route::get('/', [MuridController::class, 'index'])->name('index');
});
