<?php

namespace App\Http\Requests\Semic;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSemicInscricaoRequest extends FormRequest
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