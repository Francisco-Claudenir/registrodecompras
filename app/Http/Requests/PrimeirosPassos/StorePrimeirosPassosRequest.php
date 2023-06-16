<?php

namespace App\Http\Requests\PrimeirosPassos;

use Illuminate\Foundation\Http\FormRequest;

class StorePrimeirosPassosRequest extends FormRequest
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
            'visivel' => ['boolean'],
            'descricao' => ['required', 'string', 'min:2', 'max:300'],
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['required', 'date'],
        ];
    }
}
