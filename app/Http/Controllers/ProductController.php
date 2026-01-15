<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function filter($category)
    {
        $products = Product::where('category', $category)->get();
        
        return view('products', [
            'products' => $products,
            'currentCategory' => $category
        ]);
    }
}