<?php

namespace App\Http\Requests\Curso;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCursoRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'cursos' => ['required', 'string', 'min:2', 'max:150'],
            'modalidade_id' => ['required', 'exists:modalidades,id'],
            'centro_id' => ['required', 'exists:centros,id'],
        ];
    }
}