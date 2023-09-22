@extends('adminlte::page')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif

    <table class="table">
        <p>I CANT UNDERSTAND WISHLIST LOGIC IN MANY TO MANY RELATIONSHIP HOW TO CONNECT BETWEEN TABLES AND DISPLAY IT ;-;</p>
        <thead>
            <th>id</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>Delete</th>

        </thead>
        <tbody>
            <tr>
                @foreach ($wishlists as $wishlist)
                    <td>{{ $wishlist->id }}</td>
                    <td>{{ $wishlist->total }}</td>
                    <td>{{ $wishlist->status }}</td>

                    <td class="d-flex">
                        <form action="{{ route('wishlists.delete', $wishlist->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="delete-wishlist btn btn-danger" type="submit"><i
                                    class="fas fa-minus-circle"></i></button>
                        </form>

                    </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="row">
        <div class="col-12 mt-5">
            @if ($wishlists->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item {{ $wishlists->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $wishlists->previousPageUrl() }}" aria-label="Previous">
                                <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                <span class="sr-only"> {{ 'lang.Previous' }} </span>
                            </a>
                        </li>
                        @foreach ($wishlists->getUrlRange(1, $wishlists->lastPage()) as $pageLink)
                            @php
                                //fuck you php iam mohamed seabeai
                                $pageString = strstr($pageLink, 'page=', false);
                                $rev = strrev($pageString);
                                $pageNum = strstr($rev, '=', true);
                                $pageNum = strrev($pageNum);
                            @endphp
                            <li
                                class="page-item {{ substr($pageLink, -1) == $wishlists->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                </a>
                            </li>
                        @endforeach
                        <li
                            class="page-item {{ $wishlists->currentPage() == $wishlists->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $wishlists->nextPageUrl() }}" aria-label="Next">
                                <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                <span class="sr-only"> {{ 'lang.Next' }} </span>
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif

        </div>
    </div>


@section('js')
    <script>
        document.querySelectorAll('.delete-wishlist').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const Action = confirm('are you sure you want to delete');
                if (!Action) e.preventDefault();
            })
        })
    </script>
@endsection

@endsection

{{-- <td class="d-flex"> --}}
