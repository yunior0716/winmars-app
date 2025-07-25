<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class empleadosRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if ($this->getMethod() === 'POST') {
            $rules = [
                'nomemp' => 'required|regex:/^[a-zA-Z ]+$/u',
                'apeemp' => 'required|regex:/^[a-zA-Z ]+$/u',
                'telem1' => 'required|numeric|digits:10|unique:empleados,telem1|starts_with:809,829,849',
                'telem2' => 'nullable|numeric|digits:10|unique:empleados,telem2|starts_with:809,829,849',
                'direccion' => 'required',
                'correo' => 'required|unique:empleados,correo|email',
                'cedula' => 'required|numeric|digits:11|unique:empleados,cedula|starts_with:402,031',
                'ctipemp' => 'required|integer',
                'codpos' => 'required|integer',
                'hora_entrada' => 'required',
                'hora_salida' => 'required',
                'estemp' => 'required',
            ];
        }

        if ($this->getMethod() === 'PUT') {
            $rules = [
                'nomemp' => 'required|regex:/^[a-zA-Z ]+$/u',
                'apeemp' => 'required|regex:/^[a-zA-Z ]+$/u',
                'telem1' => 'required|numeric|digits:10|starts_with:809,829,849|unique:empleados,telem1,' . $this->codemp . ',codemp',
                'telem2' => 'nullable|numeric|digits:10|starts_with:809,829,849|unique:empleados,telem2,' . $this->codemp . ',codemp',
                'direccion' => 'required',
                'correo' => 'required|email|unique:empleados,correo,' . $this->codemp . ',codemp',
                'cedula' => 'required|numeric|digits:11|starts_with:402,031|unique:empleados,cedula,' . $this->codemp . ',codemp',
                'ctipemp' => 'required|integer',
                'codpos' => 'required|integer',
                'hora_entrada' => 'required',
                'hora_salida' => 'required',
                'estemp' => 'required',
            ];
        }
        return $rules;
    }
}
