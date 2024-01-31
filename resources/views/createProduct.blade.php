@extends('adminLayout')
@section('title', 'Create Product')

@section('content')
    <h1>Create Product Form</h1>
    <form action="{{ route('admin.store') }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <table>
            <tr>
                <th><label for="name">Name</label></th>
                <td><input type="text" name="name" id="name" required></td>
            </tr>
            <tr>
                <th><label for="price">Price</label></th>
                <td><input type="text" name="price" id="price" required></td>
            </tr>
            <tr>
                <th><label for="height">Height</label></th>
                <td><input type="text" name="height" id="height" required></td>
            </tr>
            <tr>
                <th><label for="length_col">Length</label></th>
                <td><input type="text" name="length_col" id="length_col" required></td>
            </tr>
            <tr>
                <th><label for="width">Width</label></th>
                <td><input type="text" name="width" id="width" required></td>
            </tr>
            <tr>
                <th><label for="base_unit">Base Unit</label></th>
                <td><input type="text" name="base_unit" id="base_unit" required></td>
            </tr>
            <tr>
                <th><label for="producer">Producer</label></th>
                <td><input type="text" name="producer" id="producer" required></td>
            </tr>
            <tr>
                <th><label for="quantity">Quantity</label></th>
                <td><input type="text" name="quantity" id="quantity" required></td>
            </tr>
            <tr>
                <th><label for="inserted_by">Inserted By</label></th>
                <td><input type="text" name="inserted_by" id="inserted_by" required></td>
            </tr>
        </table>
        <button style="margin: 20px 0; padding: 10px" type="submit">Create Product</button>
    </form>
@endsection

<style>
    .hidden {
        display: block !important;
    }
</style>
