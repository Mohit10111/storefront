@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="container">

    <h1>Products</h1>

    <a href="{{ route('products.create') }}">
        Add Product
    </a>

    <br><br>

    @forelse($products as $product)

        <div>

            @if($product->image)

                <img src="{{ asset('storage/' . $product->image) }}"
                     width="150">

            @endif

            <h3>{{ $product->name }}</h3>

            <p>Price: ₹{{ $product->price }}</p>

            <p>Quantity: {{ $product->quantity }}</p>

            <p>Status: {{ $product->status }}</p>

            <p>
                Category:
                {{ $product->category->name ?? 'No Category' }}
            </p>

            <a href="{{ route('products.edit', $product->id) }}">
                Edit
            </a>

            <form action="{{ route('products.destroy', $product->id) }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Delete
                </button>

            </form>

        </div>

        <hr>

    @empty

        <p>No products found.</p>

    @endforelse

</div>

@endsection