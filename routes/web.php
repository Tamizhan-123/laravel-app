<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

// Public welcome page
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Dashboard (only for logged-in users)
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Product listing and detail page
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Cart management
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout process (protected by custom auth middleware)
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout.index')->middleware('auth.custom');
Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('checkout.place')->middleware('auth.custom');

Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth.custom');
