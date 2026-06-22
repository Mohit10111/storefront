/* HEADER SCROLL EFFECT */
window.addEventListener('scroll', function () {

    console.log('scrolling...', window.scrollY);

    const header = document.getElementById('main-header');

    if (!header) return;

    if (window.scrollY > 50) {
        header.classList.add('scrolled');
        console.log('added');
    } else {
        header.classList.remove('scrolled');
        console.log('removed');
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
const searchIcon = document.querySelector('.search-icon');
const searchInput = document.querySelector('.header-search input');

const searchPanel = document.getElementById('search-panel');
const closeSearch = document.getElementById('close-search');

if (searchPanel && closeSearch) {

    if (searchIcon) {
        searchIcon.addEventListener('click', () => {
            searchPanel.classList.add('active');
            document.body.classList.add('search-open');
        });
    }

    if (searchInput) {
        searchInput.addEventListener('click', () => {
            searchPanel.classList.add('active');
            document.body.classList.add('search-open');
        });
    }

    closeSearch.addEventListener('click', () => {
        searchPanel.classList.remove('active');
        document.body.classList.remove('search-open');
    });

}