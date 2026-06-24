<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::whereNotNull('parent_id')->get();

        $products = Product::with('category')
            ->available()
            ->latest()
            ->take(4)
            ->get();

        $activeCoupons = \App\Models\Coupon::where('is_active', true)->get();

        return view('home.index', compact('categories', 'products', 'activeCoupons'));
    }

    public function category(Category $category)
    {
        $categoryIds = Category::where('parent_id', $category->id)->pluck('id')->toArray();
        $categoryIds[] = $category->id;

        $products = Product::with('category')
            ->whereIn('category_id', $categoryIds)
            ->available()
            ->get();

        return view('home.category', compact('category', 'products'));
    }

    public function products(\Illuminate\Http\Request $request)
    {
        $query = Product::with('category')->available();
        
        if ($search = $request->get('search')) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhereHas('category', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
        }
        
        $products = $query->get();
        return view('home.products', compact('products'));
    }

    public function show(Product $product)
    {
        // Suggest a few related products from the same category
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->available()
            ->take(4)
            ->get();
            
        return view('home.product', compact('product', 'relatedProducts'));
    }
}