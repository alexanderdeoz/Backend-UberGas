<?php

namespace App\Http\Resources\V1\Travels;

use Illuminate\Http\Resources\Json\JsonResource;

class TravelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'client_id' => $this->client,
            'driver_id' => $this->driver,
            'order_id' => $this->order,
            
        ];
    }
}
