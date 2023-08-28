<?php

use App\Http\Controllers\AuthContrtoller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
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

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show']);

Route::resource('listing', ListingController::class);

// User session routes.
Route::get('login', [AuthContrtoller::class, 'create'])->name('login');
Route::post('login', [AuthContrtoller::class, 'store'])->name('login.store');
Route::delete('logout', [AuthContrtoller::class, 'destroy'])->name('logout');
