@extends('backend.master')

@section('main-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">All Products</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="{{ Route('dashboard') }}">Dashboard</a></li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
             <a href="{{ Route('product.add') }}" class="btn btn-primary btn-small">Add Product</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" >
                <thead>
                    <tr>
                        <th>#Sl</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Curr_Price</th>
                        <th>Prev_Price</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#Sl</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Current Price</th>
                        <th>Prevoius Price</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>

                    @php

                        $x = 1;

                    @endphp

                    @if(count($products) > 0)

                        @foreach($products as $product)
                            <tr>

                                <td>{{ $x++ }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/product/' . $product->product_image  ) }}" alt="" width="100px" height="80px">
                                </td>
                                <td>{{ $product->current_price }}</td>
                                <td>{{ $product->previous_price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>

                                    @if($product->status == 1)

                                        <a href="{{ Route('atoi', $product->id ) }}" class="btn btn-success"> <i class="fa-solid fa-user-check"></i></a>

                                    @else

                                        <a href="{{ Route('itoa', $product->id ) }}" class="btn btn-danger"><i class="fa-solid fa-user-xmark"></i></a>

                                    @endif

                                </td>
                                <td>
                                    <a href="{{ Route('product.edit', $product->id ) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ Route('product.delete', $product->id ) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>

                        @endforeach

                    @else

                        <tr>
                            <td class="text-danger text-center">Data Not Found</td>
                        </tr>

                    @endif

                    
                     
                </tbody>
            </table>
        </div>
    </div>
</div>
</main>
<footer class="py-4 bg-light mt-auto">
<div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted">Copyright &copy; Utsora {{ date('Y') }}</div>
        <div>
            <a href="#">Privacy Policy</a>
            &middot;
            <a href="#">Terms &amp; Conditions</a>
        </div>
    </div>
</div>
</footer>
</div>
</div>
</div>
@endsection