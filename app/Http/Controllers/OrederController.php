<?php

namespace App\Http\Controllers;

use App\Order;
use Exception;


use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrederController extends Controller
{
    public function placeorder(Request $request)
    {
    

           $order =  Order::create([
                "user_id" => $request->input('user_id'),
                "firstname" => $request->input('firstname'),
                "lastname" => $request->input('lastname'),
                "adresse" => $request->input('adresse'),
                "city" => $request->input('city'),
                "codepostal" => $request->input('codepostal'),
                "telephone" => $request->input('telephone'),
                "product_id" => $request->input('product_id'),
                "size" => $request->input('size'),
                "quantity" => $request->input('quantity'),
            ]);
    
            DB::table('products')->where('id','=',$order->product_id)->decrement('quantity', $order->quantity); 
            if($order){
                return response()->json(['messege' => ["fill the fields please"],404]); 
            }
           
        
            return response()->json(['Order is register'],200);   
       
    }
}
