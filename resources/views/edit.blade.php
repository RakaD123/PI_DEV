@extends('layouts.app')

<title>Update Product</title>
<link rel="icon" href="{{ asset('images/piarea.png') }}" type="image/x-icon">

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">

        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('dashboard') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('update',$product->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    @csrf
    @method('PUT')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-auto">
                <div class="card-header">
                    <strong>Edit Product </strong>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <strong>Product Name:</strong>
                        <input type="text" name="name" value="{{$product->name}}"  class="form-control" placeholder="Name" id="productName">
                    </div>
                    <div class="form-group mb-3">
                        <strong>Description:</strong>
                        <textarea class="form-control" style="height:150px" name="detail" value="{{$product->detail}}" placeholder="Detail" id="productDetail">{{$product->detail}}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <strong>URL:</strong>
                        <input type="text" name="url" class="form-control" value="{{$product->url}}" placeholder="URL" pattern="https?://.+">
                    </div>
                    <div class="form-group mb-3">
                        <strong>Product Published date:</strong>
                        <input type="date" name="date" class="form-control" value="{{$product->date}}" placeholder="Product Published date">
                    </div>
                    <div class="form-group mb-3">
                        <strong>Category:</strong>
                        <select name="category" class="form-control">
                            <option value="MockUp">MockUp</option>
                            <option value="Apps">Apps</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <strong>Image:</strong>
                        <input type="file" name="image" class="form-control" placeholder="image" id="productImage" value="/images/{{ $product->image }}">
                        <img src="/images/{{ $product->image }}" width="300px">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                            <button type="submit" class="btn btn-success">Update</button>



                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</form>

<script>
    function validateForm() {
        var productName = document.getElementById('productName').value;
        var productDetail = document.getElementById('productDetail').value;

        // Menampilkan konfirmasi sebelum update
        var confirmation = confirm("Are you sure you want to update?");
        return confirmation; // Mengembalikan true jika pengguna menekan OK, dan false jika pengguna menekan Cancel
    }
</script>


@endsection
