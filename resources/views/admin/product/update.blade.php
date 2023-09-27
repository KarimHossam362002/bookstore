@extends('adminlte::page')
@section('content')
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        {{--  --}}
        @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="title" class="form-label">Product Title:</label>
            <input type="text" value="{{ $product->title }}" class="form-control w-50" name="title" id="title">
        </div>
        @error('description')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="description" class="form-label">Product description:</label>
            <input type="text" value="{{ $product->description }}" class="form-control w-50" name="description"
                id="description">
        </div>
        {{--  --}}
        @error('author')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="author" class="form-label">Author:</label>
            <input type="text" value="{{ $product->author }}" class="form-control w-50" name="author" id="author">
        </div>
        {{--  --}}
        @error('pages_num')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="pages_num" class="form-label">Pages number:</label>
            <input type="number" value="{{ $product->pages_num }}" class="form-control w-50" name="pages_num"
                id="pages_num">
        </div>
        {{--  --}}
        @error('price')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="price" class="form-label">Product Price:</label>
            <input type="number" value="{{ $product->price }}" class="form-control w-50" name="price" id="price">
        </div>
        {{--  --}}
        @error('discount')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="discount" class="form-label">Product discount:</label>
            <input type="number" value="{{ $product->discount }}" class="form-control w-50" name="discount"
                id="discount">
            {{-- <span id="warning" style="color: red;">ادخل سعر المنتج اولا</span> --}}
        </div>
        {{--  --}}
        @error('price_after_discount')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="price_after_discount" class="form-label">Price after discount:</label>
            <input type="number" class="form-control w-50" name="price_after_discount" id="price_after_discount" readonly>
        </div>
        {{--  --}}
        @error('quantity')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="quantity" class="form-label">Product quantity:</label>
            <input type="number" value="{{ $product->quantity }}" class="form-control w-50" name="quantity"
                id="quantity">
        </div>
        {{--  --}}
        <label for="exampleInputFile">Product Image</label>
        @error('image')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div class="input-group w-50">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Upload</label>
            </div>
        </div>
        {{--  --}}
        @error('product_code')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="product_code" class="form-label">Product code:</label>
            <input type="number" value="{{ $product->product_code }}" class="form-control w-50" name="product_code"
                id="product_code">
        </div>
        @error('available')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="available" class="form-label">Available:</label>
            <br>
            <select class="custom-select w-50" aria-label="Default select example" name="available" id="available">
                <option value="1">متوفر بالمخزون</option>
                <option value="0">غير متوفر بالمخزون</option>
            </select>
        </div>
        <select class="custom-select w-50" aria-label="Default select example" name="category_id">
            @foreach ($categories as $category)
                <option @if (old('category_id') == $category->id) selected @endif value="{{ $category->id }}">
                    {{ $category->title }}
                </option>
            @endforeach
        </select>
        <input type="submit" class="btn btn-primary" value="Update" />
    </form>
@endsection

@section('js')
    c
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#price, #discount').on('input', function() {
                // Get the values of the input fields
                var num1 = parseFloat($('#price').val()) || 0;
                var num2 = parseFloat($('#discount').val()) || 0;
                if (num1 === 0 && num2 > 0) {
                    // Display the warning message
                    $('#warning').show();
                } else {
                    // Hide the warning message and calculate the sum
                    $('#warning').hide();
                    var result = (num1 * num2) / 100;
                    $('#price_after_discount').val(result);
                }
            });
        });
    </script>
@endsection
