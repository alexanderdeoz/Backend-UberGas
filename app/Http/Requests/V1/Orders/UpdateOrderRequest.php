<?php

namespace App\Http\Requests\V1\Orders;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'calification' => ['required', 'max:20'],
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
            'calification' => 'Calificación',
            'deliveryCost' => 'Costo de la entrega',
            'deliveryDate' => 'Fecha de entrega',
            'state' => 'Estado',
            'payment' => ' pago',
            'waitTime' => 'Tiempo de espera',
            'totalPrice' => 'Precio total',
        ];
    }
}
