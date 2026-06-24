<a href="{{ route('category.products', $category) }}" class="premium-category-card reveal-up">
    @if($category->image)
        <div class="premium-cat-img">
            @if(Str::startsWith($category->image, ['http://', 'https://', '/image/']))
                <img src="{{ $category->image }}" alt="{{ $category->name }}">
            @else
                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
            @endif
        </div>
    @else
        <div class="premium-cat-img" style="background:#f0f0f0;"></div>
    @endif
    
    <div class="premium-cat-content">
        <h3>{{ $category->name }}</h3>
    </div>
</a>
