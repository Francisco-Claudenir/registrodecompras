<?php

namespace App\Http\Requests\PP_IndicacaoBolsistas;

use Illuminate\Foundation\Http\FormRequest;

class StorePP_IndicacaoBolsistasRequest extends FormRequest
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
            'visivel' => ['boolean'],
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['required', 'date'],
        ];
    }
}
