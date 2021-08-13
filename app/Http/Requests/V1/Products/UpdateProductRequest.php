<?php

namespace App\Http\Requests\V1\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'max:20'],
            'description' => ['required', 'max: 50'],
            'price' => ['required'],
            'img' => ['required','max:30'],
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Nombre del producto',
            'description' => 'Descripcion del producto',
            'price' => 'Precio del producto',
            'img' => ' imagen del producto',
        ];
    }
}
