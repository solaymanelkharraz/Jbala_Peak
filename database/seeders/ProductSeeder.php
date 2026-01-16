<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // --- PAGE 1 PRODUCTS (The Originals) ---

        Product::create([
            'name' => 'Chefchaouen Tagine',
            'price' => 250.00,
            'category' => 'Pottery',
            'image' => 'img/tagine.jfif',
            'description' => 'Traditional clay tagine handcrafted in the north.'
        ]);

        Product::create([
            'name' => 'Winter Rif Djellaba',
            'price' => 850.00,
            'category' => 'Clothing',
            'image' => 'img/jbal.avif',
            'description' => 'Warm wool djellaba for winter seasons.'
        ]);

        Product::create([
            'name' => 'Pure Mountain Honey',
            'price' => 180.00,
            'category' => 'Organic Food',
            'image' => 'img/honey.jfif',
            'description' => '100% organic honey from the Rif mountains.'
        ]);

        Product::create([
            'name' => 'Cold Pressed Olive Oil',
            'price' => 120.00,
            'category' => 'Organic Food',
            'image' => 'img/oil.jpg',
            'description' => 'Premium virgin olive oil.'
        ]);

        Product::create([
            'name' => 'Artisan Water Cup',
            'price' => 50.00,
            'category' => 'Pottery',
            'image' => 'img/cup.jfif',
            'description' => 'Hand-painted clay cup.'
        ]);

        Product::create([
            'name' => 'Cosmetic Argan Oil',
            'price' => 300.00,
            'category' => 'Beauty',
            'image' => 'img/argan.jfif',
            'description' => 'Pure argan oil for skin and hair.'
        ]);

        // --- PAGE 2 PRODUCTS (New Variations using same images) ---

        Product::create([
            'name' => 'Royal Serving Tagine',
            'price' => 350.00,
            'category' => 'Pottery',
            'image' => 'img/tagine.jfif', // Reusing image
            'description' => 'Large glazed tagine for family feasts.'
        ]);

        Product::create([
            'name' => 'Summer White Djellaba',
            'price' => 600.00,
            'category' => 'Clothing',
            'image' => 'img/jbal.avif', // Reusing image
            'description' => 'Lightweight cotton djellaba for summer.'
        ]);

        Product::create([
            'name' => 'Eucalyptus Honey',
            'price' => 200.00,
            'category' => 'Organic Food',
            'image' => 'img/honey.jfif', // Reusing image
            'description' => 'Dark, rich honey with healing properties.'
        ]);

        Product::create([
            'name' => 'Spicy Olive Oil',
            'price' => 140.00,
            'category' => 'Organic Food',
            'image' => 'img/oil.jpg', // Reusing image
            'description' => 'Infused with Rif mountain herbs and chili.'
        ]);

        // 11
        Product::create([
            'name' => 'Clay Water Jug',
            'price' => 90.00,
            'category' => 'Pottery',
            'image' => 'img/cup.jfif', // Reusing image
            'description' => 'Keeps water naturally cool.'
        ]);

        // 12
        Product::create([
            'name' => 'Roasted Argan Oil',
            'price' => 320.00,
            'category' => 'Organic Food',
            'image' => 'img/argan.jfif', // Reusing image
            'description' => 'Culinary argan oil for salads and dipping.'
        ]);
    }
}