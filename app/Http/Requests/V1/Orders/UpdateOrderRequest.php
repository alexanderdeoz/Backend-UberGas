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
            'deliveryPrice' => ['required'],
            'deliveryDate' => ['required'],
            'state' => ['required'],
            'payment' => ['required'],
            'waitTime' => ['required'],
            
        ];
    }
    public function attributes()
    {
        return [
            'deliveryCost' => 'Costo de la entrega',
            'deliveryDate' => 'Fecha de entrega',
            'state' => 'Estado de la entrega',
            'payment' => ' pago',
            'waitTime' => 'Tiempo de espera',
            
        ];
    }
}
