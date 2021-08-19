<?php

namespace App\Http\Requests\V1\Dealers;

use Illuminate\Foundation\Http\FormRequest;

class StoreDealerRequest extends FormRequest
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
            'name'=> ['required', 'max:20'],
            'address' => ['required', 'max:500'],
            'city' => ['required'],
            'phone' => ['required', 'max:15'],
            'timeClose'=>['required'],
            'timeOpen'=> ['required'],
        ];
    }
    public function attributes()
    {
        return [
            'name'=> 'Nombre',
            'address' => 'Direccion',
            'city' => 'Ciudad',
            'phone' => 'Telefono',
            'timeClose'=>'Hora de cierre',
            'timeOpen'=> 'Hora de apertura',
        ];
    }
}
