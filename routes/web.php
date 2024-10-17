<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [ProductController::class, 'index']);

Route::post('/cart/add', [ProductController::class, 'addToCart']);

Route::get('/checkout', [OrderController::class, 'checkout']);

Route::post('/checkout', [OrderController::class, 'placeOrder']);

Route::get('/orders', [OrderController::class, 'index'])->middleware('auth');

Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
