<div id="sidebar" class="sidebar">
    <button id="close-sidebar">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 28px; height: 28px;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
    </button>

    <ul>
        <li>
            <a href="{{ route('home') }}">Home</a>
        </li>

        <li>
            <a href="{{ route('categories.index') }}">Categories</a>
            <ul class="sidebar-sublist" style="list-style: none; margin-top: 10px; margin-left: 15px;">
                @foreach($globalCategories as $cat)
                    <li style="margin-bottom: 10px;">
                        <a href="{{ route('category.products', $cat) }}" style="font-size: 16px; color: var(--text-muted);">{{ $cat->name }}</a>
                    </li>
                @endforeach
            </ul>
        </li>

        <li>
            <a href="{{ route('products.index') }}">Products</a>
            <ul class="sidebar-sublist" style="list-style: none; margin-top: 10px; margin-left: 15px;">
                @foreach($globalProducts as $prod)
                    <li style="margin-bottom: 10px;">
                        <a href="{{ route('products.index') }}" style="font-size: 16px; color: var(--text-muted);">{{ $prod->name }}</a>
                    </li>
                @endforeach
                <li>
                    <a href="{{ route('products.index') }}" style="font-size: 16px; color: var(--accent-color);">View All Products &rarr;</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
