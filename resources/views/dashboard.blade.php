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
                <label for="nameInput" class="form-label">Product Name</label>
                <input name="name" id="nameInput" type="text" class="form-control" placeholder="Name" value="{{ request()->get('name', '') }}">
            </div>
            <div class="col-sm-3">
                <label for="categorySelect" class="form-label">Category</label>
                <select name="category" id="categorySelect" class="form-select">
                    <option value="">All</option>
                    <option value="MockUp" {{ request()->get('category') == 'MockUp' ? 'selected' : '' }}>MockUp</option>
                    <option value="Apps" {{ request()->get('category') == 'Apps' ? 'selected' : '' }}>Apps</option>
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
            <th>URL</th>
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
                <form id="deleteForm{{ $product->id }}" action="{{ route('destroy', $product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('show', $product->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('edit', $product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $product->id }}')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center">
        @if ($products->onFirstPage())
            <span class="btn btn-secondary disabled">Previous</span>
        @else
            <a href="{{ $products->previousPageUrl() }}" class="btn btn-primary">Previous</a>
        @endif

        @if ($products->hasMorePages())
            <a href="{{ $products->nextPageUrl() }}" class="btn btn-primary">Next</a>
        @else
            <span class="btn btn-secondary disabled">Next</span>
        @endif
    </div>
</div>

<script>
    function confirmDelete(productId) {
        if (confirm("Are you sure you want to delete this product?")) {
            document.getElementById('deleteForm' + productId).submit();
        }
    }

    function refreshPage() {
        window.location.href = "{{ url('/dashboard') }}";
    }
</script>
@endsection
