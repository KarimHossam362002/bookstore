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
    <a href="{{ route('informations.create') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i>
    </a>

    <table class="table">
        <thead>
            <th>id</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Tech Support address</th>
            <th>on going address</th>
            <th>Delete</th>
            <th>Update</th>
        </thead>
        <tbody>
            <tr>
            @foreach ($info_contacts as $information )
                <td>{{ $information->id }}</td>
                <td>{{ $information->email }}</td>
                <td>{{ $information->phone }}</td>
                <td>{{ $information->technical_support_address }}</td>
                <td>{{ $information->ongoing_support_address }}</td>
                <td class="d-flex">
                    <form action="{{ route('informations.destroy' , $information->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="delete-info btn btn-danger" type="submit"><i class="fas fa-minus-circle"></i></button>
                    </form>
                    {{-- <a href="{{ route('branches.show',$branch->id) }}" class="btn btn-primary">Show</a> --}}
                </td>
               <td><a href="{{ route('informations.edit',$information) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="row">
        <div class="col-12 mt-5">
            @if ($info_contacts->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                    <li class="page-item {{ $info_contacts->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $info_contacts->previousPageUrl() }}" aria-label="Previous">
                        <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                        <span class="sr-only"> {{ ('lang.Previous') }} </span>
                        </a>
                    </li>
                    @foreach ( $info_contacts->getUrlRange(1, $info_contacts->lastPage()) as $pageLink)
                    @php
                        //fuck you php iam mohamed seabeai
                        $pageString = strstr($pageLink, 'page=' , false);
                        $rev = strrev($pageString);
                        $pageNum = strstr($rev, '=' , true);
                        $pageNum = strrev($pageNum);
                    @endphp
                        <li class="page-item {{ substr($pageLink, -1) == $info_contacts->currentPage() ? 'active': '' }}">
                            <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                            </a>
                        </li>
                    @endforeach
                    <li class="page-item {{  $info_contacts->currentPage() == $info_contacts->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $info_contacts->nextPageUrl() }}" aria-label="Next">
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
        document.querySelectorAll('.delete-info').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const Action = confirm('are you sure you want to delete');
                if (!Action) e.preventDefault();
            })
        })
    </script>
@endsection

@endsection

{{-- <td class="d-flex"> --}}
