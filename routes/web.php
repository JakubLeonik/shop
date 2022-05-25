<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
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

//shop page
Route::get('/', ShopController::class)->name('shop.index');

Route::get('/products/browse', [ProductController::class, 'browse'])->name('products.browse');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::middleware(['auth', 'verified'])->group(function () {
    //dashboard
    Route::view('/dashboard', 'shop.dashboard')->name('shop.dashboard');

    //products
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/create', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products/{product}/edit', [ProductController::class, 'update'])->name('products.update');
});

//product - secure area
Route::middleware(['auth', 'verified', 'password.confirm'])->group(function () {
    Route::delete('/products/{product}/delete', [ProductController::class, 'destroy'])->name('products.delete');
});


//login providers
Route::get('/login/{provider}', [ExternalLoginController::class, 'redirect'])->name('login.external');
Route::get('/login/{provider}/callback', [ExternalLoginController::class, 'handleCallback']);

require __DIR__.'/auth.php';
