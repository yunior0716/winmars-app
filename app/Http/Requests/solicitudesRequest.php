<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class solicitudesRequest extends FormRequest
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
            'comentario' => 'required',
            'estsol' => 'nullable',
        ];
    }
}
