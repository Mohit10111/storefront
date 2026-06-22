<div class="card">

    @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}"
             alt="{{ $product->name }}">
    @endif

    <h3>{{ $product->name }}</h3>

    <p class="price">
        ₹{{ number_format($product->price) }}
    </p>

    <p class="category">
        {{ $product->category->name ?? 'No Category' }}
    </p>

</div>