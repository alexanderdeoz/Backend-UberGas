<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Requests\V1\Drivers\DestroyDriverRequest;
use App\Http\Requests\V1\Drivers\StoreDriverRequest;
use App\Http\Requests\V1\Drivers\UpdateDriverRequest;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    public function __construct()
    {
      $this->middleware('role:driver');
    }
    
    public function index()
    {
        $drivers =Driver::get();
        return response()->json(
            [
                'data' => $drivers,
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
    public function store(StoreDriverRequest $request)
    {
        $drivers = new Driver();
        $drivers->name= $request->name;
        $drivers->phone= $request->phone;
        $drivers->email= $request->email;
        $drivers->description= $request->description;
        $drivers->placa= $request->placa;
        $drivers->vehicle= $request->vehicle;
        $drivers->save();

        return response()->json(
            [
                'data' => $drivers,
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
    public function show($drivers)
    {
        $drivers = DB::select('select * from app.drivers where id = ?',[$drivers]);
        return response()->json(
            [
                'data' => $drivers[0],
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
    public function update(UpdateDriverRequest $request, $drivers)
    {
        $drivers = Driver::find($drivers);
        $drivers->name= $request->name;
        $drivers->phone= $request->phone;
        $drivers->email= $request->email;
        $drivers->description= $request->description;
        $drivers->placa= $request->placa;
        $drivers->vehicle= $request->vehicle;
        $drivers->save();

        return response()->json(
            [
                'data' => $drivers,
                'msg' => [
                    'summary' => 'Actualizado correctamente',
                    'detail' => 'EL conductor se actualizó correctamente',
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
    public function destroy($drivers)
    {
        $drivers = Driver::find($drivers);
        $drivers->delete();
        return response()->json(
            [
                'data' => $drivers,
                'msg' => [
                    'summary' => 'Eliminado correctamente',
                    'detail' => 'EL conductor se eliminó correctamente',
                    'code' => '201'
                ]
            ],
            201
        );
    }
}
