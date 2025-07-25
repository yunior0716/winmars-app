<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class propiedadesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->getMethod() === 'POST') {
            $rules = [
                'titulo' => 'required',
                'descrip' => 'required',
                'direccion' => 'required',
                'municipio' => 'required|regex:/^[a-zA-Z ]+$/u',
                'ciudad' => 'required|regex:/^[a-zA-Z ]+$/u',
                'fotos' => 'required',
                'habit' => 'required|integer',
                'baños' => 'required|integer',
                'metros' => 'required|integer',
                'parqueo' => 'required|integer',
                'preven' => 'required|numeric|gte:0',
                'preren' => 'required|numeric|gte:0',
                'comision' => 'required|integer',
                'codcli' => 'required',
                'codtpro' => 'required',
                'citbis' => 'required',
                'estpro' => 'required',
            ];
        }

        if ($this->getMethod() === 'PUT') {
            $rules = [
                'titulo' => 'required',
                'descrip' => 'required',
                'habit' => 'required|integer',
                'baños' => 'required|integer',
                'metros' => 'required|integer',
                'parqueo' => 'required|integer',
                'preven' => 'required|numeric|gte:0',
                'preren' => 'required|numeric|gte:0',
                'comision' => 'required|integer',
                'codcli' => 'required',
                'codtpro' => 'required',
                'citbis' => 'required',
                'estpro' => 'required',
            ];
        }
        return $rules;
    }
}
