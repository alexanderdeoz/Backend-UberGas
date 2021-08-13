<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\V1\Clients\DestroyClientRequest;
use App\Http\Requests\V1\Clients\StoreClientRequest;
use App\Http\Requests\V1\Clients\UpdateClientRequest;
use App\Http\Resources\V1\Clients\ClientCollection;
use App\Http\Resources\V1\Clients\ClientResource;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::get();
        return response()->json(
            [
                'data' => $clients,
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
    public function store(StoreClientRequest $request)
    {
        $clients = new Client();
        $clients->address= $request->address;
        $clients->clients_method= $request->clients_method;
        $clients->save();
        
        return response()->json(
            [
                'data' => $clients,
                'msg' => [
                    'summary' => 'Creado correctamente',
                    'detail' => 'El pago se creo correctamente',
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
    public function show($clients)
    {
        $clients = Client::find($clients);
        return response()->json(
            [
                'data' => $clients[0],
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
    public function update(UpdateClientRequest $request, $clients)
    {
        $clients = Client::find($clients);
        $clients->address= $request->address;
        $clients->clients_method= $request->clients_method;
        $clients->save();
            return response()->json(
               [  'data' => null,
               'msg' => [
               'summary' => 'Actualizado correctamente',
               'detail' => 'EL pago se actualizó correctamente',
               'code' => '201']], 201
            );
        
    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyClientRequest $request)
    {
        
        Client::destroy($request->input('ids'));
           
            return response()->json(
                ['data'=> null,
                'msg' => [
                'summary' => 'Eliminado correctamente',
                'detail' => 'EL pago se eliminó correctamente',
                'code' => '201']], 201
            );
    }

    public function updateState()
    {
        $clients = 'client';
        return response()->json(
            [
                'data' => $clients,
                'msg' => [
                    'summary' => 'actualizacion correcta',
                    'detail' => 'el estado del cliente se actualizo ',
                    'code' => '201'
                ]

            ],
            201
        );
    }
}

