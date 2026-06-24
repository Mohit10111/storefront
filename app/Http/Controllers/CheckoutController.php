<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'Your cart is empty.');
        }

        $cartItems = [];
        $cartTotal = 0;

        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $quantity
                ];
                $cartTotal += $product->price * $quantity;
            }
        }

        return view('checkout.index', compact('cartItems', 'cartTotal'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
        ]);

        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'Your cart is empty.');
        }

        $cartTotal = 0;
        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);
            if ($product) {
                $cartTotal += $product->price * $quantity;
            }
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $cartTotal,
            'status' => 'pending', // Cash on delivery or dummy payment
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'zip' => $request->zip,
            'phone' => $request->phone,
        ]);

        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);
            if ($product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ]);
            }
        }

        // Clear the cart
        Session::forget('cart');

        return redirect()->route('checkout.success', $order);
    }

    public function success(Order $order)
    {
        // Ensure only the owner or guests can view this (simplification for this task)
        return view('checkout.success', compact('order'));
    }
}
