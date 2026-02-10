<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // 1. Show the Cart Page [cite: 363-367]
    // 1. Show the Cart Page
    public function cart($lang = 'en') // Add $lang
    {
        return view('cart');
    }

    // 2. Add a Product
    public function addToCart($lang, $id) // Add $lang
    {
        $product = Product::findOrFail($id); // Now $id will correctly be '5'
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

    // 3. Update Quantity
    public function updateCart(Request $request, $lang) // Add $lang
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                $cart[$request->id]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Quantité mise à jour !');
            }
        }
    }

    // 4. Remove a Product
    public function removeFromCart(Request $request, $lang) // Add $lang
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Produit supprimé !');
        }
    }
}
