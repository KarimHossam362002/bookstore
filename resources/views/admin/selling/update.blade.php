@extends('adminlte::page')
@section('content')
    <form action="{{ route('sellings.update', $selling) }}" method="POST">
        @method('PUT')
        @csrf
        @error('feature_title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="feature_title" class="form-label">Feature Title:</label>
            <input type="text" value="{{ $selling->feature_title }}" class="form-control w-50" name="feature_title"
                id="feature_title">
        </div>
        @error('feature_description')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="feature_description" class="form-label">Feature Description:</label>
            <input type="text" value="{{ $selling->feature_description }}" class="form-control w-50"
                name="feature_description" id="feature_description">
        </div>
        <input type="submit" class="btn btn-primary" value="Update" />
    </form>
@endsection
