<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::all();
        if ($product){
            return new ProductResource($product);
        }
        return response()->json([
            'error' => 'there is no Product '
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'cat_id' => 'required',
            'title' => 'required',
            'descreption' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
          $product = Product::create([
               'cat_id' => $request->input('cat_id'),
               'title' => $request->input('title'),
               'descreption' => $request->input('descreption'),
                'image' => $request->image->store('images'),
                'quantity' => $request->input('quantity'),
                'price' => $request->input('price'),
          ]);

          if ($product){
              return new ProductResource($product);
          }
          return  response()->json([
               "error" => 403
          ]);
    }


    public function show(Product $product)
    {
        //
    }



    public function edit($id)
    {
        //
    }


    public function update(Request $request,  $id)
    {
        $product = Product::findOrfail($id);

                 $product->cat_id =$request->input('cat_id');
                 $product->title= $request->input('title');
                 $product->descreption = $request->input('descreption');
                 $product->image = $request->image->store('images');
                 $product->quantity = $request->input('quantity');
                 $product->price = $request->input('price');

                 if ($product){
                     $product->save();
                     return new ProductResource($product);
                 }
                return response()->json([
                 "error" => 403
                ]);
    }


    public function destroy($id)
    {
        $product = Product::findorfail($id);
        $productImage = $product->image;
        if ($productImage) {
            Storage::delete($productImage);
            $product->destroy($id);
        }
    }
}
