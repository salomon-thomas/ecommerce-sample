<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('categories/{category}', [ProductController::class, 'categories'])->name('product.category');
Route::get('products/', [ProductController::class, 'index'])->name('product.list');
Route::get('products/{product}', [ProductController::class, 'details'])->name('product.details');

Route::get('cart', [CartController::class, 'index'])->name('cart.list');
Route::get('cart/add/{product_id}/{variant_id}', [CartController::class, 'add'])->name('cart.add');
Route::get('cart/{cartItem}/{action}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::delete('cart/{cartItem}', [CartController::class, 'deleteItem'])->name('cart.delete');

Route::get('order/preview', [OrderController::class, 'checkoutPreview'])->name('checkout.preview');
Route::post('order/place', [OrderController::class, 'placeOrder'])->name('place.order');
Route::get('order/list', [OrderController::class, 'list'])->name('order.list');
Route::get('order/details/{orderId}', [OrderController::class, 'details'])->name('order.details');


Route::get('profile/details', [ProfileController::class, 'details'])->name('profile.details');

Auth::routes();
