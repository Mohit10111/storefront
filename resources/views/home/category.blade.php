@extends('layouts.storefront')

@section('content')

<section class="products">

    <h2 class="reveal-up">{{ $category->name }}</h2>

    <div class="product-grid reveal-up">

        @forelse($products as $product)

            @include('components.product-card', [
                'product' => $product
            ])

        @empty

            <p>No products found in this category.</p>

        @endforelse

    </div>

</section>

@endsection
