@extends('adminlte::page')
@section('content')

@if (session()->has('success'))
<div class="alert alert-success">{{ session()->get('success') }}</div>
@endif
{{-- @if (session()->has('updated'))
<div class="alert alert-success">{{ session()->get('updated') }}</div>
@endif --}}


    <table class="table">
        <thead>
            <th>id</th>
            {{-- <th>User name</th> --}}
            {{-- <th>Product Title</th> --}}
            <th>Total</th>
            <th>Status</th>

        </thead>
        <tbody>
            <tr>
            @foreach ($carts as $cart )
                <td>{{ $cart->id }}</td>
                <td>{{ $cart->total }}</td>
                {{-- <td>{{ $cart->$user->name }}</td> --}}
                {{-- <td>{{ $cart->$product->title }}</td> --}}
                <td>{{ $cart->status == 1 ? "completed": "pending" }}</td>

                <td class="d-flex">
                    <form action="{{ route('carts.destroy' , $cart->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="delete-cart btn btn-danger" type="submit"><i class="fas fa-minus-circle"></i></button>
                    </form>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="row">
        <div class="col-12 mt-5">
            @if ($carts->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                    <li class="page-item {{ $carts->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $carts->previousPageUrl() }}" aria-label="Previous">
                        <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                        <span class="sr-only"> {{ ('lang.Previous') }} </span>
                        </a>
                    </li>
                    @foreach ( $carts->getUrlRange(1, $carts->lastPage()) as $pageLink)
                    @php
                        //fuck you php iam mohamed seabeai
                        $pageString = strstr($pageLink, 'page=' , false);
                        $rev = strrev($pageString);
                        $pageNum = strstr($rev, '=' , true);
                        $pageNum = strrev($pageNum);
                    @endphp
                        <li class="page-item {{ substr($pageLink, -1) == $carts->currentPage() ? 'active': '' }}">
                            <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                            </a>
                        </li>
                    @endforeach
                    <li class="page-item {{  $carts->currentPage() == $carts->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $carts->nextPageUrl() }}" aria-label="Next">
                        <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                        <span class="sr-only"> {{ ('lang.Next') }} </span>
                    </a>
                    </li>
                    </ul>
                </nav>
            @endif
        </div>
    </div>


@section('js')
    <script>
        document.querySelectorAll('.delete-cart').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const Action = confirm('are you sure you want to delete');
                if (!Action) e.preventDefault();
            })
        })
    </script>
@endsection

@endsection

{{-- <td class="d-flex"> --}}
