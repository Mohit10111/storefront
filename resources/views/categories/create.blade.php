@extends('layouts.storefront')

@section('title', 'Add Category')

@section('content')

<div class="container">

    <h1>Add Category</h1>

    <form action="{{ route('categories.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div id="step1">

            <h3>Step 1</h3>

            <label>Category Name</label>

            <input type="text"
                   id="category_name"
                   name="name">

            <br><br>

            <button type="button"
                    onclick="nextStep()">
                Next
            </button>

        </div>

        <div id="step2" style="display:none;">

            <h3>Step 2</h3>

            <label>Category Image</label>

            <input type="file"
                   name="image">

            <br><br>

            <button type="button"
                    onclick="prevStep()">
                Back
            </button>

            <button type="submit">
                Save Category
            </button>

        </div>

    </form>

</div>

<script>

function nextStep()
{
    let name = document.getElementById('category_name').value;

    if(name.trim() === '')
    {
        alert('Please enter category name');
        return;
    }

    document.getElementById('step1').style.display = 'none';
    document.getElementById('step2').style.display = 'block';
}

function prevStep()
{
    document.getElementById('step2').style.display = 'none';
    document.getElementById('step1').style.display = 'block';
}

</script>

@endsection
