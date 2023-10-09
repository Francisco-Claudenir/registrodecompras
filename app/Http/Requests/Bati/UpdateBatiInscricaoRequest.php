<?php

namespace App\Http\Requests\Bati;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBatiInscricaoRequest extends FormRequest
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
