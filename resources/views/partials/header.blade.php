<header id="main-header">
    <div class="container myntra-header-container">

        <div class="logo">
            <a href="{{ route('home') }}" class="logo-link">
                <h2 class="logo-text">STOREFRONT</h2>
            </a>
        </div>

        <nav class="main-nav">
            @foreach($globalCategories as $cat)
                <div class="nav-item-wrapper">
                    <a href="{{ route('category.products', $cat) }}" class="nav-link">{{ strtoupper($cat->name) }}</a>
                    @if($cat->children->count() > 0)
                        <div class="nav-dropdown">
                            @foreach($cat->children as $child)
                                <a href="{{ route('category.products', $child) }}" class="dropdown-item">{{ $child->name }}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </nav>

        <!-- This looks like the old search form but clicking it opens the new overlay instead -->
        <div class="header-search-inline" id="open-search-btn" style="cursor: pointer;">
            <span class="search-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#696e79" style="width: 18px; height: 18px;"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
            </span>
            <input type="text" placeholder="Search for products, brands and more" style="pointer-events: none;" readonly>
        </div>

        <div class="actions myntra-actions">
            <!-- Profile -->
            <div class="profile-dropdown-container">
                <button class="action-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" style="width: 22px; height: 22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                    <span>Profile</span>
                </button>
                <div class="profile-dropdown">
                    <div class="dropdown-welcome">
                        <strong>Welcome</strong>
                        <p>To access account and manage orders</p>
                        <a href="{{ route('login') }}" class="btn-login-signup">LOGIN / SIGNUP</a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="dropdown-links">
                        <li><a href="#">Orders</a></li>
                        <li><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
                        <li><a href="#">Gift Cards</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Myntra Insider <span class="badge-new">New</span></a></li>
                    </ul>
                    <div class="dropdown-divider"></div>
                    <ul class="dropdown-links">
                        <li><a href="#">Myntra Credit</a></li>
                        <li><a href="#">Coupons</a></li>
                        <li><a href="#">Saved Cards</a></li>
                        <li><a href="#">Saved VPA</a></li>
                        <li><a href="#">Saved Addresses</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Wishlist -->
            <a href="{{ route('wishlist.index') }}" class="action-btn" style="text-decoration:none;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" style="width: 22px; height: 22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" /></svg>
                <span>Wishlist</span>
            </a>

            <!-- Bag -->
            <button id="cart-btn" class="action-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" style="width: 22px; height: 22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                <span>Bag</span>
            </button>
        </div>

    </div>
</header>
