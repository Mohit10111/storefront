/* HEADER SCROLL EFFECT */
window.addEventListener('scroll', function () {

    const header = document.getElementById('main-header');

    if (!header) return;

    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }

});

/* SIDEBAR */

const sidebarBtn = document.getElementById('sidebar-btn');
const closeSidebarBtn = document.getElementById('close-sidebar');
const sidebar = document.getElementById('sidebar');

if (sidebarBtn && closeSidebarBtn && sidebar) {

    sidebarBtn.addEventListener('click', function () {
        sidebar.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    closeSidebarBtn.addEventListener('click', function () {
        sidebar.classList.remove('active');
        document.body.style.overflow = 'auto';
    });

}

/* MINI CART */

const cartBtn = document.getElementById('cart-btn');
const closeCartBtn = document.getElementById('close-cart');
const miniCart = document.getElementById('mini-cart');
const cartOverlay = document.getElementById('cart-overlay');

if (cartBtn && closeCartBtn && miniCart && cartOverlay) {

    cartBtn.addEventListener('click', function () {
        miniCart.classList.add('active');
        cartOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    closeCartBtn.addEventListener('click', function () {
        miniCart.classList.remove('active');
        cartOverlay.classList.remove('active');
        document.body.style.overflow = 'auto';
    });

    cartOverlay.addEventListener('click', function () {
        miniCart.classList.remove('active');
        cartOverlay.classList.remove('active');
        document.body.style.overflow = 'auto';
    });

}

/* SCROLL REVEAL ANIMATION OBSERVER */
document.addEventListener("DOMContentLoaded", () => {
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const revealElements = document.querySelectorAll('.reveal-up');
    revealElements.forEach(el => observer.observe(el));
});

document.addEventListener("DOMContentLoaded", function() {
    const openSearchBtn = document.getElementById("open-search-btn");
    const closeSearchBtn = document.getElementById("close-search-btn");
    const searchOverlay = document.getElementById("search-overlay");
    const searchInput = document.getElementById("search-input");

    if (openSearchBtn && closeSearchBtn && searchOverlay) {
        openSearchBtn.addEventListener("click", function(e) {
            e.preventDefault();
            searchOverlay.classList.add("active");
            document.body.style.overflow = "hidden"; // Prevent scrolling behind
            setTimeout(() => searchInput.focus(), 400); // Focus input after animation
        });

        closeSearchBtn.addEventListener("click", function() {
            searchOverlay.classList.remove("active");
            document.body.style.overflow = "";
        });
    }
});


/* AJAX ADD TO CART */
document.addEventListener('DOMContentLoaded', () => {
    document.body.addEventListener('submit', async (e) => {
        if (e.target.action && e.target.action.includes('/cart/add')) {
            e.preventDefault();
            const form = e.target;
            const btn = form.querySelector('button[type="submit"]');
            
            if (btn) {
                btn.style.opacity = '0.7';
                btn.style.pointerEvents = 'none';
            }

            try {
                const formData = new FormData(form);
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (response.ok) {
                    const html = await response.text();
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    
                    // Update header cart count
                    const newHeaderNav = doc.querySelector('.myntra-actions');
                    const oldHeaderNav = document.querySelector('.myntra-actions');
                    if (newHeaderNav && oldHeaderNav) {
                        oldHeaderNav.innerHTML = newHeaderNav.innerHTML;
                        
                        // Re-bind cart button event listener
                        const newCartBtn = document.getElementById('cart-btn');
                        if(newCartBtn) {
                            newCartBtn.addEventListener('click', function (ev) {
                                ev.preventDefault();
                                document.getElementById('mini-cart').classList.add('active');
                                document.getElementById('cart-overlay').classList.add('active');
                                document.body.style.overflow = 'hidden';
                            });
                        }
                    }
                    
                    // Update mini cart content
                    const newMiniCartContent = doc.querySelector('#mini-cart');
                    const oldMiniCartContent = document.querySelector('#mini-cart');
                    if (newMiniCartContent && oldMiniCartContent) {
                        oldMiniCartContent.innerHTML = newMiniCartContent.innerHTML;
                        
                        // Re-bind close button event listener
                        const newCloseCartBtn = document.getElementById('close-cart');
                        if (newCloseCartBtn) {
                            newCloseCartBtn.addEventListener('click', function () {
                                document.getElementById('mini-cart').classList.remove('active');
                                document.getElementById('cart-overlay').classList.remove('active');
                                document.body.style.overflow = 'auto';
                            });
                        }
                    }

                    // Automatically open sidebar
                    const miniCart = document.getElementById('mini-cart');
                    const cartOverlay = document.getElementById('cart-overlay');
                    if (miniCart && cartOverlay) {
                        miniCart.classList.add('active');
                        cartOverlay.classList.add('active');
                        document.body.style.overflow = 'hidden';
                    }
                }
            } catch (error) {
                console.error('Add to cart failed', error);
            } finally {
                if (btn) {
                    btn.style.opacity = '1';
                    btn.style.pointerEvents = 'auto';
                }
            }
        }
    });
});

