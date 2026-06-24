<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        $cart = Session::get('cart', []);
        
        $quantity = $request->input('quantity', 1);
        
        if (isset($cart[$product->id])) {
            $cart[$product->id] += $quantity;
        } else {
            $cart[$product->id] = $quantity;
        }
        
        Session::put('cart', $cart);
        
        return redirect()->back()->with('cart_open', true);
    }

    public function remove(Product $product)
    {
        $cart = Session::get('cart', []);
        
        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            Session::put('cart', $cart);
        }
        
        return redirect()->back()->with('cart_open', true);
    }
}
