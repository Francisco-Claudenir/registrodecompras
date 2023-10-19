<?php

namespace App\Http\Requests\Certificado;

use Illuminate\Foundation\Http\FormRequest;

class StoreCertificadoRequest extends FormRequest
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
            'nome' => ['required', 'string', 'min:2', 'max:150'],
            'descricao' => ['required', 'string', 'min:2', 'max:255'],
            'img' => ['required',],
        ];
    }

    public function messages()
    {

        return [
            'img' => 'O campo :attribute é obrigatório.'
        ];
    }

    public function attributes()
    {
        return [
            'img' => 'Imagem'
        ];
    }
}
