@extends('adminlte::page')
@section('content')
@if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
    <form action="{{ route('informations.store') }}" method="POST">
        @method('POST')
        @csrf
        @error('email')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="email" class="form-label">Email:</label>
            <input type="text"  class="form-control w-50" name="email" id="email">
        </div>
        @error('phone')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" class="form-control w-50" name="phone"  id="phone">
        </div>
        @error('technical_support_address')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="technical_support_address" class="form-label">Technical Support Address:</label>
            <input type="text" class="form-control w-50"  name="technical_support_address" id="technical_support_address">
        </div>
        @error('ongoing_support_address')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div>
            <label for="ongoing_support_address" class="form-label">On Going Support Address:</label>
            <input type="text" class="form-control w-50"  name="ongoing_support_address" id="ongoing_support_address">
        </div>

        <input type="submit" class="btn btn-primary" value="Create" />
    </form>
@endsection



