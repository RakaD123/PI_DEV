@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">

        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('dashboard') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <div id="error-message" class="alert alert-danger" style="display: none;"></div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" id="productForm">
    @csrf

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-auto">
                <div class="card-header">
                    <strong>Add Product </strong>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <strong>Product Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name" id="productName">
                    </div>
                    <div class="form-group mb-3">
                        <strong>Description:</strong>
                        <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail" id="productDetail"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <strong>URL:</strong>
                        <input type="text" name="url" class="form-control" placeholder="URL" pattern="https?://.+">
                    </div>
                    <div class="form-group mb-3">
                        <strong>Product Published date:</strong>
                        <input type="date" name="date" class="form-control" placeholder="Product Published date">
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
                        <input type="file" name="image" class="form-control" placeholder="image">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                            <button type="submit" class="btn btn-success" onclick="return validateForm()">Submit</button>
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
        var regex = /^[a-zA-Z0-9\s.,;:?!\"\'()\[\]\{\}\-–\/\.\.\.—~%\$<>^*&#+=]+$/;



        // Menampilkan konfirmasi sebelum submit
        var confirmation = confirm("Are you sure you want to submit?");
        return confirmation; // Mengembalikan true jika pengguna menekan OK, dan false jika pengguna menekan Cancel
    }
</script>



@endsection
