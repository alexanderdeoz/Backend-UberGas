<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return response()->json(
            [
                'data' => $products,
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
        $products = new Product();
        $products->name= $request->name;
        $products->description= $request->description;
        $products->price= $request->price;
        $products->img_url= $request->img_url;
        $products->save();
        return response()->json(
            [
                'data' => $products,
                'msg' => [
                    'summary' => 'Creado correctamente',
                    'detail' => 'El producto se creo correctamente',
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
    public function show($products)
    {
        $products = Product::find($products);
        return response()->json(
            [
                'data' => $products[0],
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
    public function update(Request $request, $products)
    {
        $products = Product::find($products);
        $products->name= $request->name;
        $products->description= $request->description;
        $products->price= $request->price;
        $products->img_url= $request->img_url;
        $products->save();
        return response()->json(
            [
                'data' => $products,
                'msg' => [
                    'summary' => 'Actualizado correctamente',
                    'detail' => 'EL producto se actualizó correctamente',
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
    public function destroy($products)
    {
        $products = Product::find($products);
            $products->delete();
        return response()->json(
            [
                'data' => $products,
                'msg' => [
                    'summary' => 'Eliminado correctamente',
                    'detail' => 'EL producto se eliminó correctamente',
                    'code' => '201'
                ]
            ],
            201
        );
    }
}
