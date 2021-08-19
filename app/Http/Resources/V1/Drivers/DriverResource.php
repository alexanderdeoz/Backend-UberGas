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
            'lastname'=>$this->name,
            'birthdate' => $this->birthdate,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'password_changed' => $this->password_changed,
            'phone' => $this->phone,
            'placa' => $this->placa,
            'vehicle' => $this->vehicle,
        ];
    }
}
 