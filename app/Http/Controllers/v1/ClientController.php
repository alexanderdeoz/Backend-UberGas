<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function store(Request $request)
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
    public function update(Request $request, $clients)
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
    public function destroy($clients)
    {
        $clients = client::find($clients);
            $clients->delete();
            return response()->json(
                ['data'=> null,
                'msg' => [
                'summary' => 'Eliminado correctamente',
                'detail' => 'EL pago se eliminó correctamente',
                'code' => '201']], 201
            );
    }
}
