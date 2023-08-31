@extends('backend.master')

@section('main-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="{{ Route('dashboard') }}">Dashboard</a></li>
    </ol>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 offset-3">

            <form action="{{ Route('product.update', $products->id ) }}" method="post" enctype="multipart/form-data" class="shadow p-5 my-3">
                
                @csrf

                <h2 class="text-center text-primary">Edit Product</h2>
                <div class="form-group mb-3">
                    <label for="p_name">Product Name</label>
                    <input type="text" name="p_name" id="p_name" value="{{ $products->product_name }}" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="p_img">Product Image</label>
                    <input type="file" name="p_img" id="p_img" class="form-control">
                    <br>
                    <img src="{{ asset('uploads/product/' . $products->product_image ) }}" alt="" height="100px" width="80px">
                </div>

                <div class="form-group mb-3">
                    <label for="c_price">Current Price</label>
                    <input type="text" name="c_price" id="c_price" value="{{ $products->current_price }}" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="p_price">Previous Price</label>
                    <input type="text" name="p_price" id="p_price" value="{{ $products->previous_price }}" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="p_des">Description</label>
                    <textarea name="p_des" id="p_des" cols="30" rows="10" value="{{ $products->description }}" class="form-control">{{ $products->description }}</textarea>
                </div>

                <div class="form-group">
                     <input type="submit" value="Add Product" class="btn btn-primary w-100">
                </div>

            </form>

        </div>
    </div>  
</div>
@endsection

 