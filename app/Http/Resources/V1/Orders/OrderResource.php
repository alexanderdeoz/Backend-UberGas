<?php

namespace App\Http\Resources\V1\Orders;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'calification' => $this->calification,
            'delivery_cost' => $this->delivery_cost,
            'delivery_date' => $this->delivery_date,
            'state' => $this->state,
            'payment_method' => $this->payment_method,
            'wait_time' => $this->wait_time,
            'total_price' => $this->total_price
        ];
    }
}
