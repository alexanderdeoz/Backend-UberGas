<?php

namespace App\Http\Controllers;
use App\Exceptions\DriverNotFound;
use App\Models\Dealer;
use Illuminate\Http\Request;
use App\Http\Requests\V1\Dealers\DestroyDealerRequest;
use App\Http\Requests\V1\Dealers\StoreDealerRequest;
use App\Http\Requests\V1\Dealers\UpdateDealerRequest;

class DealerController extends Controller
{
    public function __construct()
  {
    $this->middleware('role:driver');
    $this->middleware('permission:view-data')->only(['index']);
        
  }
    public function index()
    {
        $dealers = Dealer::get();
        return response()->json(
            [
                'data' => $dealers,
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
    public function store(StoreDealerRequest $request)
    {
        $dealers = new Dealer();
        $dealers->name= $request->name;
        $dealers->phone= $request->phone;
        $dealers->adress= $request->adress;
        $dealers->country= $request->country;
        $dealers->city= $request->city;
        $dealers->img_url= $request->img_url;
        $dealers->time_open= $request->time_open;
        $dealers->time_close= $request->time_close;
        $dealers->save();
        return response()->json(
            [
                'data' => $dealers,
                'msg' => [
                    'summary' => 'Creado correctamente',
                    'detail' => 'El distribuidor se creo correctamente',
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
    public function show($dealers)
    {
        $dealers = Dealer::find($dealers);
        return response()->json(
            [
                'data' => $dealers[0],
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
    public function update(UpdateDealerRequest $request, $dealers)
    {
        $dealers = Dealer::find();
        $dealers->name= $request->name;
        $dealers->phone= $request->phone;
        $dealers->adress= $request->adress;
        $dealers->country= $request->country;
        $dealers->city= $request->city;
        $dealers->img_url= $request->img_url;
        $dealers->time_open= $request->time_open;
        $dealers->time_close= $request->time_close;
        $dealers->save();
        return response()->json(
            [
                'data' => $dealers,
                'msg' => [
                    'summary' => 'Actualizado correctamente',
                    'detail' => 'EL distribuidor se actualizó correctamente',
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
    public function destroy($dealers)
    {
        $dealers = Dealer::find($dealers);
        $dealers->delete();
        return response()->json(
            [
                'data' => $dealers,
                'msg' => [
                    'summary' => 'Eliminado correctamente',
                    'detail' => 'EL distribuidor se elimino correctamente',
                    'code' => '201'
                ]
            ],
            201
        );
    }
}
