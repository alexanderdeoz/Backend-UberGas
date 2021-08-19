<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Requests\V1\Drivers\DestroyDriverRequest;
use App\Http\Requests\V1\Drivers\StoreDriverRequest;
use App\Http\Requests\V1\Drivers\UpdateDriverRequest;
use App\Http\Resources\V1\Drivers\DriverCollection;
use App\Http\Resources\V1\Drivers\DriverResource;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller 
{
    public function __construct()
    {
        $this->middleware('role:admin, driver');
        $this->middleware('permission:view-drivers')->only(['index','show']);
        $this->middleware('permission:store-drivers')->only(['store']);
        $this->middleware('permission:update-drivers')->only(['update']);
        $this->middleware('permission:delete-drivers')->only(['destroy']);
    }
    
    public function index()
    {
        return new DriverCollection(Driver::paginate());
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
        $drivers->name= $request->input('name');
        $drivers->phone= $request->input('phone');
        $drivers->placa= $request->input('placa');
        $drivers->vehicle= $request->input('vehicle');
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
        return new DriverResource($drivers);
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
        $drivers->name= $request->input('name');
        $drivers->phone= $request->input('phone');
        $drivers->placa= $request->input('placa');
        $drivers->vehicle= $request->input('vehicle');
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
