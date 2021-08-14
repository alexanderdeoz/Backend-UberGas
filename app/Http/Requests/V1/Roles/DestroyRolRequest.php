<?php

namespace App\Http\Requests\V1\Roles;

use Illuminate\Foundation\Http\FormRequest;

class DestroyRolRequest extends FormRequest
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
            'ids' => 'ID`s de usuarios'
        ];
    }
}
