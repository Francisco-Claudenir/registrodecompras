<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore(auth()->user()->id)
            ],
            'telefone' => ['required', 'string', 'min:2', 'max:45'],
            'endereco' => ['required', 'array'],
            'endereco.cep' => ['required', 'digits:8'],
            'endereco.endereco' => ['required'],
            'endereco.numero' => ['required'],
            'endereco.bairro' => ['required']

        ];
    }

    public function messages()
    {
        return [
            'endereco.cep.required' => 'O cep é obrigatório',
            'endereco.cep.digits' => 'O cep deve conter 8 dígitos',
            //numero
            'endereco.numero.required' => 'O numero é obrigatório',
            //endereco
            'endereco.endereco.required' => 'O endereco é obrigatório',
            //Bairro
            'endereco.bairro.required' => 'O bairro é obrigatório',



        ];
    }
}
