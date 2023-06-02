<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf' => ['required', 'string', 'cpf', 'unique:users', 'size:11'],
            'perfil_id' => ['required'],
            'telefone' => ['required', 'string', 'min:2', 'max:45'],
            'password' => ['required', 'confirmed', 'string', 'min:8', 'max:255'],
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
            //Perfil
            'perfil_id' => 'O campo perfil é obrigatório',


        ];
    }
}
