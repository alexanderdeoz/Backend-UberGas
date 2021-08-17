<?php

namespace App\Http\Resources\V1\Dealers;

use Illuminate\Http\Resources\Json\JsonResource;

class DealerResource extends JsonResource
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
            'name' => $this->name,
            'address' => $this->address,
            'country' => $this->country,
            'city' => $this->city,
            'phone' => $this->phone,
            'timeClose' => $this->time_close,
            'timeOpen' => $this->time_open,
        ];
    }
}
