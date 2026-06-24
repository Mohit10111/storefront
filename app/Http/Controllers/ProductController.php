<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $products = Product::with('category')
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
        })
        ->latest()
        ->get();

    return view('products.index', compact('products'));
}

    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|max:255',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'status' => 'required',
        'image' => 'nullable|image'
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')
            ->store('products', 'public');
    }

    Product::create([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'status' => $request->status,
        'image' => $imagePath
    ]);

    return redirect()->route('products.index');
}

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

   public function update(Request $request, Product $product)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|max:255',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'status' => 'required',
        'image' => 'nullable|image'
    ]);

    $imagePath = $product->image;

    if ($request->hasFile('image')) {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $imagePath = $request->file('image')->store('products', 'public');
    }

    $product->update([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'status' => $request->status,
        'image' => $imagePath
    ]);

    return redirect()->route('products.index');
}

   public function destroy(Product $product)
{
    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }
    $product->delete();

    return redirect()->route('products.index');
}
}