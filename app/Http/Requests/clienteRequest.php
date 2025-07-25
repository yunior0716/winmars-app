<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class clienteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->getMethod() === 'POST') {
            $rules = [
                'nomcli' => 'required|regex:/^[a-zA-Z ]+$/u',
                'apecli' => 'required|regex:/^[a-zA-Z ]+$/u',
                'tecli1' => 'required|numeric|digits:10|starts_with:809,829,849|unique:clientes,tecli1',
                'tecli2' => 'nullable|numeric|digits:10|starts_with:809,829,849|unique:clientes,tecli2',
                'dircli' => 'required',
                'corcli' => 'required|email|unique:clientes,corcli',
                'cedrnc' => 'required|numeric|digits:11|starts_with:402,031|unique:clientes,cedrnc',
                'codtpcli' => 'required|integer',
                'estcli' => 'required',
            ];
        }

        if ($this->getMethod() === 'PUT') {
            $rules = [
                'nomcli' => 'required|regex:/^[a-zA-Z ]+$/u',
                'apecli' => 'required|regex:/^[a-zA-Z ]+$/u',
                'tecli1' => 'required|numeric|digits:10|starts_with:809,829,849|unique:clientes,tecli1,' . $this->codcli . ',codcli',
                'tecli2' => 'nullable|numeric|digits:10|starts_with:809,829,849|unique:clientes,tecli2,' . $this->codcli . ',codcli',
                'dircli' => 'required',
                'corcli' => 'required|email|unique:clientes,corcli,' . $this->codcli . ',codcli',
                'cedrnc' => 'required|numeric|digits:11|starts_with:402,031|unique:clientes,cedrnc,' . $this->codcli . ',codcli',
                'codtpcli' => 'required|integer',
                'estcli' => 'required',
            ];
        }

        return $rules;
    }
}
