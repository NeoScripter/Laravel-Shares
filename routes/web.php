<?php

use App\Http\Controllers\AuthController;
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

Route::get('/shares/{share}/edit', [ShareController::class, 'edit'])->name('shares.edit');

Route::put('/shares/{share}', [ShareController::class, 'update'])->name('shares.update');

Route::post('/shares', [ShareController::class, 'store'])->name('shares.store');

Route::delete('/shares/{share}', [ShareController::class, 'destroy'])->name('shares.destroy');



Route::get('/signup', [AuthController::class, 'signup'])->name('signup');

Route::post('/signup', [AuthController::class, 'store'])->name('signup.post');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
