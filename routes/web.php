<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RproductController;
use Illuminate\Support\Facades\Auth;

// --- PUBLIC ROUTES ---

// 1. CHANGE: I renamed this from 'home' to 'welcome'
Route::get('/', function () {
    $products = \App\Models\Product::take(6)->get();
    return view('welcome', ['products' => $products]);
})->name('welcome'); 

Route::get('/products', [ProductController::class, 'index'])->name('shop.index');
Route::get('/category/{cat}', [ProductController::class, 'filter'])->name('shop.filter');
Route::get('/about', function () { return view('about'); });
Route::get('/contact', function () { return view('contact'); });

// --- ADMIN ROUTES ---
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('produits', RproductController::class);
});

// --- AUTHENTICATION ROUTES ---
Auth::routes();

// 2. CHANGE: I renamed this from 'home_dashboard' to 'home'
// Now route('home') will correctly take you here!
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');