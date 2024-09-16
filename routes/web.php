<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Services\ServiceController;
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

Route::get('/', [HomeController::class, 'home']);

Route::get('/redirect', [HomeController::class, 'redirect'])->name('home');

//Services
Route::prefix('admin')->group(function () {
    Route::get('/services', [ServiceController::class, 'services'])->name('admin.services');
    Route::get('/services/add', [ServiceController::class, 'addService'])->name('admin.add.services');
    Route::post('/services/add', [ServiceController::class, 'createService'])->name('admin.create.services');
    Route::get('/services/edit/{id}', [ServiceController::class, 'editService'])->name('admin.edit.services');
    Route::post('/services/update/{id}', [ServiceController::class, 'updateService'])->name('admin.update.services');
    Route::get('/services/delete/{id}', [ServiceController::class, 'deleteService'])->name('admin.delete.services');
});

//Routes for user homepage

    Route::get('/services', [HomeController::class, 'viewServices'])->name('user.view.services');
    Route::post('/services/add-to-cart/{id}', [HomeController::class, 'addCart'])->name('user.add.cart');
    Route::get('/services/cart', [HomeController::class, 'viewCart'])->name('user.view.cart');
    Route::get('/services/cart/edit/{id}', [HomeController::class, 'viewEditCart'])->name('user.view.edit.cart');
    Route::patch('/services/cart/edit/{id}', [HomeController::class, 'updateCart'])->name('user.update.cart');
    Route::get('/services/cart/delete/{id}', [HomeController::class, 'destroyCart'])->name('user.destroy.cart');
    Route::get('/services/cart/address/{id}', [HomeController::class, 'editAddress'])->name('user.edit.address');
    Route::patch('/services/cart/address/{id}', [HomeController::class, 'updateAddress'])->name('user.update.address');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/cart', [HomeController::class, 'cart'])->name('user.cart');

require __DIR__.'/auth.php';
