<?php

namespace App\Http\Requests\V1\Travels;

use Illuminate\Foundation\Http\FormRequest;

class StoreTravelRequest extends FormRequest
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
            'client' => ['required'],
            'driver' => ['required'],
            'order' => ['required'],
            
        ];
    }
    public function attributes()
    {
        return [
            'client' => 'cliente',
            'driver' => 'conductor',
            'order' => 'descripcion de la orden',
            
        ];
    }
}
