@extends('layouts.app')

@section('title', 'Categories')

@section('content')

<div class="container" style="margin-top:120px;">

    <h1>Categories</h1>

    <br>

    <a href="{{ route('categories.create') }}" class="hero-btn">
        Add Category
    </a>

    <br><br><br>

    <div class="category-grid">

        @forelse($categories as $category)

            <div class="card">

                @if($category->image)

                    <img src="{{ asset('storage/' . $category->image) }}"
                         alt="{{ $category->name }}">

                @endif

                <h3>{{ $category->name }}</h3>

                <div style="padding:0 20px 20px;">

                    <a href="{{ route('categories.edit', $category->id) }}">
                        Edit
                    </a>

                    &nbsp;&nbsp;

                    <form action="{{ route('categories.destroy', $category->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        @empty

            <p>No categories found.</p>

        @endforelse

    </div>

</div>

@endsection