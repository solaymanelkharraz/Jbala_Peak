<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RproductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController; // Add this import!
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

// 1. Keep Auth routes standard to avoid errors with login/register
Auth::routes();

// 2. Language Group for Jbala Peak
Route::prefix('{lang?}')->group(function () {

    Route::get('/', function ($lang = 'en') {
        if (!in_array($lang, ['en', 'fr', 'ar'])) { $lang = 'en'; }
        App::setLocale($lang);
        
        $products = \App\Models\Product::take(6)->get();
        return view('welcome', ['products' => $products]);
    })->name('welcome');

    // Public Routes
    Route::get('/products', [ProductController::class, 'index'])->name('shop.index');
    Route::get('/category/{cat}', [ProductController::class, 'filter'])->name('shop.filter');
    Route::get('/about', function ($lang = 'en') { 
        App::setLocale($lang); 
        return view('about'); 
    })->name('about');

    // Contact
    Route::get('/contact', [RproductController::class, 'email'])->name('email.form');
    Route::post('/send/email', [RproductController::class, 'sendEmail'])->name('send.email');

    // Cart
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::delete('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('remove.from.cart');
    Route::patch('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');

    // Admin
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::resource('produits', RproductController::class);
    });

    // Home/Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});