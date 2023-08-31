@extends('backend.master')

@section('main-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Add Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="{{ Route('dashboard') }}">Dashboard</a></li>
    </ol>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 offset-3">

            <form action="{{ Route('product.added') }}" method="post" enctype="multipart/form-data" class="shadow p-5 my-3">
                
                @csrf

                <h2 class="text-center text-primary">Add Product</h2>
                <div class="form-group mb-3">
                    <label for="p_name">Product Name</label>
                    <input type="text" name="p_name" id="p_name" placeholder="Enter product name" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="p_img">Product Image</label>
                    <input type="file" name="p_img" id="p_img" placeholder="Enter product name" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="c_price">Current Price</label>
                    <input type="text" name="c_price" id="c_price" placeholder="Enter current price" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="p_price">Previous Price</label>
                    <input type="text" name="p_price" id="p_price" placeholder="Enter previous price" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="p_des">Description</label>
                    <textarea name="p_des" id="p_des" cols="30" rows="10" placeholder="Enter details..." class="form-control"></textarea>
                </div>

                <div class="form-group">
                     <input type="submit" value="Add Product" class="btn btn-primary w-100">
                </div>

            </form>

        </div>
    </div>  
</div>
@endsection