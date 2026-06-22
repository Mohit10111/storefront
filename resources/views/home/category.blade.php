@extends('layouts.app')

@section('content')

<section class="products">

    <h2>{{ $category->name }}</h2>

    <div class="product-grid">

        @forelse($products as $product)

            <div class="card">

                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}">
                @endif

                <h3>{{ $product->name }}</h3>

                <p class="price">
                    ₹{{ number_format($product->price, 2) }}
                </p>

                <p class="category">
                    {{ $category->name }}
                </p>

            </div>

        @empty

            <p>No products found in this category.</p>

        @endforelse

    </div>

</section>

@endsection