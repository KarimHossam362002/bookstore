@extends('adminlte::page')
@section('content')
@if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
    <form action="{{ route('branches.store') }}" method="post">
        @method('POST')
        @csrf
        @error('city')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="city" class="form-label">City:</label>
            <input type="text"  class="form-control w-50" name="city" id="city">
        </div>
        @error('street')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="street" class="form-label">Street:</label>
            <input type="text" class="form-control w-50" name="street"  id="street">
        </div>
        @error('phone')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" class="form-control w-50"  name="phone" id="phone">
        </div>

        <input type="submit" class="btn btn-primary" value="Create" />
    </form>
@endsection



