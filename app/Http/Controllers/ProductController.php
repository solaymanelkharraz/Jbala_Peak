<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
public function index()
{

    $products = Product::paginate(6); 
return view('products', ['products' => $products]);
}

    public function filter($category)
    {
        $products = Product::where('category', $category)->paginate(6);
        
        return view('products', [
            'products' => $products,
            'currentCategory' => $category
        ]);
    }
}