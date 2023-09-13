@extends('adminlte::page')
@section('content')

@if (session()->has('success'))
<div class="alert alert-success">{{ session()->get('success') }}</div>
@endif
@if (session()->has('updated'))
<div class="alert alert-success">{{ session()->get('updated') }}</div>
@endif
    <a href="{{ route('sliders.create') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i>
    </a>

    <table class="table">
        <thead>
            <th>id</th>
            <th>Image</th>
            <th>Status</th>

        </thead>
        <tbody>
            <tr>
            @foreach ($sliders as $slider )
                <td>{{ $slider->id }}</td>
                <td><img src="
                    {{-- file exist --}}
                    @php
                    $imagePath = asset('assets/images/sliders/'.$slider->image);
                    @endphp
                     {{-- @dd(!file_exists(public_path($imagePath))) --}}
                        {{-- @dd(empty($doctor->image)) --}}
                    @if (!file_exists(public_path($imagePath)) && !empty($slider->image))
                    {{ $imagePath }}
                    @else
                    {{ asset('assets/images/sliders/defaultSlider.png') }}
                    @endif
                    " width="100" height="100" style="border-radius: 10px"></td>
                <td>{{ $slider->status == 1 ? "معروض":  "غير معروض" }}</td>

                <td class="d-flex">
                    <form action="{{ route('sliders.destroy' , $slider->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="delete-slider btn btn-danger" type="submit"><i class="fas fa-minus-circle"></i></button>
                    </form>
                    {{-- <a href="{{ route('banneres.show',$banner->id) }}" class="btn btn-primary">Show</a> --}}
                </td>
               <td><a href="{{ route('sliders.edit',$slider->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="row">
        <div class="col-12 mt-5">
            @if ($sliders->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                    <li class="page-item {{ $sliders->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $sliders->previousPageUrl() }}" aria-label="Previous">
                        <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                        <span class="sr-only"> {{ ('lang.Previous') }} </span>
                        </a>
                    </li>
                    @foreach ( $sliders->getUrlRange(1, $sliders->lastPage()) as $pageLink)
                    @php
                        //fuck you php iam mohamed seabeai
                        $pageString = strstr($pageLink, 'page=' , false);
                        $rev = strrev($pageString);
                        $pageNum = strstr($rev, '=' , true);
                        $pageNum = strrev($pageNum);
                    @endphp
                        <li class="page-item {{ substr($pageLink, -1) == $sliders->currentPage() ? 'active': '' }}">
                            <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                            </a>
                        </li>
                    @endforeach
                    <li class="page-item {{  $sliders->currentPage() == $sliders->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $sliders->nextPageUrl() }}" aria-label="Next">
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
        document.querySelectorAll('.delete-slider').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const Action = confirm('are you sure you want to delete');
                if (!Action) e.preventDefault();
            })
        })
    </script>
@endsection

@endsection

{{-- <td class="d-flex"> --}}
