@extends('adminlte::page')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Subject</th>
            <th>Delete</th>

        </thead>
        <tbody>
            <tr>
                @foreach ($contact_messages as $contact_message)
                    <td>{{ $contact_message->id }}</td>
                    <td>{{ $contact_message->name }}</td>
                    <td>{{ $contact_message->email }}</td>
                    <td>{{ $contact_message->phone }}</td>
                    <td>{{ $contact_message->subject }}</td>
                    <td class="d-flex">
                        <form action="{{ route('contactmessage.delete', $contact_message->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="delete-message btn btn-danger" type="submit"><i
                                    class="fas fa-minus-circle"></i></button>
                        </form>

                    </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="row">
        <div class="col-12 mt-5">
            @if ($contact_messages->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item {{ $contact_messages->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $contact_messages->previousPageUrl() }}" aria-label="Previous">
                                <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                <span class="sr-only"> {{ 'lang.Previous' }} </span>
                            </a>
                        </li>
                        @foreach ($contact_messages->getUrlRange(1, $contact_messages->lastPage()) as $pageLink)
                            @php
                                //fuck you php iam mohamed seabeai
                                $pageString = strstr($pageLink, 'page=', false);
                                $rev = strrev($pageString);
                                $pageNum = strstr($rev, '=', true);
                                $pageNum = strrev($pageNum);
                            @endphp
                            <li
                                class="page-item {{ substr($pageLink, -1) == $contact_messages->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                </a>
                            </li>
                        @endforeach
                        <li
                            class="page-item {{ $contact_messages->currentPage() == $contact_messages->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $contact_messages->nextPageUrl() }}" aria-label="Next">
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
        document.querySelectorAll('.delete-message').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const Action = confirm('are you sure you want to delete');
                if (!Action) e.preventDefault();
            })
        })
    </script>
@endsection

@endsection

{{-- <td class="d-flex"> --}}
