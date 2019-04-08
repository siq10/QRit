<?php

namespace App\Http\Controllers\API;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $orders = Order::all();
       return response()->json($orders)->setStatusCode(Response::HTTP_OK); //HTTP_OK=200;
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     

        $order = new Order;
        $order->client_id=$request->client_id;
        $order->waiter_id=$request->$request->waiter_id;
        $order->table_id=$request->table_id;
        $order->status=$request->status;
       

        $order = Order::find($order_id);
        $order->products()->attach ($order_id,['status' => $status]);

        $order->save();



        return response()->json($order)->setStatusCode(Response::HTTP_CREATED); 


        //$token = $this->authorizeUser($user);
        //return response()->json($token);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
        
        
    {

         $order= Order::find($id);
        //$table->place()->associate($place);
        $data = DB::table('orders')->where('id', '=', "{$id}")->get();
        //$data = DB::table('places')->where('name', '=', "{$name}")->get();
        
        return response()->json($data)->setStatusCode(Response::HTTP_OK); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //return $this->login($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
