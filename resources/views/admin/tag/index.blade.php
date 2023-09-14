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
    <a href="{{ route('tags.create') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i>
    </a>

    <table class="table">
        <thead>
            <th>id</th>
            <th>Tag title</th>
            <th>Delete</th>
            <th>Update</th>
        </thead>
        <tbody>
            <tr>
                @foreach ($tags as $tag)
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->title }}</td>
                    <td class="d-flex">
                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="delete-tag btn btn-danger" type="submit"><i
                                    class="fas fa-minus-circle"></i></button>
                        </form>

                    </td>
                    <td><a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning"><i
                                class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="row">
        <div class="col-12 mt-5">
            @if ($tags->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item {{ $tags->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $tags->previousPageUrl() }}" aria-label="Previous">
                                <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                <span class="sr-only"> {{ 'lang.Previous' }} </span>
                            </a>
                        </li>
                        @foreach ($tags->getUrlRange(1, $tags->lastPage()) as $pageLink)
                            @php
                                //fuck you php iam mohamed seabeai
                                $pageString = strstr($pageLink, 'page=', false);
                                $rev = strrev($pageString);
                                $pageNum = strstr($rev, '=', true);
                                $pageNum = strrev($pageNum);
                            @endphp
                            <li class="page-item {{ substr($pageLink, -1) == $tags->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                </a>
                            </li>
                        @endforeach
                        <li class="page-item {{ $tags->currentPage() == $tags->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $tags->nextPageUrl() }}" aria-label="Next">
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
        document.querySelectorAll('.delete-tag').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const Action = confirm('are you sure you want to delete');
                if (!Action) e.preventDefault();
            })
        })
    </script>
@endsection

@endsection

{{-- <td class="d-flex"> --}}
