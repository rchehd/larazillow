<?php

use App\Http\Controllers\AuthContrtoller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingOfferController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationSeenController;
use App\Http\Controllers\RealtorListingAcceptOfferController;
use App\Http\Controllers\RealtorListingImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\RealtorListingController;

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
Route::get('/hello', [IndexController::class, 'show'])->middleware('auth');

Route::resource('listing', ListingController::class)
  ->only(['index', 'show']);

// User session routes.
Route::get('login', [AuthContrtoller::class, 'create'])->name('login');
Route::post('login', [AuthContrtoller::class, 'store'])->name('login.store');
Route::delete('logout', [AuthContrtoller::class, 'destroy'])->name('logout');


Route::resource('user-account', UserAccountController::class)->only('create', 'store');

Route::prefix('realtor')
    ->name('realtor.')
    ->middleware('auth')
    ->group(function () {
        Route::name('listing.restore')
            ->put(
            'listing/{listing}/restore',
            [RealtorListingController::class, 'restore']
            )->withTrashed();
        Route::resource('listing', RealtorListingController::class)
            ->only('index', 'destroy', 'edit', 'update', 'create', 'store', 'show')
            ->withTrashed();
        Route::resource('listing.image', RealtorListingImageController::class)
          ->only(['create', 'store', 'destroy']);

        Route::name('offer.accept')
          ->put(
            'offer/{offer}/accept',
            RealtorListingAcceptOfferController::class
          );
;    });

Route::resource('listing.offer', ListingOfferController::class)
  ->middleware('auth')
  ->only(['store']);

Route::resource('notification', NotificationController::class)
  ->middleware('auth')
  ->only('index');

Route::name('notification.seen')
  ->put(
    'notification/{notification}/seen',
    NotificationSeenController::class
  )
  ->middleware('auth');