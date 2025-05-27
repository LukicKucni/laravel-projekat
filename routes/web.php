<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\MagazineAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\CategoryAdminController;

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

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/katalog', [PublicController::class, 'katalog'])->name('katalog');
Route::get('/magazin/{id}', [PublicController::class, 'show'])->name('show');
Route::get('/kontakt', [PublicController::class, 'kontakt'])->name('kontakt');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('/magazines', MagazineAdminController::class)->names('admin.magazines');
    Route::resource('/magazines', MagazineAdminController::class)->names('magazines');

    Route::resource('/categories', CategoryAdminController::class)->names('categories');

    Route::resource('/orders', OrderAdminController::class)->only(['index', 'destroy'])->names('orders');



});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/poruci/{id}', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/porudzbine', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');

    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
});

require __DIR__ . '/auth.php';
