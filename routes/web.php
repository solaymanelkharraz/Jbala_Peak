<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RproductController; // Make sure this is imported!
use Illuminate\Support\Facades\Auth;

// --- PUBLIC ROUTES ---

Route::get('/', function () {
    $products = \App\Models\Product::take(6)->get();
    return view('welcome', ['products' => $products]);
})->name('welcome'); 

Route::get('/products', [ProductController::class, 'index'])->name('shop.index');
Route::get('/category/{cat}', [ProductController::class, 'filter'])->name('shop.filter');
Route::get('/about', function () { return view('about'); });

// --- CONTACT ROUTES (The Fix) ---
// 1. DELETE the old "Route::get('/contact', function..." line.
// 2. USE these two lines instead:
Route::get('/contact', [RproductController::class, 'email'])->name('email.form');
Route::post('/send/email', [RproductController::class, 'sendEmail'])->name('send.email');

// --- ADMIN ROUTES ---
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('produits', RproductController::class);
});

// --- AUTHENTICATION ROUTES ---
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');