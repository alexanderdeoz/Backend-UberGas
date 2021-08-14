<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Requests\V1\Travels\DestroyTravelClientRequest;
use App\Http\Requests\V1\Travels\StoreTravelRequest;
use App\Http\Requests\V1\Travels\UpdateTravelRequest;
use App\Http\Resources\V1\Travels\TravelCollection;
use Illuminate\Support\Facades\DB;


class TravelController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin, client, driver');
        $this->middleware('permission:view-travels')->only(['index','show']);
        $this->middleware('permission:store-travels')->only(['store']);
        $this->middleware('permission:update-travels')->only(['update']);
        $this->middleware('permission:delete-travels')->only(['destroy']);
    }
        public function index()
        {
            return new TravelCollection(Travel::paginate());
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(StoreTravelRequest $request)
        {
            $travels = new Travel();
            $travels->starting= $request->starting;
            $travels->arrival= $request->arrival;
            $travels->value= $request->value;
            $travels->save();
            
            return response()->json(
                ['data'=> null,
                'msg' => [
                'summary' => 'Creado correctamente',
                'detail' => 'El viaje se creo correctamente',
                'code' => '201']], 201
             );
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($travel)
        {
            $travel = DB::select('select * from app.travels where id = ?',[$travel]);
            return response()->json(
               ['data'=> $travel,
               'msg'=>['sumary'=> 'consulta correcta',
               'detail'=>'la consulta esta correcta', 
               'code'=>'200']], 200
            );
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(UpdateTravelRequest $request, $travels)
        {
            $travels = Travel::find($travels);
            $travels->starting= $request->starting;
            $travels->arrival= $request->arrival;
            $travels->value= $request->value;
            $travels->save();
            return response()->json(
               [  'data' => null,
               'msg' => [
               'summary' => 'Actualizado correctamente',
               'detail' => 'EL viaje se actualizó correctamente',
               'code' => '201']], 201
            );
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($travels)
        {
            $travels = Travel::find($travels);
            $travels->delete();
            return response()->json(
                ['data'=> $travels,
                'msg' => [
                'summary' => 'Eliminado correctamente',
                'detail' => 'EL viaje se eliminó correctamente',
                'code' => '201']], 201
             );
        }
    
}
