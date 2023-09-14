@extends('adminlte::page')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <form action="{{ route('categories.store') }}" method="POST">
        @method('POST')
        @csrf
        @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="title" class="form-label">Category new Title:</label>
            <input type="text" class="form-control w-50" name="title" id="title">
        </div>


        <input type="submit" class="btn btn-primary" value="Create" />
    </form>
@endsection
