@extends('adminLayout')
@section('title', 'Remove Product')

@section('content')
    <form class="delete-form" action="{{ route('admin.remove', ['id' => $product->id]) }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <label for="confirmed_id">Enter Product ID to Remove:</label>
        <input id="confirmed_id" name="confirmed_id" required>
        <button type="submit">Confirm Remove</button>
    </form>
@endsection
