<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RproductController;
use Illuminate\Support\Facades\Auth;

// --- PUBLIC ROUTES (Everyone can see these) ---
Route::get('/', function () {
    $products = \App\Models\Product::take(6)->get();
    return view('welcome', ['products' => $products]);
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('shop.index');
Route::get('/category/{cat}', [ProductController::class, 'filter'])->name('shop.filter');
Route::get('/about', function () { return view('about'); });
Route::get('/contact', function () { return view('contact'); });

Route::middleware(['auth', 'admin'])->group(function () {
    
    // This handles the Dashboard, Add, Edit, and Delete pages
    Route::resource('produits', RproductController::class);

});

// --- AUTHENTICATION ROUTES (Login, Register, Logout) ---
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home_dashboard');