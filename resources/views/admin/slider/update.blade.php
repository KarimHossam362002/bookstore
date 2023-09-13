@extends('adminlte::page')
@section('content')
    {{-- @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif --}}
    <form action="{{ route('sliders.update', $slider->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
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
        @error('status')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="status" class="form-label">Status:</label>
            <br>
            <select class="custom-select w-50" aria-label="Default select example" name="status" id="status">
                <option value="0">غير معروض</option>
                <option value="1">معروض</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Update" />
    </form>
@endsection
