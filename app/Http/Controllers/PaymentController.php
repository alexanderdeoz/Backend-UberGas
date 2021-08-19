<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Requests\V1\Payments\StorePaymentRequest;
use App\Http\Requests\V1\Payments\UpdatePaymentRequest;
use App\Http\Resources\V1\Payments\PaymentCollection;
use App\Http\Resources\V1\Payments\PaymentResource;
use Illuminate\Support\Facades\DB;


class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin, client');
        $this->middleware('permission:view-payments')->only(['index','show']);
        $this->middleware('permission:store-payments')->only(['store']);
        $this->middleware('permission:update-payments')->only(['update']);
        $this->middleware('permission:delete-payments')->only(['destroy']);
    }
        public function index()
        {
            return new PaymentCollection(Payment::paginate());
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(StorePaymentRequest $request)
        {
            $payments = new Payment();
            $payments->name= $request->input('name');
            $payments->save();
            
            return response()->json(
                ['data'=> null,
                'msg' => [
                'summary' => 'Creado correctamente',
                'detail' => 'El pago se creo correctamente',
                'code' => '201']], 201
             );
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($payments)
        {
            return new PaymentResource($payments);
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(UpdatePaymentRequest $request, $payment)
        {
            $payments = Payment::find($payment);
            $payments->name= $request->input('name');
            $payments->save();

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
        public function destroy($payments)
        {
            $payments = Payment::find($payments);
            $payments->delete();
            return response()->json(
                ['data'=> null,
                'msg' => [
                'summary' => 'Eliminado correctamente',
                'detail' => 'EL pago se eliminó correctamente',
                'code' => '201']], 201
            );
        }
    
        }
