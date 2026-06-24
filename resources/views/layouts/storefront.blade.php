<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Storefront')</title>

    <!-- Premium Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">

    <!-- Asset compilation triggered for cart logic -->
    @vite(['resources/css/storefront.css', 'resources/js/storefront.js'])
</head>

<body class="{{ request()->routeIs('home') ? 'home-page' : '' }}">

    @include('partials.header')

    @include('partials.sidebar')

    @include('partials.mini-cart')
    @include('partials.search-overlay')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Floating WhatsApp Widget -->
    <div class="whatsapp-widget">
        <div class="whatsapp-bubble">
            Need Help? Chat with us
        </div>
        <a href="https://wa.me/1234567890" target="_blank" class="whatsapp-icon-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c-.003 1.398.366 2.76 1.053 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
            </svg>
        </a>
    </div>

    <script>
        window.addEventListener('scroll', function () {

            const header = document.getElementById('main-header');

            if (header) {
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            }
        });
    </script>

    <script>
        // Set CSRF token for fetch requests
        const getCsrfToken = () => {
            const tokenInput = document.querySelector('input[name="_token"]');
            return tokenInput ? tokenInput.value : '';
        };

        window.updateCartItem = async function(productId, action) {
            const formData = new FormData();
            formData.append('_token', getCsrfToken());
            formData.append('action', action);

            try {
                const response = await fetch(`/cart/update/${productId}`, {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });

                if (response.ok) {
                    const data = await response.json();
                    
                    // Update badges
                    document.querySelectorAll('.myntra-actions .cart-count').forEach(b => {
                        b.textContent = data.count > 0 ? data.count : '';
                    });

                    // Update subtotal
                    const subtotalEl = document.querySelector('.cart-subtotal span:last-child');
                    if (subtotalEl) subtotalEl.textContent = '₹' + data.subtotal;

                    // Update quantity or remove row
                    let itemExists = false;
                    data.items.forEach(item => {
                        if (item.id === productId) {
                            itemExists = true;
                            const qtySpans = document.querySelectorAll(`#qty-val-${productId}`);
                            qtySpans.forEach(span => span.textContent = item.quantity);
                        }
                    });

                    // If it was removed by decreasing to 0, reload
                    if (!itemExists) {
                        window.location.reload();
                    }
                }
            } catch (err) {
                console.error(err);
            }
        };

        window.removeCartItem = async function(productId) {
            const formData = new FormData();
            formData.append('_token', getCsrfToken());

            try {
                const response = await fetch(`/cart/remove/${productId}`, {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });

                if (response.ok) {
                    window.location.reload();
                }
            } catch (err) {
                console.error(err);
            }
        };
    </script>
</body>
</html>
