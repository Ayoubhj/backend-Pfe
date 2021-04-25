<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\ProductResource;
use App\Product;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('product.index',compact('products','categories'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
          $product = new Product();
              $product->cat_id = $request->input('cat_id');
              $product->title = $request->input('title');
              $product-> descreption = $request->input('descreption');
              if ($request->hasFile('image')) {
              $image = $request->file('image');

              $fileName = $image->getClientOriginalName();
              $destinationPath = base_path() . '/public/images/' ;
              $image->move($destinationPath, $fileName);

              $attributes['image'] = $fileName;
              }
              $product->image = $fileName;
              $product->quantity = $request->input('quantity');
              $product->price = $request->input('price');
          $product->save();

          $request->session()->flash('status',"product has added");

          return redirect('product');
    }


    public function show(Product $product)
    {
        //
    }



    public function edit($id)
    {

    }


    public function update(Request $request,  $id)
    {
        $product = Product::findOrfail($id);

                 $product->cat_id =$request->input('cat_id');
                 $product->title= $request->input('title');
                 $product->descreption = $request->input('descreption');
                 if ($request->hasFile('image')) {
                 $image = $request->file('image');

                 $fileName = $image->getClientOriginalName();
                 $destinationPath = base_path() . '/public/images/' ;
                 $image->move($destinationPath, $fileName);

                 $attributes['image'] = $fileName;
                 }
                 $product->image = $fileName;
                 $product->quantity = $request->input('quantity');
                 $product->price = $request->input('price');

                     $product->save();


        $request->session()->flash('status',"product has added");

        return redirect('product');
    }


    public function destroy($id,Request $request)
    {
        $product = Product::findorfail($id);
        $productImage = $product->image;
        if (!$productImage) {
             return  response()->json(['error' => 403]);
        }
            Storage::delete($productImage);
            $product->destroy($id);
            $image_path = "images/$productImage";  // the value is : localhost/project/image/filename.format
            if(File::exists($image_path)) {
            File::delete($image_path);
            }
            $request->session()->flash('status',"product has added");

            return redirect('product');
        }

}
