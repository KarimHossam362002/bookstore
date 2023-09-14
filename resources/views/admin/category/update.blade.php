@extends('adminlte::page')
@section('content')
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @method('PUT')
        @csrf
        @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="title" class="form-label">Category Title:</label>
            <input type="text" value="{{ $category->title }}" class="form-control w-50" name="title"
                id="title">
        </div>
        <input type="submit" class="btn btn-primary" value="Update" />
    </form>
@endsection
