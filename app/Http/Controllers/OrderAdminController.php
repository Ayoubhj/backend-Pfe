<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
   
    public function index()
    {
        $orders = Order::all();
       
        return view('order.index',compact('orders'));
    }
    


    public function create()
    {
        //
    }

   function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrfail($id);
        if($order->status == 0){
            $order->update([
                "status" => true
            ]);
        }else{
            $order->update([
                "status" => false
            ]);
        }
       

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);

        return redirect()->route('order.index');
    }
}
