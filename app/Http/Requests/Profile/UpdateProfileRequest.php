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
            'telefone' => ['required', 'numeric', 'digits:11'],
            'endereco' => ['required', 'array'],
            'endereco.cep' => ['required', 'size:9'],
            'endereco.endereco' => ['required'],
            'endereco.numero' => ['required'],
            'endereco.bairro' => ['required']

        ];
    }

    public function messages()
    {
        return [
            'endereco.cep.required' => 'O cep é obrigatório',
            'endereco.cep.size' => 'O cep deve conter 8 dígitos',
            //numero
            'endereco.numero.required' => 'O numero é obrigatório',
            //endereco
            'endereco.endereco.required' => 'O endereco é obrigatório',
            //Bairro
            'endereco.bairro.required' => 'O bairro é obrigatório',

        ];
    }


    protected function prepareForValidation()
    {
        $this->merge([
            'telefone' => preg_replace("/[^0-9]/", "", $this->telefone)
        ]);
    }
}
