<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\User\UserCategoryController;
use App\Http\Controllers\User\UserMenuController;
use App\Http\Controllers\User\UserReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/categories', [UserCategoryController::class, 'index'])->name('user-category.index');
Route::get('/categories/{category}', [UserCategoryController::class, 'show'])->name('user-category.show');

Route::get('/menus', [UserMenuController::class, 'index'])->name('user-menu.index');

Route::get('/reservation/step-one', [UserReservationController::class, 'firstStep'])->name('user-reservation.step.one');
Route::post('/reservation/step-one', [UserReservationController::class, 'storeFirstStep'])->name('user-reservation.store-first-step');
Route::get('/reservations/step-two', [UserReservationController::class, 'secondStep'])->name('user-reservation.step.two');
Route::post('/reservations/step-two', [UserReservationController::class, 'storeSecondStep'])->name('user-reservation.store-second-step');
Route::get('/thank-you', [PageController::class, 'thankYou'])->name('thank-you');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/tables', TableController::class);
    Route::resource('/reservations', ReservationController::class);
});

require __DIR__ . '/auth.php';
