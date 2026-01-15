<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; 

Route::get('/', [ProductController::class, 'index'])->name('home');


Route::get('/category/{cat}', [ProductController::class, 'filter'])->name('shop.filter');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');