@extends('layouts.storefront')

@section('title', 'Edit Coupon')

@section('content')

<div class="container" style="margin-top:120px;">

    <h1>Edit Coupon</h1>
    <br>

    <form action="{{ route('coupons.update', $coupon->id) }}" method="POST" style="max-width: 600px;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:5px;">Title (Internal use)</label>
            <input type="text" name="title" value="{{ $coupon->title }}" required style="width:100%; padding:10px; border:1px solid #ccc;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:5px;">Coupon Code (Optional)</label>
            <input type="text" name="code" value="{{ $coupon->code }}" style="width:100%; padding:10px; border:1px solid #ccc;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:5px;">Discount Text (e.g., "FLAT ₹300 OFF")</label>
            <input type="text" name="discount_text" value="{{ $coupon->discount_text }}" required style="width:100%; padding:10px; border:1px solid #ccc;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:flex; align-items:center; gap: 10px;">
                <input type="checkbox" name="is_active" value="1" {{ $coupon->is_active ? 'checked' : '' }}>
                Active (Display on Homepage)
            </label>
        </div>

        <button type="submit" class="hero-btn">Update</button>
        <a href="{{ route('coupons.index') }}" style="margin-left: 15px;">Cancel</a>
    </form>

</div>

@endsection
