@extends('layouts.storefront')

@section('title', 'Checkout | Storefront')

@section('content')
<div class="checkout-container" style="max-width: 1200px; margin: 50px auto; padding: 0 20px; display: flex; gap: 40px;">
    <!-- Shipping Form -->
    <div class="checkout-form-section" style="flex: 2;">
        <h2 style="font-family: var(--font-heading); font-size: 28px; margin-bottom: 30px; font-weight: 400;">Shipping Details</h2>
        
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; font-size: 13px; font-weight: 500; margin-bottom: 8px;">Full Name</label>
                    <input type="text" name="name" required style="width: 100%; padding: 12px; border: 1px solid #ddd; font-size: 15px; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 13px; font-weight: 500; margin-bottom: 8px;">Email Address</label>
                    <input type="email" name="email" required style="width: 100%; padding: 12px; border: 1px solid #ddd; font-size: 15px; outline: none;">
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 13px; font-weight: 500; margin-bottom: 8px;">Address</label>
                <input type="text" name="address" required style="width: 100%; padding: 12px; border: 1px solid #ddd; font-size: 15px; outline: none;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                <div>
                    <label style="display: block; font-size: 13px; font-weight: 500; margin-bottom: 8px;">City</label>
                    <input type="text" name="city" required style="width: 100%; padding: 12px; border: 1px solid #ddd; font-size: 15px; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 13px; font-weight: 500; margin-bottom: 8px;">ZIP / Postal Code</label>
                    <input type="text" name="zip" required style="width: 100%; padding: 12px; border: 1px solid #ddd; font-size: 15px; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 13px; font-weight: 500; margin-bottom: 8px;">Phone Number</label>
                    <input type="text" name="phone" required style="width: 100%; padding: 12px; border: 1px solid #ddd; font-size: 15px; outline: none;">
                </div>
            </div>

            <h3 style="font-family: var(--font-heading); font-size: 22px; margin-bottom: 20px; font-weight: 400; padding-top: 20px; border-top: 1px solid #eee;">Payment</h3>
            <div style="padding: 20px; border: 1px solid #ddd; background: #fafafa; margin-bottom: 30px;">
                <p style="font-size: 14px; color: #555; margin: 0;"><strong>Cash on Delivery (COD)</strong><br>You will pay when your order arrives.</p>
            </div>

            <button type="submit" style="width: 100%; padding: 16px; background: #111; color: #fff; border: none; font-size: 14px; font-weight: 600; letter-spacing: 1.5px; cursor: pointer; transition: background 0.3s;" onmouseover="this.style.background='#333'" onmouseout="this.style.background='#111'">
                PLACE ORDER
            </button>
        </form>
    </div>

    <!-- Order Summary -->
    <div class="checkout-summary-section" style="flex: 1; background: #fafafa; padding: 30px; border: 1px solid #eee;">
        <h2 style="font-family: var(--font-heading); font-size: 22px; margin-bottom: 25px; font-weight: 400;">Order Summary</h2>
        
        <div class="checkout-items" style="margin-bottom: 20px;">
            @foreach($cartItems as $item)
                <div style="display: flex; gap: 15px; margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #eee;">
                    <div style="width: 60px; height: 80px; background: #fff; overflow: hidden; border: 1px solid #eee; display: flex; align-items: center; justify-content: center;">
                        @if($item['product']->image)
                            @if(Str::startsWith($item['product']->image, ['http://', 'https://', '/image/']))
                                <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <img src="{{ asset('storage/' . $item['product']->image) }}" alt="{{ $item['product']->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @endif
                        @else
                            <span style="font-size: 10px; color: #999;">No Img</span>
                        @endif
                    </div>
                    <div style="flex: 1;">
                        <h4 style="margin: 0 0 5px 0; font-size: 14px; font-weight: 500;">{{ $item['product']->name }}</h4>
                        <p style="margin: 0; font-size: 13px; color: #777;">Qty: {{ $item['quantity'] }}</p>
                    </div>
                    <div>
                        <p style="margin: 0; font-size: 14px; font-weight: 500;">₹{{ number_format($item['product']->price * $item['quantity'], 2) }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 14px; color: #555;">
            <span>Subtotal</span>
            <span>₹{{ number_format($cartTotal, 2) }}</span>
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 14px; color: #555;">
            <span>Shipping</span>
            <span>Free</span>
        </div>
        
        <hr style="border: none; border-top: 1px solid #ddd; margin: 20px 0;">

        <div style="display: flex; justify-content: space-between; font-size: 18px; font-weight: 600;">
            <span>Total</span>
            <span>₹{{ number_format($cartTotal, 2) }}</span>
        </div>
    </div>
</div>
@endsection
