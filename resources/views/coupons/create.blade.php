@extends('layouts.storefront')

@section('title', 'Add Coupon')

@section('content')

<div class="container" style="margin-top:120px;">

    <h1>Add Coupon</h1>
    <br>

    <form action="{{ route('coupons.store') }}" method="POST" style="max-width: 600px;">
        @csrf

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:5px;">Title (Internal use)</label>
            <input type="text" name="title" required style="width:100%; padding:10px; border:1px solid #ccc;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:5px;">Coupon Code (Optional)</label>
            <input type="text" name="code" style="width:100%; padding:10px; border:1px solid #ccc;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom:5px;">Discount Text (e.g., "FLAT ₹300 OFF")</label>
            <input type="text" name="discount_text" required style="width:100%; padding:10px; border:1px solid #ccc;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:flex; align-items:center; gap: 10px;">
                <input type="checkbox" name="is_active" value="1" checked>
                Active (Display on Homepage)
            </label>
        </div>

        <button type="submit" class="hero-btn">Save</button>
        <a href="{{ route('coupons.index') }}" style="margin-left: 15px;">Cancel</a>
    </form>

</div>

@endsection
