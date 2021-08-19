<?php

namespace App\Http\Requests\V1\Drivers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDriverRequest extends FormRequest
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
            'lastname'=>['required','min:2','max:100'],
            'email' => ['required', 'max:50'],
            'phone' => ['required', 'max:15'],
            'placa'=>['required', 'max:10'],
            'vehicle'=>['required','max:20'],
            
        ];
    }
    public function attributes()
    {
        return [
            'name'=> 'Nombre',
            'lastname'=>'apellido',
            'phone' => 'Telefono',
            'email' => 'correo electrónico',
            'placa' => 'placa ',
            'vehicle'=>'vehiculo', 
        ];
    }
}
