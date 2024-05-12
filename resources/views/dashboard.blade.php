@extends('layouts.app')

<title>Dashboard CMS PI-DEV </title>
<link rel="icon" href="{{ asset('images/piarea.png') }}" type="image/x-icon">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ADMIN</h2>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
                <a class="btn btn-success" href="{{ url('create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    <form action="dashboard" method="get" id="filterForm">


        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="" class="form-label">Product Name</label>
                <input name="name" id="nameInput" type="text" class="form-control" placeholder="Name" value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}">
            </div>
            <div class="col-sm-3">
                <label for="" class="form-label">Category</label>
                <select name="category" id="categorySelect" class="form-select">
                    <option value="">MockUp & Apps (default)</option>
                    <option value="MockUp" {{ isset($_GET['category']) && $_GET['category'] == 'MockUp' ? 'selected' : '' }}>MockUp</option>
                    <option value="Apps" {{ isset($_GET['category']) && $_GET['category'] == 'Apps' ? 'selected' : '' }}>Apps</option>
                </select>
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-primary mt-4">Filter</button>
                <button type="button" class="btn btn-warning mt-4" onclick="refreshPage()">Refresh</button>
            </div>

        </div>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Products</th>
            <th>Description</th>
            <th>Category</th>
            <th>url</th>
            <th>Product Published Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/images/{{ $product->image }}" width="100px"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>{{ $product->category }}</td>
            <td><a href="{{ $product->url }}">{{ $product->url }}</a></td>
            <td>{{ $product->date }}</td>
            <td>
                <form id="deleteForm{{ $product->id }}" action="{{ route('destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('show',$product->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('edit',$product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <!-- Menggunakan JavaScript untuk menampilkan konfirmasi sebelum penghapusan -->
                    <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $product->id }}')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
</div>

<!-- JavaScript untuk menampilkan konfirmasi sebelum penghapusan -->
<script>
    function confirmDelete(productId) {
        var confirmation = confirm("Are you sure you want to delete this product?");
        if (confirmation) {
            document.getElementById('deleteForm' + productId).submit();
        }
    }
</script>

<script>
    function refreshPage() {
        var currentUrl = window.location.href; // Mendapatkan URL saat ini
        var baseUrl = window.location.origin; // Mendapatkan base URL tanpa path

        // Mengganti path dari currentUrl dengan "/dashboard"
        var newUrl = baseUrl + "/dashboard";

        // Mengarahkan ke halaman dashboard awal
        window.location.href = newUrl;
    }
</script>




@endsection
