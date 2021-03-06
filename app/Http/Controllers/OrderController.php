<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\V1\Orders\DestroyOrderRequest;
use App\Http\Requests\V1\Orders\StoreOrderRequest;
use App\Http\Requests\V1\Orders\UpdateOrderRequest;
use App\Http\Resources\V1\Orders\OrderCollection;
use App\Http\Resources\V1\Orders\OrderResource;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin, client, driver');
        $this->middleware('permission:view-orders')->only(['index','show']);
        $this->middleware('permission:store-orders')->only(['store']);
        $this->middleware('permission:update-orders')->only(['update']);
        $this->middleware('permission:delete-orders')->only(['destroy']);
    }
    public function index()
    {
        return new OrderCollection(Order::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $orders = new Order();
        $orders->deliveryPrice= $request->input('deliveryPrice');
        $orders->deliveryDate= $request->input('deliveryDate');
        $orders->payment= $request->input('payment');
        $orders->state= $request->input('state');
        $orders->waiTime= $request->input('waitTime');
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
        return new OrderResource($orders);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, $orders)
    {
        $orders = Order::find($orders);
        $orders->deliveryPrice= $request->input('deliveryPrice');
        $orders->deliveryDate= $request->input('deliveryDate');
        $orders->payment= $request->input('payment');
        $orders->state= $request->input('state');
        $orders->waiTime= $request->input('waitTime');
        $orders->save();
        return response()->json(
            [
                'data' => $orders,
                'msg' => [
                    'summary' => 'Actualizado correctamente',
                    'detail' => 'La orden se actualiz?? correctamente',
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
                    'detail' => 'La orden se elimin?? correctamente',
                    'code' => '201'
                ]
            ],
            201
        );
    }
}
