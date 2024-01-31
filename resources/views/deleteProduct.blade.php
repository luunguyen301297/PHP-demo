@extends('adminLayout')
@section('title', 'Delete Product')

@section('content')
    <form class="delete-form" action="{{ route('admin.delete', ['id' => $product->id]) }}" method="post" onsubmit="return validateForm()">
        @csrf
        <label for="confirmed_id">Enter Product ID to delete:</label>
        <input id="confirmed_id" name="confirmed_id" required>
        <button type="submit">Confirm Delete</button>
    </form>
@endsection
