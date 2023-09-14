@extends('adminlte::page')
@section('content')
    <form action="{{ route('tags.update', $tag) }}" method="POST">
        @method('PUT')
        @csrf
        @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="title" class="form-label">Tag Title:</label>
            <input type="text" value="{{ $tag->title }}" class="form-control w-50" name="title"
                id="title">
        </div>
        <input type="submit" class="btn btn-primary" value="Update" />
    </form>
@endsection
