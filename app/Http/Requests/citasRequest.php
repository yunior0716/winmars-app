<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class citasRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'codsol' => 'required',
            'codusu' => 'required',
            'fecha' => 'required',
            'descrip' => 'required',
            'estcit' => 'required',
        ];
    }
}
