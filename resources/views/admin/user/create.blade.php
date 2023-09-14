@extends('adminlte::page')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @method('POST')
        @csrf
        @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control w-50" name="name" id="name">
        </div>
        @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control w-50" name="email" id="email">
        </div>
        @error('password')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control w-50" name="password" id="password">
        </div>

        @error('type')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        <div>
            <label for="type" class="form-label">Type:</label>
            <br>
            <select class="custom-select w-50" aria-label="Default select example" name="type" id="type">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
        <label for="exampleInputFile">Image</label>
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
        <input type="submit" class="btn btn-primary" value="Create" />
    </form>
@endsection
