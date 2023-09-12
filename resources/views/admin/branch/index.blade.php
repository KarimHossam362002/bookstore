@extends('adminlte::page')
@section('content')

@if (session()->has('success'))
<div class="alert alert-success">{{ session()->get('success') }}</div>
@endif
    <a href="{{ route('branches.create') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i>
    </a>

    <table class="table">
        <thead>
            <th>id</th>
            <th>City</th>
            <th>Street</th>
            <th>Phone</th>
            <th>Delete</th>
            <th>Update</th>
        </thead>
        <tbody>
            <tr>
            @foreach ($branches as $branch )
                <td>{{ $branch->id }}</td>
                <td>{{ $branch->city }}</td>
                <td>{{ $branch->street }}</td>
                <td>{{ $branch->phone }}</td>
                <td class="d-flex">
                    <form action="{{ route('branches.destroy' , $branch->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="delete-branch btn btn-danger" type="submit"><i class="fas fa-minus-circle"></i></button>
                    </form>
                    {{-- <a href="{{ route('branches.show',$branch->id) }}" class="btn btn-primary">Show</a> --}}
                </td>
               <td><a href="{{ route('branches.edit',$branch->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="row">
        <div class="col-12 mt-5">
            @if ($branches->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                    <li class="page-item {{ $branches->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $branches->previousPageUrl() }}" aria-label="Previous">
                        <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                        <span class="sr-only"> {{ ('lang.Previous') }} </span>
                        </a>
                    </li>
                    @foreach ( $branches->getUrlRange(1, $branches->lastPage()) as $pageLink)
                    @php
                        //fuck you php iam mohamed seabeai
                        $pageString = strstr($pageLink, 'page=' , false);
                        $rev = strrev($pageString);
                        $pageNum = strstr($rev, '=' , true);
                        $pageNum = strrev($pageNum);
                    @endphp
                        <li class="page-item {{ substr($pageLink, -1) == $branches->currentPage() ? 'active': '' }}">
                            <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                            </a>
                        </li>
                    @endforeach
                    <li class="page-item {{  $branches->currentPage() == $branches->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $branches->nextPageUrl() }}" aria-label="Next">
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
        document.querySelectorAll('.delete-branch').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const Action = confirm('are you sure you want to delete');
                if (!Action) e.preventDefault();
            })
        })
    </script>
@endsection

@endsection

{{-- <td class="d-flex"> --}}
