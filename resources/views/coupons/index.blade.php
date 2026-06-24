@extends('layouts.storefront')

@section('title', 'Coupons')

@section('content')

<div class="container" style="margin-top:120px;">

    <h1>Manage Coupons</h1>
    <br>

    <a href="{{ route('coupons.create') }}" class="hero-btn">
        Add Coupon
    </a>

    <br><br><br>

    <div class="category-grid">
        @forelse($coupons as $coupon)
            <div class="card" style="padding: 20px;">
                <h3>{{ $coupon->title }}</h3>
                <p><strong>Code:</strong> {{ $coupon->code ?: 'N/A' }}</p>
                <p><strong>Discount:</strong> {{ $coupon->discount_text }}</p>
                <p><strong>Status:</strong> {{ $coupon->is_active ? 'Active' : 'Inactive' }}</p>

                <div style="margin-top: 15px;">
                    <a href="{{ route('coupons.edit', $coupon->id) }}">Edit</a>
                    &nbsp;&nbsp;
                    <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red; border: none; background: none; cursor: pointer;">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p>No coupons found.</p>
        @endforelse
    </div>
</div>

@endsection
