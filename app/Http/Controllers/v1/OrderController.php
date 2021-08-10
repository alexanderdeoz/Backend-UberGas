<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::get();
        return response()->json(
            [
                'data' => $orders,
                'msg' => [
                    'sumary' => 'consulta correcta',
                    'detail' => 'la consulta esta correcta',
                    'code' => '201'
                ]
            ],
            201
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orders = new Order();
        $orders->calification= $request->calification;
        $orders->delivery_cost= $request->delivery_cost;
        $orders->delivery_date= $request->delivery_date;
        $orders->method_payment= $request->method_payment;
        $orders->state= $request->state;
        $orders->total_price= $request->total_price;
        $orders->wait_time= $request->wait_time;
        $orders->save();
        return response()->json(
            [
                'data' => $orders,
                'msg' => [
                    'summary' => 'Creado correctamente',
                    'detail' => 'La orden se creo correctamente',
                    'code' => '201'
                ]
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($orders)
    {
        $orders = Order::find($orders);
        return response()->json(
            [
                'data' => $orders[0],
                'msg' => [
                    'sumary' => 'consulta correcta',
                    'detail' => 'la consulta esta correcta',
                    'code' => '200'
                ]
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $orders)
    {
        $orders = Order::find($orders);
        $orders->calification= $request->calification;
        $orders->delivery_cost= $request->delivery_cost;
        $orders->delivery_date= $request->delivery_date;
        $orders->method_payment= $request->method_payment;
        $orders->state= $request->state;
        $orders->total_price= $request->total_price;
        $orders->wait_time= $request->wait_time;
        $orders->save();
        return response()->json(
            [
                'data' => $orders,
                'msg' => [
                    'summary' => 'Actualizado correctamente',
                    'detail' => 'La orden se actualizó correctamente',
                    'code' => '201'
                ]
            ],
            201
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($orders)
    {
        $orders = Order::find($orders);
        $orders->delete();
        return response()->json(
            [
                'data' => $orders,
                'msg' => [
                    'summary' => 'Eliminado correctamente',
                    'detail' => 'La orden se eliminó correctamente',
                    'code' => '201'
                ]
            ],
            201
        );
    }
}
