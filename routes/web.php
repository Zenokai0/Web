<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
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
Route::redirect('/', '/ones');

//auth routes
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class,'register'])->name('register');
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

//user routes
Route::get('/cart', [CartController::class, 'getCartView']);
Route::get('/item-count', [CartController::class, 'itemCount']);
Route::get('/get-user-cart', [CartController::class, 'userCart']);
Route::post('/add-to-cart', [CartController::class, 'addToCart']);
Route::delete('/remove-from-cart', [CartController::class, 'removeFromCart']);
Route::delete('/checkout', [CartController::class, 'checkout']);

//product routes
Route::get('/ones', [ProductController::class,'index']);
Route::get('/product/{id}', [ProductController::class,'show']);
Route::get('/{category}/{subcategory}', [ProductController::class, 'getProducts']);
Route::get('/search', [ProductController::class, 'searchPage']); // returns search page view
Route::get('/search-api', [ProductController::class, 'searchAPI']); // returns JSON