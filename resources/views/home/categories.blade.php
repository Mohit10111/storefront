@extends('layouts.storefront')

@section('title', 'All Categories | Storefront')

@section('content')

<!-- HEADER OVERRIDE FOR NON-HERO PAGES -->
<style>
    .myntra-header {
        background: #fff !important;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        position: relative;
    }
    .myntra-header .nav-links a, 
    .myntra-header .logo-text, 
    .myntra-header .myntra-actions button,
    .myntra-header .myntra-actions a {
        color: #282c3f !important;
    }
</style>

<div style="padding-top: 100px;"></div>

<div style="max-width: 1400px; margin: 0 auto; padding: 40px 20px;">
    <h1 style="font-size: 28px; font-weight: 700; color: #282c3f; margin-bottom: 30px;">ALL CATEGORIES</h1>

    <div class="category-grid">
        @forelse($categories as $category)
            @include('components.category-card', ['category' => $category])
        @empty
            <p>No categories found.</p>
        @endforelse
    </div>
</div>

@endsection
