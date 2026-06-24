<div id="search-overlay" class="search-overlay">
    <div class="search-overlay-content">
        <div class="search-overlay-header">
            <h2 class="search-title">SEARCH OUR STORE</h2>
            <button id="close-search-btn" class="close-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" style="width: 24px; height: 24px;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
            </button>
        </div>

        <div class="search-bar-wrapper">
            <form action="{{ route('home.products') }}" method="GET" class="search-overlay-form">
                <input type="text" name="search" id="search-input" placeholder="SEARCH FOR NEW ARRIVALS..." autofocus>
                <button type="submit" class="search-submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#000" style="width: 20px; height: 20px;"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
                </button>
            </form>
        </div>

        <div class="search-trending">
            <h3>TRENDING COLLECTIONS</h3>
            <div class="trending-tags">
                @foreach($globalCategories->take(5) as $cat)
                    <a href="{{ route('category.products', $cat) }}" class="trending-tag">{{ $cat->name }}</a>
                @endforeach
            </div>
        </div>

        <div class="search-bestsellers">
            <h3>BEST SELLERS OF THE WEEK</h3>
            <div class="bestsellers-grid">
                @foreach($globalProducts as $product)
                    <a href="{{ route('home.product.show', $product) }}" class="bestseller-card">
                        <div class="bestseller-img">
                            @if(Str::startsWith($product->image, ['http://', 'https://', '/image/']))
                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            @endif
                        </div>
                        <div class="bestseller-info">
                            <span class="bestseller-name">{{ $product->name }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
