<div class="premium-product-card reveal-up">
    <div class="card-img-wrapper">
        <a href="{{ route('home.product.show', $product) }}">
            @if($product->image)
                @if(Str::startsWith($product->image, ['http://', 'https://', '/image/']))
                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                @endif
            @else
                <div class="placeholder-img"></div>
            @endif
        </a>

        <!-- Floating Action Buttons -->
        <div class="card-actions">
            <form action="{{ route('wishlist.toggle', $product) }}" method="POST">
                @csrf
                <button type="submit" class="action-btn" title="Add to Wishlist">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                </button>
            </form>

            <a href="{{ route('home.product.show', $product) }}" class="action-btn" title="View Product">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
            </a>
        </div>
    </div>

    <div class="card-info">
        <a href="{{ route('home.product.show', $product) }}" class="card-title">{{ $product->name }}</a>
        <p class="card-price">₹{{ number_format($product->price, 2) }}</p>
    </div>
</div>
