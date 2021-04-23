<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\ProductOrder;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrederController extends Controller
{
    public function placeorder(Request $request,$id){
    try {
        $product = Product::findOrfail($id);

        $order = Order::create([
            "user_id" => Auth::user(),
            "firstname" => $request->input('firstname'),
            "lastname" => $request->input('lastname'),
            "Adresse" => $request->input('Adresse'),
            "City" => $request->input('City'),
            "Telephone" => $request->input('Telephone'),
        ]);

        if ($order) {
            ProductOrder::create([
                "product_id" => $product->id,
                "order_id" => $order->id,
                "size" => $request->input('size'),
                "quantity" => $request->input('quantity')
            ]);
        }
    }catch(Exception $ex){
        return response()->json([
            'error' => $ex
        ]);
    }
}
}
