<?php

namespace App\Http\Requests\V1\Products;

use Illuminate\Foundation\Http\FormRequest;

class DestroyProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'ids' => ['required']
        ];
    }
    public function attributes()
    {
        return [
            'ids' => 'ID`s de productos'
        ];
    }
}
