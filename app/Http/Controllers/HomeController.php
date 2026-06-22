<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $products = Product::where('quantity', '>', 0)
            ->where('status', 'active')
            ->get();

        return view('home.index', compact('categories', 'products'));
    }

    public function category(Category $category)
    {
        $products = Product::where('category_id', $category->id)
            ->where('quantity', '>', 0)
            ->where('status', 'active')
            ->get();

        return view('home.category', compact('category', 'products'));
    }
}