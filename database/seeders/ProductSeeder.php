<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Rif Mountain Honey',
            'price' => 250.00,
            'category' => 'Food',
            'image' => 'img/honey.jpg',
            'description' => 'Pure organic honey from the Jbala mountains.'
        ]);

        Product::create([
            'name' => 'Jbala Olive Oil',
            'price' => 80.00,
            'category' => 'Food',
            'image' => 'img/oil.jpg',
            'description' => 'Extra virgin olive oil pressed in Chefchaouen.'
        ]);

        Product::create([
            'name' => 'Wool Djellaba',
            'price' => 500.00,
            'category' => 'Clothing',
            'image' => 'img/djellaba.jpg',
            'description' => 'Traditional hand-woven wool djellaba.'
        ]);

        Product::create([
            'name' => 'Chefchaouen Pottery',
            'price' => 150.00,
            'category' => 'Pottery',
            'image' => 'img/pottery.jpg',
            'description' => 'Blue artisan pottery from the north.'
        ]);
    }
}