<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin, client');
        $this->middleware('permission:view-detailsOrders')->only(['index', 'show']);
        $this->middleware('permission:store-detailsOrders')->only(['store']);
        $this->middleware('permission:update-detailsOrders')->only(['update']);
        $this->middleware('permission:delete-detailsOrders')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailsOrders = [];
        return response()->json(
            [
                'data' => $detailsOrders,
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
        $detailsOrders = [];
        return response()->json(
            [
                'data' => $detailsOrders,
                'msg' => [
                    'summary' => 'Creado correctamente',
                    'detail' => 'El conductor se creo correctamente',
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
    public function show($detailsOrders)
    {
        $detailsOrders = [];
        return response()->json(
            [
                'data' => $detailsOrders[0],
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
    public function update(Request $request, $detailsOrders)
    {
        $detailsOrders = [];
        return response()->json(
            [
                'data' => $detailsOrders,
                'msg' => [
                    'summary' => 'Actualizado correctamente',
                    'detail' => 'EL detalle de la orden se actualiz?? correctamente',
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
    public function destroy($detailsOrders)
    {
        
        $detailsOrders = [];
        return response()->json(
            [
                'data' => $detailsOrders,
                'msg' => [
                    'summary' => 'Eliminado correctamente',
                    'detail' => 'EL detalle se elimin?? correctamente',
                    'code' => '201'
                ]
            ],
            201
        );
    }
}
