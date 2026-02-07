<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RproductController;
use App\Http\Controllers\CartController; // New Import
use Illuminate\Support\Facades\Auth;

// --- PUBLIC ROUTES ---
Route::get('/', function () {
    $products = \App\Models\Product::take(6)->get();
    return view('welcome', ['products' => $products]);
})->name('welcome'); 

Route::get('/products', [ProductController::class, 'index'])->name('shop.index');
Route::get('/category/{cat}', [ProductController::class, 'filter'])->name('shop.filter');
Route::get('/about', function () { return view('about'); });

// --- CONTACT ROUTES ---
Route::get('/contact', [RproductController::class, 'email'])->name('email.form');
Route::post('/send/email', [RproductController::class, 'sendEmail'])->name('send.email');

// --- CART ROUTES (New) ---
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::delete('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('remove.from.cart');
Route::patch('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');

// --- ADMIN ROUTES ---
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('produits', RproductController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');