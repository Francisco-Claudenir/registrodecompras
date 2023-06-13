<?php

namespace App\Http\Requests\PrimeirosPassos;

use Illuminate\Foundation\Http\FormRequest;

class StorePrimeirosPassosInscricaoRequest extends FormRequest
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
     * Get the validation rules that apply to the request.Santa Catarina
     *
     * @return array
     */
    public function rules()
    {
        return [
            'primeiropasso_id' => ['required'],
            'identidade' => ['required', 'string'],
            'matricula' => ['required', 'string'],
            'centro_id' => ['required'],
            'copiacontrato' => ['required', 'mimes:pdf'],
            'vigencia_inicio' => ['required', 'date'],
            'vigencia_fim' => ['required', 'date'],
            'areaconhecimento_id' => ['required'],
            'tituloprojetopesquisa' => ['required', 'string', 'max:100'],
            'resumoprojeto' => ['required'],
            'chefeimediato' => ['required'],
            'anuenciachefe' => ['required', 'mimes:pdf'],
            'parecercomite' => ['mimes:pdf'],
            'curriculolattes' => ['required', 'mimes:pdf'],
            'projetopesquisa' => ['required', 'mimes:pdf'],


            //Plano de Trabalho
            'titulo' => ['required'],
            'resumo' => ['required',],
            'arquivo' => ['required', 'mimes:pdf']
        ];
    }
}
