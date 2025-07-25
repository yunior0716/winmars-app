<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class posicionEmpleadoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'posicion' => 'required|regex:/^[a-zA-Z ]+$/u',
        ];
    }
}
