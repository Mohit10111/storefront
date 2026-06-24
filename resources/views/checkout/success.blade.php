@extends('layouts.storefront')

@section('title', 'Order Success | Storefront')

@section('content')
<div style="max-width: 600px; margin: 80px auto; text-align: center; padding: 40px; border: 1px solid #eee; background: #fafafa;">
    <div style="width: 80px; height: 80px; border-radius: 50%; background: #e8f5e9; color: #4caf50; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px auto;">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 40px; height: 40px;">
            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
        </svg>
    </div>
    
    <h1 style="font-family: var(--font-heading); font-size: 32px; font-weight: 400; margin-bottom: 15px; color: #111;">Thank you for your order!</h1>
    
    <p style="font-size: 16px; color: #666; margin-bottom: 30px; line-height: 1.6;">
        Your order <strong>#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</strong> has been successfully placed.<br>
        We'll send you an email confirmation with tracking details shortly.
    </p>

    <div style="text-align: left; background: #fff; padding: 25px; border: 1px solid #eee; margin-bottom: 30px;">
        <h3 style="margin-top: 0; font-size: 16px; font-weight: 600; border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 15px;">Order Summary</h3>
        <p style="margin: 0 0 10px 0; font-size: 14px; color: #555;"><strong>Name:</strong> {{ $order->name }}</p>
        <p style="margin: 0 0 10px 0; font-size: 14px; color: #555;"><strong>Shipping to:</strong> {{ $order->address }}, {{ $order->city }} {{ $order->zip }}</p>
        <p style="margin: 0 0 10px 0; font-size: 14px; color: #555;"><strong>Total Paid:</strong> ₹{{ number_format($order->total_amount, 2) }}</p>
    </div>

    <a href="{{ route('home') }}" style="display: inline-block; padding: 14px 30px; background: #111; color: #fff; text-decoration: none; font-size: 14px; font-weight: 600; letter-spacing: 1.5px; transition: background 0.3s;" onmouseover="this.style.background='#333'" onmouseout="this.style.background='#111'">
        CONTINUE SHOPPING
    </a>
</div>
@endsection
