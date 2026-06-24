@extends('layouts.storefront')

@section('title', 'My Wishlist')

@section('content')
<main class="products-page">
    
    <div class="products-header">
        <h1>MY WISHLIST</h1>
        <p style="color: var(--text-muted); margin-top: 10px;">{{ $products->count() }} items</p>
    </div>

    @if(session('success'))
        <div style="background: #e6f9e6; color: #28a745; padding: 15px; margin-bottom: 30px; text-align: center; border-radius: 4px;">
            {{ session('success') }}
        </div>
    @endif

    @if($products->count() > 0)
        <div class="product-grid">
            @foreach($products as $product)
                <div style="position: relative;">
                    @include('components.product-card', ['product' => $product])
                    
                    <form action="{{ route('wishlist.toggle', $product) }}" method="POST" style="position: absolute; top: 10px; right: 10px; z-index: 10;">
                        @csrf
                        <button type="submit" style="background: #fff; border: 1px solid #eaeaec; border-radius: 50%; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ff3e6c" style="width: 20px; height: 20px;"><path d="M6 18 18 6M6 6l12 12" stroke="#ff3e6c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <div class="no-results">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#eaeaec" style="width: 100px; height: 100px; margin: 0 auto 20px;"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" /></svg>
            <h2>Your wishlist is empty</h2>
            <p>Save items that you like in your wishlist. Review them anytime and easily move them to the bag.</p>
            <a href="{{ route('home.products') }}" class="hero-btn" style="display: inline-block;">Continue Shopping</a>
        </div>
    @endif

</main>
@endsection
