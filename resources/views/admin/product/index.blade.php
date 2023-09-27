
{{-- <td class="d-flex"> --}}
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
                <th>Pages number</th>
                <th>price</th>
                <th>Quantity</th>
                <th>Available</th>
                <th>Delete</th>
                <th>Update</th>
                <th>Show</th>
            </thead>
            <tbody>
                <tr>
                    @foreach ($products as $product)
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->author }}</td>
                        <td>{{ $product->pages_num }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->available == 1 ? "متوفر بالمخزون ":"غير متوفر بالمخزون" }}</td>
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
                        <td><a href="{{ route('products.show', $product->id) }}" class="btn btn-primary"><i
                                    class="fas fa-clipboard-list"></i></a></td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <div class="row">
            <div class="col-12 mt-5">
                @if ($products->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ $products->currentPage() == 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                    <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                    <span class="sr-only"> {{ 'lang.Previous' }} </span>
                                </a>
                            </li>
                            @foreach ($products->getUrlRange(1, $products->lastPage()) as $pageLink)
                                @php
                                    //fuck you php iam mohamed seabeai
                                    $pageString = strstr($pageLink, 'page=', false);
                                    $rev = strrev($pageString);
                                    $pageNum = strstr($rev, '=', true);
                                    $pageNum = strrev($pageNum);
                                @endphp
                                <li class="page-item {{ substr($pageLink, -1) == $products->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                    </a>
                                </li>
                            @endforeach
                            <li class="page-item {{ $products->currentPage() == $products->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
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
            document.querySelectorAll('.delete-product').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    const Action = confirm('are you sure you want to delete');
                    if (!Action) e.preventDefault();
                })
            })
        </script>
    @endsection

    @endsection

    {{-- <td class="d-flex"> --}}
