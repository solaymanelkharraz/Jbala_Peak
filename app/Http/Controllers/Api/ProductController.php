<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product; // Your Jbala Product Model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1. LIST: Get all products
    public function index()
    {
        return response()->json(Product::all());
    }

    // 2. FILTER: Search by Name (Adapted from PDF "filtrer")
    public function filter(Request $request)
    {
        $query = $request->input('p');
        // We search in the 'name' column instead of 'titre'
        $products = Product::where('name', 'like', "%$query%")->get();
        return response()->json($products);
    }

    // 3. STORE: Add a new product (Adapted from PDF "store")
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string', // Assuming you send a URL or text for now
        ]);

        // Create the product using your database columns
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $request->image 
        ]);

        return response()->json([
            'message' => 'Product added successfully to Jbala Peak!',
            'product' => $product
        ], 201);
    }

    // 4. UPDATE: Edit a product
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update($request->all());

        return response()->json([
            'message' => 'Product updated successfully!',
            'product' => $product
        ]);
    }

    // 5. DESTROY: Delete a product
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted']);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }
}