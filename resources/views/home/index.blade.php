@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section class="hero" style="background-image:url('{{ asset('image/hero.avif') }}')">
    <h1>STOREFRONT</h1>

    <p>Curated Collection For Modern Living</p>

    <a href="{{ route('products.index') }}" class="hero-btn">
        SHOP NOW
    </a>
</section>

<section class="categories">

    <h2>Categories</h2>

    <div class="category-grid">

        @forelse($categories as $category)

            @include('components.category-card', [
                'category' => $category
            ])

        @empty

            <p>No categories found.</p>

        @endforelse

    </div>

</section>

<section class="products">

    <h2>Products</h2>

    <div class="product-grid">

        @forelse($products as $product)

            @include('components.product-card', [
                'product' => $product
            ])

        @empty

            <p>No products found.</p>

        @endforelse

    </div>

</section>

@endsection