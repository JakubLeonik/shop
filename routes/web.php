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
Route::view('/', 'shop.index')->name('shop.index');

//products
Route::get('/products', [ProductController::class, 'browse'])->name('products.browse');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');


Route::middleware(['auth', 'verified'])->group(function () {
    //dashboard
    Route::view('/dashboard', 'shop.dashboard')->name('shop.dashboard');
});

//login providers
Route::get('/login/{provider}', [ExternalLoginController::class, 'redirect'])->name('login.external');
Route::get('/login/{provider}/callback', [ExternalLoginController::class, 'handleCallback']);

require __DIR__.'/auth.php';
