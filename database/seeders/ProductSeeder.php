<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // 1. Chefchaouen Tagine
        Product::create([
            'name' => 'Chefchaouen Tagine',
            'price' => 250.00,
            'category' => 'Pottery',
            'image' => 'img/tagine.jfif', // Make sure file name matches exactly!
            'description' => 'Traditional clay tagine handcrafted in the north.'
        ]);

        // 2. Winter Rif Djellaba
        Product::create([
            'name' => 'Winter Rif Djellaba',
            'price' => 850.00,
            'category' => 'Clothing',
            'image' => 'img/jbal.avif',
            'description' => 'Warm wool djellaba for winter seasons.'
        ]);

        // 3. Pure Mountain Honey
        Product::create([
            'name' => 'Pure Mountain Honey',
            'price' => 180.00,
            'category' => 'Organic Food',
            'image' => 'img/honey.jfif',
            'description' => '100% organic honey from the Rif mountains.'
        ]);

        // 4. Cold Pressed Olive Oil
        Product::create([
            'name' => 'Cold Pressed Olive Oil',
            'price' => 120.00,
            'category' => 'Organic Food',
            'image' => 'img/oil.jpg',
            'description' => 'Premium virgin olive oil.'
        ]);

        // 5. Artisan Water Cup
        Product::create([
            'name' => 'Artisan Water Cup',
            'price' => 50.00,
            'category' => 'Pottery',
            'image' => 'img/cup.jfif',
            'description' => 'Hand-painted clay cup.'
        ]);

        // 6. Cosmetic Argan Oil
        Product::create([
            'name' => 'Cosmetic Argan Oil',
            'price' => 300.00,
            'category' => 'Beauty',
            'image' => 'img/argan.jfif',
            'description' => 'Pure argan oil for skin and hair.'
        ]);
    }
}