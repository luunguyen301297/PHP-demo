@extends('adminLayout')
@section('title', 'Edit Product')

@section('content')
    <h1>Edit Product Form</h1>
    <form action="{{ route('admin.update', ['id' => $product->id]) }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <table>
            <tr>
                <th><label for="name">Name</label></th>
                <td><input type="text" name="name" value="{{ $product->name }}" id="name" required></td>
            </tr>
            <tr>
                <th><label for="price">Price</label></th>
                <td><input type="text" name="price" value="{{ $product->price }}" id="price" required></td>
            </tr>
            <tr>
                <th><label for="height">Height</label></th>
                <td><input type="text" name="height" value="{{ $product->height }}" id="height" required></td>
            </tr>
            <tr>
                <th><label for="length_col">Length</label></th>
                <td><input type="text" name="length_col" value="{{ $product->length_col }}" id="length_col" required></td>
            </tr>
            <tr>
                <th><label for="width">Width</label></th>
                <td><input type="text" name="width" value="{{ $product->width }}" id="width" required></td>
            </tr>
            <tr>
                <th><label for="base_unit">Base Unit</label></th>
                <td><input type="text" name="base_unit" value="{{ $product->base_unit }}" id="base_unit" required></td>
            </tr>
            <tr>
                <th><label for="producer">Producer</label></th>
                <td><input type="text" name="producer" value="{{ $product->producer }}" id="producer" required></td>
            </tr>
            <tr>
                <th><label for="quantity">Quantity</label></th>
                <td><input type="text" name="quantity" value="{{ $product->quantity }}" id="quantity" required></td>
            </tr>
            <tr>
                <th><label for="status">Status</label></th>
                <td><input type="text" name="status" value="{{ $product->status }}" id="status" required></td>
            </tr>
            <tr>
                <th><label for="updated_by">Updated By</label></th>
                <td><input type="text" name="updated_by" value="{{ $product->updated_by }}" id="updated_by" required></td>
            </tr>
        </table>
        <button style="margin: 20px 0; padding: 10px" type="submit">Update Product</button>
    </form>
@endsection
