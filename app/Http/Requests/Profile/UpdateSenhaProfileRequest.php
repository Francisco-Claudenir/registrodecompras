<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;


class UpdateSenhaProfileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'new_password' => 'required|min:8|confirmed',
            'old_password' => 'required'
        ];
    }

    public function messages()
{
    return [
        'new_password.required' => 'O campo é obrigatório.',
        'new_password.min' => 'O campo deve ter no minimo :min caracteres.',
        'new_password.confirmed' => 'A senha de confirmação está diferente do campo nova senha',
    ];

   
}
}