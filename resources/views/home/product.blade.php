@extends('layouts.storefront')

@section('content')
<main class="product-detail-page">
    <div class="product-container">
        
        <div class="product-image-section">
            <div class="main-image zoom-container" onmousemove="zoomImage(event)" onmouseleave="resetZoom()">
                @if($product->image)
                    @if(Str::startsWith($product->image, ['http://', 'https://', '/image/']))
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" id="main-product-img">
                    @else
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" id="main-product-img">
                    @endif
                @else
                    <div class="no-img">No Image Available</div>
                @endif
            </div>

            <!-- Zoom Control -->
            <div class="zoom-controls" style="margin-top: 15px; display: flex; align-items: center; justify-content: center; gap: 10px;">
                <span style="font-size: 12px; color: #666; text-transform: uppercase; letter-spacing: 1px;">Zoom Level</span>
                <input type="range" id="zoom-slider" min="1.5" max="4" step="0.5" value="2.5" style="width: 150px; cursor: pointer;">
            </div>

            <!-- Gallery Thumbnails (Placeholders + Main Image) -->
            <div class="product-thumbnails" style="display: flex; gap: 10px; margin-top: 20px;">
                @if($product->image)
                    @php 
                        $mainImgSrc = Str::startsWith($product->image, ['http://', 'https://', '/image/']) ? $product->image : asset('storage/' . $product->image);
                    @endphp
                    <div class="thumbnail active" onclick="swapImage(this, '{{ $mainImgSrc }}')">
                        <img src="{{ $mainImgSrc }}" style="width: 80px; height: 100px; object-fit: cover; cursor: pointer;">
                    </div>
                @endif
                <!-- Placeholder additional images to fulfill "more pictures" request -->
                <div class="thumbnail" onclick="swapImage(this, '{{ asset('image/cat_activewear.png') }}')">
                    <img src="{{ asset('image/cat_activewear.png') }}" style="width: 80px; height: 100px; object-fit: cover; cursor: pointer; opacity: 0.6;">
                </div>
                <div class="thumbnail" onclick="swapImage(this, '{{ asset('image/cat_handbags.png') }}')">
                    <img src="{{ asset('image/cat_handbags.png') }}" style="width: 80px; height: 100px; object-fit: cover; cursor: pointer; opacity: 0.6;">
                </div>
                <div class="thumbnail" onclick="swapImage(this, '{{ asset('image/cat_footwear.png') }}')">
                    <img src="{{ asset('image/cat_footwear.png') }}" style="width: 80px; height: 100px; object-fit: cover; cursor: pointer; opacity: 0.6;">
                </div>
            </div>
        </div>

        <div class="product-info-section" style="padding: 0 40px; text-align: left;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                <h1 style="font-family: var(--font-heading); font-size: 32px; font-weight: 400; margin: 0; color: #000;">{{ $product->name }}</h1>
                <form action="{{ route('wishlist.toggle', $product) }}" method="POST">
                    @csrf
                    <button type="submit" class="wishlist-btn-outline" style="background: none; border: 1px solid #e0e0e0; border-radius: 50%; width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; cursor: pointer; flex-shrink: 0; margin-left: 20px;">
                        @if(in_array($product->id, Session::get('wishlist', [])))
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#111" style="width: 22px; height: 22px;"><path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" /></svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#333" style="width: 22px; height: 22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" /></svg>
                        @endif
                    </button>
                </form>
            </div>

            <p class="product-price" style="font-size: 24px; color: #111; font-weight: 400; margin-bottom: 30px;">₹{{ number_format($product->price, 2) }}</p>
            
            <hr style="border: none; border-top: 1px solid #f0f0f0; margin-bottom: 30px; width: 100%;">
            
            <p style="color: #777; line-height: 1.6; font-size: 15px; margin-bottom: 35px;">{{ $product->description ?? 'Is a relaxed linen coord juxtapositioning a stark red against a butter creme disguising the eye in equal parts formal and frolick' }}</p>

            <div style="margin-bottom: 35px;">
                <p style="font-size: 16px; margin-bottom: 15px; color: #111; font-weight: 400;">Size</p>
                <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                    <button type="button" class="size-btn" style="padding: 10px 18px; border: 1px solid #111; background: #111; color: #fff; cursor: pointer; font-size: 14px;" onclick="document.querySelectorAll('.product-info-section .size-btn').forEach(b => {b.style.background='#fff'; b.style.color='#333'; b.style.borderColor='#eee';}); this.style.background='#111'; this.style.color='#fff'; this.style.borderColor='#111';">S</button>
                    <button type="button" class="size-btn" style="padding: 10px 18px; border: 1px solid #eee; background: #fff; color: #333; cursor: pointer; font-size: 14px;" onclick="document.querySelectorAll('.product-info-section .size-btn').forEach(b => {b.style.background='#fff'; b.style.color='#333'; b.style.borderColor='#eee';}); this.style.background='#111'; this.style.color='#fff'; this.style.borderColor='#111';">M</button>
                    <button type="button" class="size-btn" style="padding: 10px 18px; border: 1px solid #eee; background: #fff; color: #333; cursor: pointer; font-size: 14px;" onclick="document.querySelectorAll('.product-info-section .size-btn').forEach(b => {b.style.background='#fff'; b.style.color='#333'; b.style.borderColor='#eee';}); this.style.background='#111'; this.style.color='#fff'; this.style.borderColor='#111';">L</button>
                    <button type="button" class="size-btn" style="padding: 10px 18px; border: 1px solid #eee; background: #fff; color: #333; cursor: pointer; font-size: 14px;" onclick="document.querySelectorAll('.product-info-section .size-btn').forEach(b => {b.style.background='#fff'; b.style.color='#333'; b.style.borderColor='#eee';}); this.style.background='#111'; this.style.color='#fff'; this.style.borderColor='#111';">XL</button>
                    <button type="button" class="size-btn" style="padding: 10px 18px; border: 1px solid #eee; background: #fff; color: #333; cursor: pointer; font-size: 14px;" onclick="document.querySelectorAll('.product-info-section .size-btn').forEach(b => {b.style.background='#fff'; b.style.color='#333'; b.style.borderColor='#eee';}); this.style.background='#111'; this.style.color='#fff'; this.style.borderColor='#111';">XS</button>
                    <button type="button" class="size-btn" style="padding: 10px 18px; border: 1px solid #eee; background: #fff; color: #333; cursor: pointer; font-size: 14px;" onclick="document.querySelectorAll('.product-info-section .size-btn').forEach(b => {b.style.background='#fff'; b.style.color='#333'; b.style.borderColor='#eee';}); this.style.background='#111'; this.style.color='#fff'; this.style.borderColor='#111';">XXL</button>
                    <button type="button" class="size-btn" style="padding: 10px 18px; border: 1px solid #eee; background: #fff; color: #333; cursor: pointer; font-size: 14px;" onclick="document.querySelectorAll('.product-info-section .size-btn').forEach(b => {b.style.background='#fff'; b.style.color='#333'; b.style.borderColor='#eee';}); this.style.background='#111'; this.style.color='#fff'; this.style.borderColor='#111';">XXXL</button>
                    <button type="button" class="size-btn" style="padding: 10px 18px; border: 1px solid #eee; background: #fff; color: #333; cursor: pointer; font-size: 14px;" onclick="document.querySelectorAll('.product-info-section .size-btn').forEach(b => {b.style.background='#fff'; b.style.color='#333'; b.style.borderColor='#eee';}); this.style.background='#111'; this.style.color='#fff'; this.style.borderColor='#111';">4XL</button>
                    <button type="button" class="size-btn" style="padding: 10px 18px; border: 1px solid #eee; background: #fff; color: #333; cursor: pointer; font-size: 14px;" onclick="document.querySelectorAll('.product-info-section .size-btn').forEach(b => {b.style.background='#fff'; b.style.color='#333'; b.style.borderColor='#eee';}); this.style.background='#111'; this.style.color='#fff'; this.style.borderColor='#111';">5XL</button>
                    <button type="button" class="size-btn" style="padding: 10px 18px; border: 1px solid #eee; background: #fff; color: #333; cursor: pointer; font-size: 14px;" onclick="document.querySelectorAll('.product-info-section .size-btn').forEach(b => {b.style.background='#fff'; b.style.color='#333'; b.style.borderColor='#eee';}); this.style.background='#111'; this.style.color='#fff'; this.style.borderColor='#111';">CUSTOM</button>
                </div>
            </div>

            <form action="{{ route('cart.add', $product) }}" method="POST" style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 40px;">
                @csrf
                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 10px;">
                    <span style="font-size: 12px; color: #888; font-weight: 600; letter-spacing: 1px;">QTY</span>
                    <div class="quantity-selector" style="display: flex; border: 1px solid #111; width: 110px;">
                        <button type="button" class="qty-btn" style="width: 35px; padding: 10px 0; background: none; border: none; cursor: pointer; font-size: 16px;" onclick="let input = this.nextElementSibling; if(input.value > 1) input.value--;">-</button>
                        <input type="number" value="1" min="1" max="{{ $product->quantity }}" name="quantity" style="width: 40px; text-align: center; border: none; outline: none; font-size: 15px; font-weight: 500;">
                        <button type="button" class="qty-btn" style="width: 35px; padding: 10px 0; background: none; border: none; cursor: pointer; font-size: 16px;" onclick="let input = this.previousElementSibling; if(input.value < {{ $product->quantity }}) input.value++;">+</button>
                    </div>
                </div>

                <button type="submit" style="width: 100%; border: 1px solid #e0e0e0; background: #fff; color: #111; cursor: pointer; text-align: center; font-size: 14px; font-weight: 600; padding: 16px; letter-spacing: 1.5px; transition: background 0.2s;" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='#fff'">ADD TO CART</button>
                
                <button type="button" style="width: 100%; border: none; background: #1a1a1a; color: #fff; cursor: pointer; text-align: center; font-size: 14px; font-weight: 600; padding: 16px; letter-spacing: 1.5px; transition: background 0.2s;" onmouseover="this.style.background='#333'" onmouseout="this.style.background='#1a1a1a'">BUY NOW</button>
            </form>

            <a href="#" style="color: #111; text-decoration: underline; font-size: 12px; font-weight: 600; text-underline-offset: 4px; letter-spacing: 1px; text-transform: uppercase;">CHAT WITH STYLIST</a>
        </div>

    </div>

    @if($relatedProducts->count() > 0)
    <section class="related-products reveal-up" style="margin-top: 80px; padding-top: 60px; border-top: 1px solid #eee;">
        <h2 style="font-family: var(--font-heading); font-size: 32px; font-weight: 400; color: #111; margin-bottom: 40px; text-align: center;">You May Also Like</h2>
        <div class="product-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">
            @foreach($relatedProducts as $related)
                <x-product-card :product="$related" />
            @endforeach
        </div>
    </section>
    @endif
