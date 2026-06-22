<a href="{{ route('category.products', $category) }}"
   style="text-decoration:none; color:inherit;">

    <div class="card">

        @if($category->image)

            <img src="{{ asset('storage/' . $category->image) }}"
                 style="width:100%; height:180px; object-fit:cover; border-radius:10px;">

        @endif

        <h3>{{ $category->name }}</h3>

    </div>

</a>