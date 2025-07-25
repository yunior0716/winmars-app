<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tipoClienteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'tipcli' => 'required|regex:/^[a-zA-Z ]+$/u',
        ];
    }
}
