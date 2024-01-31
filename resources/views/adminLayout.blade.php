<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=JetBrains Mono' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>

<nav>
    <a href="/"><i class="fa fa-home"> H O M E</i></a>
    <form action="{{ route('admin.search') }}" method="GET" class="search-form">
        <label>
            <input type="text" name="query" placeholder="Search by ID/Name/Producer...">
        </label>
        <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
    </form>
</nav>

<div id="sidebar">
    <a href="{{ route('admin.showCreateForm') }}" class="sidebar-button">Create</a>
    <a href="{{ route('admin.showEditForm', ['id' => 1]) }}" class="sidebar-button hidden">Edit</a>
    <a href="{{ route('admin.showRemoveForm', ['id' => 1]) }}" class="sidebar-button hidden">Remove</a>
    <a href="{{ route('admin.showDeleteForm', ['id' => 1]) }}" class="sidebar-button hidden">Delete</a>

    @if(isset($product))
        <a href="{{ route('admin.showEditForm', ['id' => $product->id]) }}" class="sidebar-button">Edit</a>
        <a href="{{ route('admin.showRemoveForm', ['id' => $product->id]) }}" class="sidebar-button">Remove</a>
        <a href="{{ route('admin.showDeleteForm', ['id' => $product->id]) }}" class="sidebar-button">Delete</a>
    @endif
</div>

<div class="container">
    @section('content')
    @show
</div>

<style>
    body {
        font-family: 'JetBrains Mono',serif;
        margin: 0;
        padding: 0;
    }

    .fa {
        margin-left: 15px;
    }

    .container {
        margin-left: 170px;
        margin-right: 20px;
        padding-top: 70px;
    }

    nav {
        background-color: #333;
        overflow: hidden;
        position: fixed;
        width: 100%;
        height: 50px;
    }

    nav a {
        float: left;
        display: block;
        color: white;
        font-weight: bolder;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .search-form {
        float: left;
        margin-left: 10px;
    }

    .search-form input {
        padding: 10px;
        width: 300px;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid lightgrey;
        text-align: left;
        padding: 8px;
    }

    th {
        color: green;
        text-transform: uppercase;

    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    #sidebar {
        margin-top: 50px;
        height: 100%;
        width: 12%;
        position: fixed;
        background-color: #333;
        color: white;
    }

    #content {
        margin-left: 200px;
        padding: 16px;
    }

    .sidebar-button {
        display: block;
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        margin-bottom: 10px;
        cursor: pointer;
    }

    .search-form {
        padding: 5px 0;
        margin-right: 30px;
        float: right;
    }

    .search-btn {
        padding: 10px 12px 10px 0;
    }

    .sort-bar {
        display: flex;
        justify-content: center;
        background-color: cornflowerblue;
        overflow: hidden;
    }

    .sort-bar a {
        color: white;
        font-weight: bolder;
        text-align: center;
        text-decoration: none;
        padding: 5px 15px 5px 5px;
        margin: 0 10px;
        background: dodgerblue;
    }

    .sort-bar i {
        padding: 0 10px;
        font-size: 20px;
        color: black;
    }

    .spacer {
        height: 50px;
    }

    .page {
        display: flex;
        margin-left: 25%;
        list-style-type: none;
    }

    .page-item {
        border: 1px solid grey;
        background: lightgrey;
        padding: 10px;
        font-weight: bolder;
    }

    .page a {
        text-decoration: none;
    }

    .delete-form {
        max-width: 400px;
        margin: 50px auto;
        text-align: center;
    }

    .delete-form label {
        display: block;
        margin-bottom: 10px;
        font: 2em bolder;
    }

    .delete-form input {
        width: 100%;
        height: 30px;
        box-sizing: border-box;
        margin-bottom: 10px;
    }

    .delete-form button {
        width: 30%;
        height: 40px;
        box-sizing: border-box;
    }

    .hidden {
        display: none;
    }
</style>

<script>
    function validateForm() {
        let name = document.getElementById('name').value;
        let price = document.getElementById('price').value;
        let height = document.getElementById('height').value;
        let length = document.getElementById('length_col').value;
        let width = document.getElementById('width').value;
        let producer = document.getElementById('producer').value;
        let quantity = document.getElementById('quantity').value;
        let status = document.getElementById('status').value;

        let nameRegex = /^[0-9a-zA-Z\s-.,]+$/;

        if (!nameRegex.test(name)) {
            alert('Name must be a string without special characters');
            return false;
        }

        if (!nameRegex.test(producer)) {
            alert('Producer must be a string without special characters');
            return false;
        }

        if (isNaN(price) || price < 0) {
            alert('Price must be a non-negative number');
            return false;
        }

        if (isNaN(height) || height < 0 || isNaN(length) || length < 0 || isNaN(width) || width < 0) {
            alert('Size must be numbers greater than 0');
            return false;
        }

        if (isNaN(quantity) || quantity < 0) {
            alert('Quantity must be numbers greater than 0');
            return false;
        }

        if (isNaN(status) || (status !== '0' && status !== '1')) {
            alert('Status must be either 0 or 1');
            return false;
        }

        return true;
    }
</script>

</body>
</html>
