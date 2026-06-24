<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StorefrontSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create Admin User (credentials pulled from .env for security)
        $adminEmail = env('ADMIN_EMAIL');
        $adminPassword = env('ADMIN_PASSWORD');

        if ($adminEmail && $adminPassword) {
            User::updateOrCreate(
                ['email' => $adminEmail],
                [
                    'name' => 'Admin User',
                    'password' => Hash::make($adminPassword),
                    'is_admin' => true,
                ]
            );
        }

        // 2. Create Parent Categories
        $men = Category::firstOrCreate(['name' => 'Men']);
        $women = Category::firstOrCreate(['name' => 'Women']);
        $kids = Category::firstOrCreate(['name' => 'Kids']);
        $home = Category::firstOrCreate(['name' => 'Home & Living']);

        // 3. Create Child Categories with specific local images
        $footwear = Category::firstOrCreate([
            'name' => 'Footwear',
            'parent_id' => $men->id,
            'image' => '/image/cat_footwear.png'
        ]);

        Category::firstOrCreate(['name' => 'Accessories', 'parent_id' => $men->id]);
        Category::firstOrCreate(['name' => 'Activewear', 'parent_id' => $men->id]);

        $activewear = Category::firstOrCreate([
            'name' => 'Activewear',
            'parent_id' => $women->id,
            'image' => '/image/cat_activewear.png'
        ]);

        $handbags = Category::firstOrCreate([
            'name' => 'Handbags',
            'parent_id' => $women->id,
            'image' => '/image/cat_handbags.png'
        ]);

        Category::firstOrCreate(['name' => 'Dresses', 'parent_id' => $women->id]);
        Category::firstOrCreate(['name' => 'Jewelry', 'parent_id' => $women->id]);

        $boys = Category::firstOrCreate([
            'name' => 'Boys Clothing',
            'parent_id' => $kids->id,
            'image' => '/image/cat_boys_clothing.png'
        ]);

        Category::firstOrCreate(['name' => 'Toys', 'parent_id' => $kids->id]);
        Category::firstOrCreate(['name' => 'Infant Care', 'parent_id' => $kids->id]);

        $decor = Category::firstOrCreate([
            'name' => 'Home Decor',
            'parent_id' => $home->id,
            'image' => '/image/cat_home_decor.png'
        ]);

        Category::firstOrCreate(['name' => 'Furniture', 'parent_id' => $home->id]);
        Category::firstOrCreate(['name' => 'Kitchen', 'parent_id' => $home->id]);

        // 4. Create Products
        $products = [
            [
                'name' => 'Premium Leather Handbag',
                'category_id' => $handbags->id,
                'price' => 4500,
                'quantity' => 15,
                'status' => 'active',
                'image' => '/image/cat_handbags.png',
                
            ],
            [
                'name' => 'Classic White Sneakers',
                'category_id' => $footwear->id,
                'price' => 2999,
                'quantity' => 50,
                'status' => 'active',
                'image' => '/image/cat_footwear.png',
                
            ],
            [
                'name' => 'Womens Yoga Leggings',
                'category_id' => $activewear->id,
                'price' => 1599,
                'quantity' => 100,
                'status' => 'active',
                'image' => '/image/cat_activewear.png',
                
            ],
            [
                'name' => 'Boys Graphic T-Shirt',
                'category_id' => $boys->id,
                'price' => 799,
                'quantity' => 30,
                'status' => 'active',
                'image' => '/image/cat_boys_clothing.png', // Correct image
                
            ],
            [
                'name' => 'Modern Table Lamp',
                'category_id' => $decor->id,
                'price' => 1299,
                'quantity' => 10,
                'status' => 'active',
                'image' => '/image/cat_home_decor.png',
                
            ],
            [
                'name' => 'Mens Running Shoes',
                'category_id' => $footwear->id,
                'price' => 3499,
                'quantity' => 25,
                'status' => 'active',
                'image' => '/image/cat_mens_running_shoes.png',
                
            ],
            [
                'name' => 'Designer Tote Bag',
                'category_id' => $handbags->id,
                'price' => 6999,
                'quantity' => 0, // Should be hidden from storefront
                'status' => 'active',
                'image' => '/image/cat_handbags.png',
                
            ],
            [
                'name' => 'Discontinued Decor',
                'category_id' => $decor->id,
                'price' => 499,
                'quantity' => 5,
                'status' => 'inactive', // Should be hidden from storefront
                'image' => '/image/hero_banner_2.png',
                
            ],
            [
                'name' => 'Premium Aviator Sunglasses',
                'category_id' => $men->id,
                'price' => 1999,
                'quantity' => 100,
                'status' => 'active',
                'image' => '/image/prod_sunglasses.png',
                
            ],
            [
                'name' => 'Luxury Smartwatch Black',
                'category_id' => $men->id,
                'price' => 5999,
                'quantity' => 50,
                'status' => 'active',
                'image' => '/image/prod_smartwatch.png',
                
            ]
        ];

        foreach ($products as $prod) {
            Product::firstOrCreate(
                ['name' => $prod['name']], // check by name to avoid duplicates
                $prod
            );
        }
    }
}
