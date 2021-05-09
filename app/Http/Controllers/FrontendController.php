<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getlastproduct(){
        $product = Product::where('cat_id','=',1)->orderBy('created_at')->paginate(4);
        return response()->json($product);
    }
    public function getlastclothes(){
        $product = Product::where('cat_id','=',2)->orderBy('created_at')->paginate(4);
        return response()->json($product);
    }

    public function getproductbycat($id){
        $product = Product::where('cat_id','=',$id)->orderBy('created_at')->paginate(4);
        return response()->json($product);
    }
    public  function getproduct($id){

        $product = Product::where('id','=',$id)->get();

        return response()->json($product);

    }

    public function getcategories(){

        $cat = Category::all();

        return response()->json($cat);

    }
    public function getallproducts(){
        $product = Product::all();

        return response()->json($product);
    }


    public function getorders($id){
        $orders = Order::where('user_id',"=",$id)->with('products')->get();


        return response()->json($orders);
    }
}
