<?php

use App\Http\Controllers\MasterData\RoleController;
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

Route::prefix('role')->name('role.')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('index');
});
