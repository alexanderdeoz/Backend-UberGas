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
            'calification' => ['required', 'max:20'],
            'delivery_cost' => ['required'],
            'delivery_date' => ['required'],
            'state' => ['required'],
            'payment_method' => ['required'],
            'wait_time' => ['required'],
            'total_price' => ['required']
        ];
    }
    public function attributes()
    {
        return [
            'calification' => 'Calificación',
            'delivery_cost' => 'Costo de la entrega',
            'delivery_date' => 'Fecha de entrega',
            'state' => 'Estado',
            'payment_method' => 'Método de pago',
            'wait_time' => 'Tiempo de espera',
            'total_price' => 'Precio total',
        ];
    }
}
