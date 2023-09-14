@extends('adminlte::page')
@section('content')
    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="name" class="form-label">Name:</label>
            <input type="text" value="{{ $user->name }}" class="form-control w-50" name="name" id="name">
        </div>
        @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="email" class="form-label">Email:</label>
            <input type="text" value="{{ $user->email }}" class="form-control w-50" name="email" id="email">
        </div>
        @error('password')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="password" class="form-label">Password:</label>
            <input type="text" value="{{ $user->password }}" class="form-control w-50" name="password" id="password">
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
        @error('image')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <label for="exampleInputFile">Image</label>

        <div class="input-group w-50">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Upload</label>
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Update" />
    </form>
@endsection
