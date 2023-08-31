<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.product.add-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->product_name = $request->p_name;
        $product->current_price = $request->c_price;
        $product->previous_price = $request->p_price;
        $product->description = $request->p_des;


        $image = $request->file('p_img');

        if($image){

            $customImage = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product/'), $customImage);

        }

        $product->product_image = $customImage;
        $product->save();

        return redirect()->route('product.manage');




    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        $products = Product::all();

        return view('backend.product.manage-product', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $products = Product::find($id);

        return view('backend.product.edit', compact('products'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->product_name = $request->p_name;
        $product->current_price = $request->c_price;
        $product->previous_price = $request->p_price;
        $product->description= $request->p_des;

        $newImage = $request->file('p_img');

        if($newImage){

            $customImageName = uniqid() . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('uploads/product/'), $customImageName);
            @unlink(public_path('uploads/product/' . $product->product_image));

        }

        else{

            $customImageName = $product->product_image;

        }
        
        $product->product_image = $customImageName;
        
        $product->update();
        return redirect()->route('product.manage');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $product = Product::find($id);

        @unlink(public_path('/uploads/product/'. $product->product_image ));

        $product->delete();
        return redirect()->route('product.manage');


    }

    // product active to inactive

    public function atoi($id){

        $product = Product::find($id);

        $product->status = 0;

        $product->update();

        return redirect()->route('product.manage');

    }

    // product inactive to active

    public function itoa($id){

        $product = Product::find($id);

        $product->status = 1;
        $product->update();

        return redirect()->route('product.manage');

    }
}
