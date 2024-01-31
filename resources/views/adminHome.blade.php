@extends('adminLayout')
@section('title', 'Đây là home page')
@section('content')
    <div class="sort-bar">
        <a href="{{ route('admin.sort', ['field' => 'id', 'page' => $currentPage]) }}">Sort by ID</a>
        <a href="{{ route('admin.sort', ['field' => 'name', 'page' => $currentPage]) }}">Sort by Name</a>
        <a href="{{ route('admin.sort', ['field' => 'price', 'page' => $currentPage]) }}">Sort by Price</a>
    </div>

    <div class="spacer"></div>

    <h1>Product List</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Height</th>
            <th>Length</th>
            <th>Width</th>
            <th>Producer</th>
            <th>Quantity</th>
            <th>Edit</th>
        </tr>
        @foreach ($productList as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->height }}</td>
                <td>{{ $product->length_col }}</td>
                <td>{{ $product->width }}</td>
                <td>{{ $product->producer }}</td>
                <td>{{ $product->quantity }}</td>
                <td><a href="{{ route('admin.showEditForm', ['id' => $product->id]) }}"><i class="fa-solid fa-pen-to-square"></i>Edit</a></td>
            </tr>
        @endforeach
    </table>

    <div class="spacer"></div>

    <div>
        <ul class="page">
            <li class="page-item">
                <a class="page-link" href="{{ $productList->previousPageUrl() }}">Previous</a>
            </li>

            @php
                $startPage = max(1, $currentPage - 2);
                $endPage = min($totalPages ?? 1, $startPage + 4);
            @endphp

            @if ($startPage > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $productList->url(1) }}">1</a>
                </li>
                <li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>
            @endif

            @for ($i = $startPage; $i <= $endPage; $i++)
                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                    <a class="page-link" href="{{ $productList->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($endPage < ($totalPages ?? 1))
                <li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{{ $productList->url($totalPages) }}">{{ $totalPages }}</a>
                </li>
            @endif

            <li class="page-item">
                <a class="page-link" href="{{ $productList->nextPageUrl() }}">Next</a>
            </li>
        </ul>
    </div>

    <div class="spacer"></div>
@endsection
