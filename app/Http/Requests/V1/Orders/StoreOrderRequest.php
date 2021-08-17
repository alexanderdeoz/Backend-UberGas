<?php

namespace App\Http\Requests\V1\Orders;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'deliveryCost' => ['required'],
            'deliveryDate' => ['required'],
            'state' => ['required'],
            'payment' => ['required'],
            'waitTime' => ['required'],
            'totalPrice' => ['required']
        ];
    }
    public function attributes()
    {
        return [
            'deliveryCost' => 'Costo de la entrega',
            'deliveryDate' => 'Fecha de entrega',
            'state' => 'Estado de la entrega',
            'payment' => 'Pago',
            'waitTime' => 'Tiempo de espera',
            'totalPrice' => 'Precio total',
        ];
    }
}
