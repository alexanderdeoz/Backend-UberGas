<?php

namespace App\Http\Requests\V1\Drivers;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverRequest extends FormRequest
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
            'email' => ['required', 'max:100'],
            'phone' => ['required', 'max:15'],
            'description' => ['required', 'max:50'], 
            'calification' => ['required', 'max:10'],
           'placa'=>['required', 'max:10'],
            'vehicle'=>['required','max:20'],
            
        ];
    }
    public function attributes()
    {
        return [
            'name'=> 'Nombre',
            'email' => 'correo electronico',
            'phone' => 'Telefono',
            'description' => 'descripcion', 
            'calification' => 'calificacion',
            'placa' => 'placa ',
            'vehicle'=>'vehiculo',            
            
        ];
    }
}
