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
        
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json($this->getCartData());
        }
        
        return redirect()->back()->with('cart_open', true);
    }

    public function update(Request $request, Product $product)
    {
        $cart = Session::get('cart', []);
        $action = $request->input('action');
        
        if (isset($cart[$product->id])) {
            if ($action === 'increase') {
                $cart[$product->id]++;
            } elseif ($action === 'decrease') {
                if ($cart[$product->id] > 1) {
                    $cart[$product->id]--;
                } else {
                    unset($cart[$product->id]);
                }
            }
            Session::put('cart', $cart);
        }
        
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json($this->getCartData());
        }
        
        return redirect()->back()->with('cart_open', true);
    }

    public function remove(Request $request, Product $product)
    {
        $cart = Session::get('cart', []);
        
        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            Session::put('cart', $cart);
        }
        
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json($this->getCartData());
        }
        
        return redirect()->back()->with('cart_open', true);
    }

    private function getCartData()
    {
        $cart = Session::get('cart', []);
        $cartItems = [];
        $cartTotal = 0;
        $cartCount = 0;

        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);
            if ($product) {
                $cartItems[] = [
                    'id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'total' => $product->price * $quantity,
                ];
                $cartTotal += $product->price * $quantity;
                $cartCount += $quantity;
            }
        }

        return [
            'success' => true,
            'items' => $cartItems,
            'subtotal' => number_format($cartTotal, 2, '.', ''),
            'count' => $cartCount
        ];
    }
}
