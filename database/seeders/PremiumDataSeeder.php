<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class PremiumDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Ethnic Wear
        $ethnic = Category::create([
            'name' => 'Luxury Ethnic Wear',
            'image' => 'images/cat_ethnic.png',
        ]);

        Product::create([
            'category_id' => $ethnic->id,
            'name' => 'Rose Gold Bridal Lehenga',
            'price' => 150000,
            'quantity' => 10,
            'image' => 'images/prod_lehenga.png',
        ]);

        Product::create([
            'category_id' => $ethnic->id,
            'name' => 'Midnight Blue Silk Saree',
            'price' => 45000,
            'quantity' => 15,
            'image' => 'images/prod_saree.png',
        ]);

        Product::create([
            'category_id' => $ethnic->id,
            'name' => 'Ivory Hand-embroidered Anarkali',
            'price' => 65000,
            'quantity' => 5,
            'image' => 'images/prod_anarkali.png',
        ]);

        // 2. Fine Jewelry
        $jewelry = Category::create([
            'name' => 'Fine Jewelry',
            'image' => 'images/cat_jewelry.png',
        ]);

        Product::create([
            'category_id' => $jewelry->id,
            'name' => 'Royal Kundan Bridal Choker',
            'price' => 210000,
            'quantity' => 2,
            'image' => 'images/prod_choker.png',
        ]);

        Product::create([
            'category_id' => $jewelry->id,
            'name' => 'Polki Diamond Drop Earrings',
            'price' => 85000,
            'quantity' => 4,
            'image' => 'images/prod_earrings.png',
        ]);

        Product::create([
            'category_id' => $jewelry->id,
            'name' => 'Emerald Heritage Bangle Set',
            'price' => 125000,
            'quantity' => 3,
            'image' => 'images/prod_bangles.png',
        ]);

        // 3. Designer Handbags
        $handbags = Category::create([
            'name' => 'Designer Handbags',
            'image' => 'images/cat_handbags.png',
        ]);

        Product::create([
            'category_id' => $handbags->id,
            'name' => 'Pearl Embellished Velvet Potli',
            'price' => 12000,
            'quantity' => 20,
            'image' => 'images/prod_potli.png',
        ]);

        Product::create([
            'category_id' => $handbags->id,
            'name' => 'Swarovski Crystal Evening Clutch',
            'price' => 35000,
            'quantity' => 8,
            'image' => 'images/prod_clutch.png',
        ]);

        Product::create([
            'category_id' => $handbags->id,
            'name' => 'Gold Zardosi Box Bag',
            'price' => 18500,
            'quantity' => 12,
            'image' => 'images/prod_boxbag.png',
        ]);
    }
}
