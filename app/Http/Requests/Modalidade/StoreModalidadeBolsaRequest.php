<?php

namespace App\Http\Requests\Modalidade;

use Illuminate\Foundation\Http\FormRequest;

class StoreModalidadeBolsaRequest extends FormRequest
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
        ];
    }
}
