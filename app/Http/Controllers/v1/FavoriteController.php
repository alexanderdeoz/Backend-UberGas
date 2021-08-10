<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites=[];
        return response()->json(
            [
                'data' => $favorites,
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
        $favorites=[];
        return response()->json(
            [
                'data' => $favorites,
                'msg' => [
                    'summary' => 'Creado correctamente',
                    'detail' => 'Los favoritos se creo correctamente',
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
    public function show($favorites)
    {
        return response()->json(
            [
                'data' => $favorites[0],
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
    public function update(Request $request, $favorites)
    {
        $favorites=[];
        return response()->json(
            [
                'data' => $favorites,
                'msg' => [
                    'summary' => 'Actualizado correctamente',
                    'detail' => 'Los favoritos se actualizó correctamente',
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
    public function destroy($favorites)
    {
        $favorites=[];
        return response()->json(
            [
                'data' => $favorites,
                'msg' => [
                    'summary' => 'Eliminado correctamente',
                    'detail' => 'Los favoritos se eliminó correctamente',
                    'code' => '201'
                ]
            ],
            201
        );
    }
}
