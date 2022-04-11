<?php

namespace App\Http\Controllers\Products;

use App\Models\products_model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class products_controller extends Controller
{
    public function get_products()
    {
        $products = products_model::all();
        return response()->json($products,200);
    }

    public function add_product(Request $request)
    {
        $product = new products_model();

        $product->product_title = $request->product_title;
        $product->product_size = $request->product_size;
        $product->product_price = $request->product_price;
        $product->product_desc = $request->product_desc;

        if($product->save())
        {
            return response()->json(['msg'=>'Save Successfully'],200);
        }

    }

    public function edit_product(Request $request)
    {
        products_model::find($request->product_id)->update([

                'product_title'=>$request->product_title,
                'product_size'=>$request->product_size,
                'product_price'=>$request->product_price,
                'product_desc'=>$request->product_desc,

            ]);
            return response()->json(['msg'=>'Edit Successfully'],200);
    }

    public function delete_product(Request $request)
    {
        products_model::find($request->product_id)->delete();
        return response()->json(['msg'=>'Delete Successfully'],200);
    }
}
