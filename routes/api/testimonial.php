<?php

use App\Http\Controllers\TestimonialController;
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

Route::prefix('testimonial')->name('testimonial.')->group(function () {
    Route::get('/', [TestimonialController::class, 'index'])->name('index');
    Route::post('/store', [TestimonialController::class, 'store'])->name('store');
    Route::post('/update/{id}', [TestimonialController::class, 'update'])->name('update');
});