</main>

<style>
/* Zoom Container Styling */
.zoom-container {
    overflow: hidden;
    cursor: zoom-in;
    position: relative;
    width: 100%;
}
.zoom-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.1s ease-out; /* Smooth but fast tracking */
    transform-origin: center center;
}

/* Thumbnail Styling */
.thumbnail {
    border: 2px solid transparent;
    transition: all 0.3s ease;
}
.thumbnail.active {
    border-color: #111;
}
.thumbnail.active img {
    opacity: 1 !important;
}
</style>

<script>
// Image Zoom Logic
function zoomImage(e) {
    const container = e.currentTarget;
    const img = container.querySelector('img');
    const slider = document.getElementById('zoom-slider');
    const zoomLevel = slider ? slider.value : 2.5;
    
    // Calculate mouse position relative to image
    const rect = container.getBoundingClientRect();
    const x = ((e.clientX - rect.left) / rect.width) * 100;
    const y = ((e.clientY - rect.top) / rect.height) * 100;
    
    img.style.transformOrigin = `${x}% ${y}%`;
    img.style.transform = `scale(${zoomLevel})`;
}

function resetZoom() {
    const img = document.querySelector('.zoom-container img');
    if(img) {
        img.style.transformOrigin = 'center center';
        img.style.transform = 'scale(1)';
    }
}

// Image Gallery Swap Logic
function swapImage(element, src) {
    // Swap main image
    const mainImg = document.getElementById('main-product-img');
    if(mainImg) {
        mainImg.src = src;
    }
    
    // Update active thumbnail styling
    document.querySelectorAll('.thumbnail').forEach(el => {
        el.classList.remove('active');
        el.querySelector('img').style.opacity = '0.6';
    });
    
    element.classList.add('active');
    element.querySelector('img').style.opacity = '1';
}
</script>

@endsection
