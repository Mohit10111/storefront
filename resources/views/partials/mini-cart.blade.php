<div id="cart-overlay" class="cart-overlay"></div>

<div id="mini-cart" class="mini-cart">
    <div class="mini-cart-header">
        <div class="mini-cart-title-area">
            <h2>Shopping Cart</h2>
            <p>FLAT ₹300 OFF ON FIRST PURCHASE</p>
        </div>
        <button id="close-cart" class="close-cart-btn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" style="width: 24px; height: 24px;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
        </button>
    </div>

    @if(isset($cartItems) && count($cartItems) > 0)
        <div class="cart-items-container">
            @foreach($cartItems as $item)
                <div class="cart-item">
                    <div class="cart-item-img">
                        @if($item['product']->image)
                            @if(Str::startsWith($item['product']->image, ['http://', 'https://', '/image/']))
                                <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}">
                            @else
                                <img src="{{ asset('storage/' . $item['product']->image) }}" alt="{{ $item['product']->name }}">
                            @endif
                        @else
                            <div class="no-img">No Img</div>
                        @endif
                    </div>
                    <div class="cart-item-details">
                        <h4>{{ $item['product']->name }}</h4>
                        <p class="cart-item-price">₹{{ number_format($item['product']->price, 2) }}</p>
                        <div class="cart-item-actions" style="display: flex; align-items: center; gap: 15px;">
                            <div class="qty-controller">
                                <button type="button" class="qty-btn" onclick="window.updateCartItem({{ $item['product']->id }}, 'decrease')">-</button>
                                <span class="qty-val" id="qty-val-{{ $item['product']->id }}">{{ $item['quantity'] }}</span>
                                <button type="button" class="qty-btn" onclick="window.updateCartItem({{ $item['product']->id }}, 'increase')">+</button>
                            </div>
                            <button type="button" class="remove-item-btn" onclick="window.removeCartItem({{ $item['product']->id }})" style="background: none; border: none; color: #555; text-decoration: underline; cursor: pointer; padding: 0;">Remove</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="cart-footer">
            <div class="cart-subtotal">
                <span>Subtotal</span>
                <span>₹{{ number_format($cartTotal, 2) }}</span>
            </div>
            <p class="cart-tax-note">Shipping & taxes calculated at checkout</p>
            <a href="{{ route('checkout.index') }}" class="premium-continue-btn checkout-btn" style="width: 100%; text-align: center; margin-top: 15px;">CHECKOUT</a>
        </div>
    @else
        <div class="mini-cart-empty-state">
            <div class="premium-icon-wrapper">
                <!-- Delicate, thin-line premium shopping bag SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#111" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round" class="premium-empty-bag-icon">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
            </div>
            <h3 class="premium-empty-title">YOUR CART IS EMPTY</h3>
            <p class="premium-empty-subtext">Discover our latest arrivals and elevate your collection.</p>
            <a href="/" class="premium-continue-btn">CONTINUE SHOPPING</a>
        </div>
    @endif
</div>
