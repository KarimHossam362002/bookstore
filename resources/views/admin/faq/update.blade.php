@extends('adminlte::page')
@section('content')
    <form action="{{ route('faqs.update', $faq) }}" method="POST">
        @method('PUT')
        @csrf
        @error('question')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="question" class="form-label">Question:</label>
            <input type="text" value="{{ $faq->question }}" class="form-control w-50" name="question"
                id="question">
        </div>
        @error('answer')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <div>
            <label for="answer" class="form-label">Answer:</label>
            <input type="text" value="{{ $faq->answer }}" class="form-control w-50" name="answer"
                id="answer">
        </div>
        <select class="custom-select w-50" aria-label="Default select example" name="product_id">
            @foreach ($products as $product)
                <option @if ( $faq->product->id == $product->id) selected @endif value="{{ $product->id }}">{{ $product->title }}
                </option>
            @endforeach
        </select>
        <input type="submit" class="btn btn-primary" value="Update" />
    </form>
@endsection
