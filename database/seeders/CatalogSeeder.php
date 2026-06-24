<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Coupon;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create a dummy active coupon
        Coupon::create([
            'title' => 'Welcome Discount',
            'code' => 'WELCOME300',
            'discount_text' => 'FLAT ₹300 OFF ON FIRST PURCHASE',
            'is_active' => true,
        ]);

        // 2. Define Parent Categories
        $parentMen = Category::create(['name' => 'Men']);
        $parentWomen = Category::create(['name' => 'Women']);
        $parentKids = Category::create(['name' => 'Kids']);
        $parentHome = Category::create(['name' => 'Home & Living']);

        // 3. Define Sub-Categories
        $subCategoriesData = [
            // Women's Subcategories
            [
                'parent_id' => $parentWomen->id,
                'name' => 'Activewear',
                'image' => 'https://images.unsplash.com/photo-1518459031867-a89b944bffe4?w=400&h=500&fit=crop',
                'desc' => 'Workout and activewear for women'
            ],
            [
                'parent_id' => $parentWomen->id,
                'name' => 'Handbags',
                'image' => 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=400&h=500&fit=crop',
                'desc' => 'Premium leather handbags and clutches'
            ],
            [
                'parent_id' => $parentWomen->id,
                'name' => 'Sunglasses',
                'image' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=400&h=500&fit=crop',
                'desc' => 'Designer sunglasses'
            ],
            // Men's Subcategories
            [
                'parent_id' => $parentMen->id,
                'name' => 'Footwear',
                'image' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?w=400&h=500&fit=crop',
                'desc' => 'Formal shoes and casual sneakers'
            ],
            [
                'parent_id' => $parentMen->id,
                'name' => 'Watches',
                'image' => 'https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=400&h=500&fit=crop',
                'desc' => 'Luxury analog and smart watches'
            ],
            // Kids' Subcategories
            [
                'parent_id' => $parentKids->id,
                'name' => 'Boys Clothing',
                'image' => 'https://images.unsplash.com/photo-1596870230751-ebdfce98ec42?w=400&h=500&fit=crop',
                'desc' => 'T-shirts, jeans, and activewear for boys'
            ],
            [
                'parent_id' => $parentKids->id,
                'name' => 'Girls Clothing',
                'image' => 'https://images.unsplash.com/photo-1622218286192-95f6a20083c7?w=400&h=500&fit=crop',
                'desc' => 'Dresses, tops, and skirts for girls'
            ],
            // Home & Living Subcategories
            [
                'parent_id' => $parentHome->id,
                'name' => 'Home Decor',
                'image' => 'https://images.unsplash.com/photo-1616046229478-9901c5536a45?w=400&h=500&fit=crop',
                'desc' => 'Vases, wall art, and interior decor'
            ],
            [
                'parent_id' => $parentHome->id,
                'name' => 'Bedding',
                'image' => 'https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?w=400&h=500&fit=crop',
                'desc' => 'Luxury bedsheets, pillows, and comforters'
            ]
        ];

        $unsplashUrls = [
            'Activewear' => [
                "https://images.unsplash.com/photo-1518459031867-a89b944bffe4?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1483721310020-03333e577078?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1518459031867-a89b944bffe4?q=80&w=400&h=500&fit=crop" // Replaced broken 1522836924445
            ],
            'Footwear' => [
                "https://images.unsplash.com/photo-1549298916-b41d501d3772?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1560769629-975ec94e6a86?q=80&w=400&h=500&fit=crop"
            ],
            'Handbags' => [
                "https://images.unsplash.com/photo-1584917865442-de89df76afd3?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1591561954557-26941169b49e?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1590874103328-eac38a683ce7?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1584917865442-de89df76afd3?q=80&w=400&h=500&fit=crop" 
            ],
            'Watches' => [
                "https://images.unsplash.com/photo-1524592094714-0f0654e20314?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1523170335258-f5ed11844a49?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1508685096489-7aacd43bd3b1?q=80&w=400&h=500&fit=crop"
            ],
            'Sunglasses' => [
                "https://images.unsplash.com/photo-1511499767150-a48a237f0083?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1511499767150-a48a237f0083?q=80&w=400&h=500&fit=crop", // Replaced broken 1572635196237
                "https://images.unsplash.com/photo-1508296695146-257a814070b4?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1577803645773-f96470509666?q=80&w=400&h=500&fit=crop"
            ],
            'Boys Clothing' => [
                "https://images.unsplash.com/photo-1519238263530-99bdd11df2ea?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1566454544259-f4b94c3d758c?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1596870230751-ebdfce98ec42?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1518831959646-742c3a14ebf7?q=80&w=400&h=500&fit=crop"
            ],
            'Girls Clothing' => [
                "https://images.unsplash.com/photo-1622218286192-95f6a20083c7?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1578897367107-2828e351c8a8?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1525507119028-ed4c629a60a3?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1621452773781-0f992fd1f5cb?q=80&w=400&h=500&fit=crop"
            ],
            'Home Decor' => [
                "https://images.unsplash.com/photo-1616046229478-9901c5536a45?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1618220179428-22790b461013?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1615873968403-89e068629265?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1572048572872-2394404cf1f3?q=80&w=400&h=500&fit=crop"
            ],
            'Bedding' => [
                "https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1582131503261-fca1d1c0589f?q=80&w=400&h=500&fit=crop",
                "https://images.unsplash.com/photo-1628152371231-936cf45eb8f3?q=80&w=400&h=500&fit=crop"
            ]
        ];

        // 4. Create subcategories and products with UNIQUE images
        foreach ($subCategoriesData as $index => $catData) {
            $category = Category::create([
                'parent_id' => $catData['parent_id'],
                'name' => $catData['name'],
                'image' => $catData['image']
            ]);

            // Create 4 products for this subcategory
            for ($i = 1; $i <= 4; $i++) {
                $imgUrl = $unsplashUrls[$catData['name']][$i - 1] ?? "https://images.unsplash.com/photo-1560769629-975ec94e6a86?q=80&w=400&h=500&fit=crop";

                Product::create([
                    'category_id' => $category->id,
                    'name' => $catData['name'] . ' Item ' . $i,
                    'price' => rand(999, 9999),
                    'quantity' => rand(5, 50),
                    'status' => 'active',
                    'image' => $imgUrl 
                ]);
            }
        }
    }
}
