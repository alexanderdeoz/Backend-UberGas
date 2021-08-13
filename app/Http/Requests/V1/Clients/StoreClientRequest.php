<?php

namespace App\Http\Requests\V1\Clients;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address' => ['required', 'max:500'],
            'payment' => ['required', 'max:100']
        ];
    }
    public function attributes()
    {
        return [
            'address' => 'Dirección',
            'payment' => 'Método de pago'
        ];
    }
}
