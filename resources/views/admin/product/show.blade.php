@extends('adminlte::page')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif

    @if (session()->has('updated'))
        <div class="alert alert-success">
            {{ session()->get('updated') }}
        </div>
    @endif
    <a href="{{ route('products.create') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i>
    </a>

    <table class="table">
        <thead>
            <th>id</th>
            <th>Product title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Image</th>
            <th>price</th>
            <th>Discount</th>
            <th>Price After Discount</th>
            <th>Product Code</th>
            <th>Category name</th>
            <th>Delete</th>
            <th>Update</th>
        </thead>
        <tbody>
            <tr>

                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->author }}</td>
                    <td>{{ $product->description }}</td>
                    <td><img width="100px" src="
                        {{-- file exist --}}
                        @php
                        $imagePath = asset('assets/images/products/' . $product->image);
                        @endphp
                         {{-- @dd(!file_exists(public_path($imagePath))) --}}
                            {{-- @dd(empty($doctorData->image)) --}}
                        @if (!file_exists(public_path($imagePath)) && !empty($product->image))
                        {{ $imagePath }}
                        @else
                        {{ asset('assets/images/products/defaultProduct.png') }}
                        @endif
                        " alt=""></td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount }}</td>
                    <td>{{ $product->price_after_discount}}</td>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->category?->title }}</td>
                    <td class="d-flex">
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="delete-product btn btn-danger" type="submit"><i
                                    class="fas fa-minus-circle"></i></button>
                        </form>

                    </td>
                    <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning"><i
                                class="fas fa-edit"></i></a></td>
                    {{-- <td><a href="{{ route('products.show', $product->id) }}" class="btn btn-primary"><i
                                class="fas fa-clipboard-list"></i></a></td> --}}
            </tr>


        </tbody>
    </table>



@section('js')
    <script>
        document.querySelectorAll('.delete-product').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const Action = confirm('are you sure you want to delete');
                if (!Action) e.preventDefault();
            })
        })
    </script>
@endsection

@endsection
