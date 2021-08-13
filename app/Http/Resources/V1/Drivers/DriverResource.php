<?php

namespace App\Http\Resources\V1\Drivers;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
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
            'email' => $this->email,
            'phone' => $this->phone,
            'description' => $this->description,
            'calification' => $this->calification,
            'placa' => $this->placa,
            'vehicle' => $this->vehicle,
        ];
    }
}