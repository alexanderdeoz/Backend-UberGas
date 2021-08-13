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
            'deliveryCost' => $this->delivery_cost,
            'deliveryDate' => $this->delivery_date,
            'state' => $this->state,
            'payment' => $this->payment_method,
            'waitTime' => $this->wait_time,
            'totalPrice' => $this->total_price
        ];
    }
}
