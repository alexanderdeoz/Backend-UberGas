<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\V1\Dealers\DestroyDealerRequest;
use App\Http\Requests\V1\Products\StoreProductRequest;
use App\Http\Requests\V1\Products\UpdateProductRequest;
use App\Http\Resources\V1\Products\ProductCollection;
use App\Models\Dealer;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin, client');
        $this->middleware('permission:view-products')->only(['index','show']);
        $this->middleware('permission:store-products')->only(['store']);
        $this->middleware('permission:update-products')->only(['update']);
        $this->middleware('permission:delete-products')->only(['destroy']);
    }
    public function index()
    {
        return new ProductCollection(Product::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $products = new Product();
        $products->name= $request->name;
        $products->description= $request->description;
        $products->price= $request->price;
        $products->img= $request->img;
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
    public function update(UpdateProductRequest $request, $products)
    {
        $products = Product::find($products);
        $products->name= $request->name;
        $products->description= $request->description;
        $products->price= $request->price;
        $products->img= $request->img;
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

    public function destroys(DestroyDealerRequest $request)
    {
      Dealer::destroy($request->input('ids'));
  
      return response()->json(
        [
          'data' => null,
          'msg' => [
            'summary' => 'distribuidora Eliminada/s',
            'detail' => '',
            'code' => '201'
          ]
        ],
        201
      );
    }
}
