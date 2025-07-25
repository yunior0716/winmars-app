<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tipoPropiedadRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tippro' => 'required|regex:/^[a-zA-Z ]+$/u',
        ];
    }
}
