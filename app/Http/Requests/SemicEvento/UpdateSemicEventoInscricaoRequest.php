<?php

namespace App\Http\Requests\SemicEvento;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSemicEventoInscricaoRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [
            'status' => ['required',Rule::in(config('status.status'))],
            //
        ];
    }
}
