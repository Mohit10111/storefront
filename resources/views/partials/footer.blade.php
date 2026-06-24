<footer class="luxury-footer-wrapper">
    <!-- NEWSLETTER SECTION -->
    <div class="footer-newsletter">
        <div class="newsletter-content">
            <h2 class="newsletter-title">DISCOVER MORE FROM STOREFRONT</h2>
            <p class="newsletter-subtitle">STAY CLOSE TO STOREFRONT WITH EARLY ACCESS AND SPECIAL INVITATIONS</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Enter your email" required>
                <button type="submit">SUBSCRIBE</button>
            </form>
        </div>
    </div>

    <!-- MAIN FOOTER COLUMNS -->
    <div class="footer-main">
        <div class="footer-columns">
            
            <!-- Column 1: Brand Info -->
            <div class="footer-col brand-col">
                <h3 class="brand-signature">Storefront</h3>
                <p class="brand-desc">
                    "Curating premium fashion and elevated home essentials for the modern lifestyle. Discover unparalleled quality, where everyday elegance meets enduring design."
                </p>
                <div class="social-icons">
                    <a href="#" class="social-icon">
                        <!-- Instagram Icon (Thick Stroke) -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>
                    <a href="#" class="social-icon">
                        <!-- Facebook Icon (Solid Fill) -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="none">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Column 2: Quick Buy -->
            <div class="footer-col links-col">
                <h4 class="col-heading">QUICK BUY</h4>
                <ul class="footer-links">
                    @foreach($globalCategories->take(5) as $cat)
                        <li><a href="{{ route('category.products', $cat) }}">Buy {{ ucfirst(strtolower($cat->name)) }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Column 3: Quick Links -->
            <div class="footer-col links-col">
                <h4 class="col-heading">QUICK LINKS</h4>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Shipping Policy</a></li>
                </ul>
            </div>
            
        </div>

        <!-- GIANT LOGO -->
        <div class="footer-giant-logo">
            STOREFRONT
        </div>

        <!-- COPYRIGHT -->
        <div class="footer-copyright">
            <p>&copy; COPYRIGHT {{ date('Y') }} ALL RIGHTS RESERVED. | CRAFTED BY ANTIGRAVITY</p>
        </div>
    </div>
</footer>
