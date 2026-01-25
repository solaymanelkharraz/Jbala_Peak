<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import your Product model
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        // 1. Check if ADMIN -> Go to Admin Dashboard
        if ($user->role === 'ADMIN') {
            return redirect()->route('produits.index');
        }

        // 2. USER DASHBOARD DATA
        
        // A. "Suggested for You" (Teacher's "Soldes" requirement)
        // We pick 4 random products to show as "Special Offers"
        $suggestedProducts = Product::inRandomOrder()->take(4)->get();

        // B. "My Orders" (Future feature)
        // For now, we send an empty list. Later you will fetch real orders here.
        $myOrders = []; 

        return view('home', compact('suggestedProducts', 'myOrders'));
    }
}