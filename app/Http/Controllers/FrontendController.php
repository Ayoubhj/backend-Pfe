<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getlastproduct(){
        $product = Product::where('cat_id','=',1)->orderBy('created_at')->paginate(4);
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

    public function getproductBycategory($id){

        $product  = Product::where('id','=',$id);

        return response()->json($product);
    }
}
