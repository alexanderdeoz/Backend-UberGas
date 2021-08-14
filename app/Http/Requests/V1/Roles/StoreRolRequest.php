<?php

namespace App\Http\Requests\V1\Roles;

use Illuminate\Foundation\Http\FormRequest;

class StoreRolRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'max:20'],
                ];
    }
    public function attributes()
    {
        return [
            'name' => 'nombre de rol',
            
        ];
    }
}
