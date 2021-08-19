<?php

namespace App\Http\Resources\V1\Orders;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'deliveryPrice' => $this->deliveryPrice,
            'deliveryDate' => $this->deliveryDate,
            'state' => $this->state,
            'payment' => $this->payment,
            'waitTime' => $this->waitTime,
            
        ];
    }
}
