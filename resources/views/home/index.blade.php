@extends('layouts.storefront')

@section('title', 'Home')

@section('content')

<div class="hero-carousel-container">
    <div class="hero-carousel">
        <section class="hero slide" style="background-image:url('{{ asset('image/hero.avif') }}')">
            <h1>STOREFRONT</h1>
            <p>Curated Collection For Modern Living</p>
            <a href="{{ route('home.products') }}" class="hero-btn">SHOP NOW</a>
        </section>

        <section class="hero slide" style="background-image:url('{{ asset('image/hero_banner_2.png') }}')">
            <h1>LUXURY LEATHER</h1>
            <p>Elevate your everyday style</p>
            <a href="{{ route('home.products') }}" class="hero-btn">EXPLORE</a>
        </section>

        <section class="hero slide" style="background-image:url('{{ asset('image/hero_banner_3.png') }}')">
            <h1>TIMELESS ELEGANCE</h1>
            <p>Discover our exclusive watch collection</p>
            <a href="{{ route('home.products') }}" class="hero-btn">DISCOVER</a>
        </section>
    </div>

    <!-- Carousel Controls -->
    <button class="carousel-control prev" onclick="moveSlide(-1)">&#10094;</button>
    <button class="carousel-control next" onclick="moveSlide(1)">&#10095;</button>

    <!-- Carousel Indicators -->
    <div class="carousel-indicators">
        <span class="dot active" onclick="currentSlide(0)"></span>
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
    </div>
</div>

<script>
    let slideIndex = 0;
    const slides = document.querySelectorAll('.hero.slide');
    const dots = document.querySelectorAll('.carousel-indicators .dot');
    let slideInterval;

    function showSlide(n) {
        if (n >= slides.length) slideIndex = 0;
        if (n < 0) slideIndex = slides.length - 1;
        
        document.querySelector('.hero-carousel').style.transform = `translateX(-${slideIndex * 100}%)`;
        
        dots.forEach(dot => dot.classList.remove('active'));
        dots[slideIndex].classList.add('active');
    }

    function moveSlide(n) {
        slideIndex += n;
        showSlide(slideIndex);
        resetInterval();
    }

    function currentSlide(n) {
        slideIndex = n;
        showSlide(slideIndex);
        resetInterval();
    }

    function autoPlay() {
        slideIndex++;
        showSlide(slideIndex);
    }

    function resetInterval() {
        clearInterval(slideInterval);
        slideInterval = setInterval(autoPlay, 5000);
    }

    // Start autoplay
    slideInterval = setInterval(autoPlay, 5000);
</script>

@if($activeCoupons->count() > 0)
<section class="coupon-banner-section reveal-up">
    <div class="coupon-container">
        @foreach($activeCoupons as $coupon)
            <div class="coupon-banner">
                <div class="coupon-content">
                    <span class="coupon-discount">{{ $coupon->discount_text }}</span>
                    @if($coupon->code)
                        <span class="coupon-code">USE CODE: {{ $coupon->code }}</span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif

<section class="categories reveal-up" style="padding: 100px 60px 80px; max-width: 1400px; margin: 0 auto;">

    <h2 class="reveal-up" style="text-transform: uppercase; letter-spacing: 3px; font-size: 24px; color: #282c3f; margin-bottom: 40px; text-align: left;">SHOP BY CATEGORY</h2>

    <div class="category-grid reveal-up">

        @forelse($categories as $category)

            @include('components.category-card', [
                'category' => $category
            ])

        @empty

            <p>No categories found.</p>

        @endforelse

    </div>

</section>

<section class="mid-banner reveal-up" style="background-image:url('{{ asset('image/hero_banner_3.png') }}')">
    <div class="mid-banner-overlay"></div>
    <div class="mid-banner-content">
        <h2>THE EXCLUSIVE COLLECTION</h2>
        <p>Immerse yourself in our latest curation of premium designs.</p>
        <a href="{{ route('home.products') }}" class="mid-banner-btn">EXPLORE NOW</a>
    </div>
</section>

<section class="products" style="padding: 60px 60px 40px; max-width: 1400px; margin: 0 auto;">
    <h2 class="reveal-up" style="text-transform: uppercase; letter-spacing: 3px; font-size: 20px; color: #111; margin-bottom: 25px; text-align: left;">LATEST ARRIVALS</h2>

    <div class="product-grid">
        @forelse($products as $product)
            @include('components.product-card', ['product' => $product])
        @empty
            <p>No products available yet.</p>
        @endforelse
    </div>
    
    <div style="text-align: center; margin-top: 50px;">
        <a href="{{ route('home.products') }}" class="premium-continue-btn">VIEW ALL PRODUCTS</a>
    </div>
</section>

@endsection
