<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cotizacionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'codcli' => 'required',
            'codpro' => 'required',
            'cantidad' => 'required',
        ];
    }
}
