<?php

namespace App\Http\Requests\V1\Dealers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDealerRequest extends FormRequest
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
            'calification' => ['required', 'max:10'],
            'country' => ['required', 'max:40'], 
            'city' => ['required', 'max:40'],
            'img_url'=>['required', 'max30'],
            'phone' => ['required', 'max:15'],
            'time_close'=>['required'],
            'time_open'=> ['required'],
        ];
    }
    public function attributes()
    {
        return [
            'name'=> 'Nombre',
            'adress' => 'Direccion',
            'calification' => 'Calificacion',
            'country' => 'Pais', 
            'city' => 'Ciudad',
            'img_url'=>'URL de imagen',            
            'phone' => 'Telefono',
            'time_close'=>'Hora de cierre',
            'time_open'=> 'Hora de apertura',
        ];
    }
}
