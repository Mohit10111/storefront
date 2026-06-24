@extends('layouts.storefront')

@section('title', 'Add Product')

@section('content')

<div class="container">

    <h1>Add Product</h1>

    <form action="{{ route('products.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <!-- STEP 1 -->
         @if ($errors->any())

    <div style="color:red;">

        @foreach ($errors->all() as $error)

            <p>{{ $error }}</p>

        @endforeach

    </div>

@endif

        <div id="step1">

            <h3>Step 1 - Category</h3>

            <select name="category_id" id="category_id">

                @foreach($categories as $category)

                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>

            <br><br>

            <button type="button" onclick="nextStep(1)">
                Next
            </button>

        </div>

        <!-- STEP 2 -->

        <div id="step2" style="display:none;">

            <h3>Step 2 - Product Name</h3>

            <input type="text"
                   name="name"
                   id="name">

            <br><br>

            <button type="button" onclick="prevStep(2)">
                Back
            </button>

            <button type="button" onclick="nextStep(2)">
                Next
            </button>

        </div>

        <!-- STEP 3 -->

        <div id="step3" style="display:none;">

            <h3>Step 3 - Price</h3>

            <input type="number"
                   name="price"
                   id="price">

            <br><br>

            <button type="button" onclick="prevStep(3)">
                Back
            </button>

            <button type="button" onclick="nextStep(3)">
                Next
            </button>

        </div>

        <!-- STEP 4 -->

        <div id="step4" style="display:none;">

            <h3>Step 4 - Quantity</h3>

            <input type="number"
                   name="quantity"
                   id="quantity">

            <br><br>

            <button type="button" onclick="prevStep(4)">
                Back
            </button>

            <button type="button" onclick="nextStep(4)">
                Next
            </button>

        </div>

        <!-- STEP 5 -->

        <div id="step5" style="display:none;">

            <h3>Step 5 - Status</h3>

            <select name="status" id="status">

                <option value="active">
                    Active
                </option>

                <option value="inactive">
                    Inactive
                </option>

            </select>

            <br><br>

            <button type="button" onclick="prevStep(5)">
                Back
            </button>

            <button type="button" onclick="nextStep(5)">
                Next
            </button>

        </div>

        <!-- STEP 6 -->

        <div id="step6" style="display:none;">

            <h3>Step 6 - Product Image</h3>

            <input type="file" name="image">

            <br><br>

            <button type="button" onclick="prevStep(6)">
                Back
            </button>

            <button type="button" onclick="nextStep(6)">
                Next
            </button>

        </div>

        <!-- STEP 7 -->

        <div id="step7" style="display:none;">

            <h3>Review & Save</h3>

            <button type="button" onclick="prevStep(7)">
                Back
            </button>

            <button type="submit">
                Save Product
            </button>

        </div>

    </form>

</div>

<script>

function nextStep(step)
{
    if(step === 2)
    {
        let name = document.getElementById('name').value;

        if(name.trim() === '')
        {
            alert('Enter product name');
            return;
        }
    }

    if(step === 3)
    {
        let price = document.getElementById('price').value;

        if(price === '')
        {
            alert('Enter price');
            return;
        }
    }

    if(step === 4)
    {
        let quantity = document.getElementById('quantity').value;

        if(quantity === '')
        {
            alert('Enter quantity');
            return;
        }
    }

    document.getElementById('step' + step).style.display = 'none';
    document.getElementById('step' + (step + 1)).style.display = 'block';
}

function prevStep(step)
{
    document.getElementById('step' + step).style.display = 'none';
    document.getElementById('step' + (step - 1)).style.display = 'block';
}

</script>

@endsection
