<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // 1. Show the Cart Page [cite: 363-367]
    public function cart()
    {
        return view('cart');
    }

    // 2. Add a Product [cite: 368-401]
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []); 

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++; 
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "photo" => $product->image
            ];
        }

        session()->put('cart', $cart); 
        return redirect()->back()->with('success', 'Produit ajouté au panier !');
    }

    // 3. Update Quantity (New logic from Séance 25) [cite: 402-409]
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity) {
            $cart = session()->get('cart');
            
            // Only update if the product exists in the cart [cite: 405-406]
            if(isset($cart[$request->id])) {
                $cart[$request->id]['quantity'] = $request->quantity;
                session()->put('cart', $cart); // Save changes to session [cite: 407]
                return redirect()->back()->with('success', 'Quantité mise à jour !');
            }
        }
    }

    // 4. Remove a Product [cite: 410-417]
    public function removeFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]); // Delete product from array [cite: 414]
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Produit supprimé !');
        }
    }
}