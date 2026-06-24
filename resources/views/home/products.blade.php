@extends('layouts.storefront')

@section('content')
<main class="products-page">
    <div class="products-header">
        @if(request('search'))
            <h1>Search Results for "{{ request('search') }}"</h1>
        @else
            <h1>All Products</h1>
        @endif
    </div>

    <div class="products-container">
        @if($products->count() > 0)
            <div class="product-grid">
                @foreach($products as $prod)
                    @include('components.product-card', ['product' => $prod])
                @endforeach
            </div>
        @else
            <div class="no-results">
                <h2>No products found.</h2>
                <p>Try adjusting your search or browse our categories.</p>
                <a href="{{ route('home') }}" class="hero-btn">Return Home</a>
            </div>
        @endif
    </div>
</main>
@endsection
