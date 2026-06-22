<header id="main-header">
    <div class="container">

        <div class="logo">
            <h2 class="logo-text">STOREFRONT</h2>
        </div>

        <nav>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('categories.index') }}">Categories</a>
            <a href="{{ route('products.index') }}">Products</a>
        </nav>

        <form action="{{ route('products.index') }}"
      method="GET"
      class="header-search">

    <span class="search-icon">🔍</span>

    <input type="text"
           name="search"
           placeholder="Search For Products..."
           value="{{ request('search') }}">

    </form>

        <div class="actions">
            <button id="sidebar-btn">☰</button>
            <button id="cart-btn">🛒</button>
        </div>

    </div>
    <div id="search-panel" class="search-panel">

    <div class="search-panel-header">
        <h2>SEARCH OUR STORE</h2>
        <button id="close-search">✕</button>
    </div>

    <input
        type="text"
        placeholder="Search for products..."
        class="search-panel-input">

</div>
</header>