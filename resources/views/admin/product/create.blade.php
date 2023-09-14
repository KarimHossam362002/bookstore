@extends('adminlte::page')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="title" class="form-label">Product Title:</label>
            <input type="text" value="{{ old('title') }}" class="form-control w-50" name="title" id="title">
        </div>
        @error('description')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="description" class="form-label">Product description:</label>
            <input type="text" value="{{ old('description') }}" class="form-control w-50" name="description" id="description">
        </div>
        {{--  --}}
        @error('author')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="author" class="form-label">Author:</label>
            <input type="text" value="{{ old('author') }}" class="form-control w-50" name="author" id="author">
        </div>
        {{--  --}}
        @error('pages_num')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="pages_num" class="form-label">Pages number:</label>
            <input type="number" value="{{ old('pages_num') }}" class="form-control w-50" name="pages_num" id="pages_num">
        </div>
        {{--  --}}
        @error('price')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="price" class="form-label">Product Price:</label>
            <input type="number" value="{{ old('price') }}" class="form-control w-50" name="price" id="price">
        </div>
        {{--  --}}
        @error('discount')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="discount" class="form-label">Product discount:</label>
            <input type="number"  class="form-control w-50" name="discount" id="discount">
        </div>
        {{--  --}}
        @error('quantity')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="quantity" class="form-label">Product quantity:</label>
            <input type="number" value="{{ old('quantity') }}" class="form-control w-50" name="quantity" id="quantity">
        </div>
        {{--  --}}
        @error('product_code')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="product_code" class="form-label">Product code:</label>
            <input type="number" value="{{ old('product_code') }}" class="form-control w-50" name="product_code" id="product_code">
        </div>


        <input type="submit" class="btn btn-primary" value="Create" />
    </form>
@endsection
