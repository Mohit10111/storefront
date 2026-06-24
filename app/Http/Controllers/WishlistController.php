<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    /**
     * Display a listing of the wishlist items.
     */
    public function index()
    {
        $wishlistIds = Session::get('wishlist', []);
        
        $products = collect();
        if (!empty($wishlistIds)) {
            $products = Product::whereIn('id', $wishlistIds)->get();
        }

        return view('wishlist.index', compact('products'));
    }

    /**
     * Toggle a product in the wishlist.
     */
    public function toggle(Request $request, Product $product)
    {
        $wishlist = Session::get('wishlist', []);
        
        if (in_array($product->id, $wishlist)) {
            // Remove from wishlist
            $wishlist = array_diff($wishlist, [$product->id]);
            Session::put('wishlist', $wishlist);
            return back()->with('success', 'Product removed from wishlist!');
        } else {
            // Add to wishlist
            $wishlist[] = $product->id;
            Session::put('wishlist', $wishlist);
            return back()->with('success', 'Product added to wishlist!');
        }
    }
}
