<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShareController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomepageController::class, 'index'])->name('home');

Route::get('/shares/{share}', [ShareController::class, 'show'])->name('shares.show');

Route::post('/shares', [ShareController::class, 'store'])->name('shares.store');

Route::delete('/shares/{share}', [ShareController::class, 'destroy'])->name('shares.destroy');
