<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    $products = \App\Models\Product::take(6)->get();
    return view('welcome', ['products' => $products]);
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('shop.index');

Route::get('/category/{cat}', [ProductController::class, 'filter'])->name('shop.filter');

Route::get('/about', function () { return view('about'); });
Route::get('/contact', function () { return view('contact'); });
