@extends('adminlte::page')
@section('content')
    <form action="{{ route('products.update', $product) }}" method="POST">
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
            <input type="text" value="{{ $product->title }}" class="form-control w-50" name="title"
                id="title">
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
            <input type="text" value="{{ $product->author }}" class="form-control w-50" name="author"
                id="author">
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
            <input type="number" value="{{ $product->price }}" class="form-control w-50" name="price"
                id="price">
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
        <input type="submit" class="btn btn-primary" value="Update" />
    </form>
@endsection
