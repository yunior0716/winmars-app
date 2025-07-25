<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class usuariosRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'codemp' => 'required|unique:users,codemp', 
            'username' => 'required|unique:users,username', 
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8', 
            'password_confirmation' => 'required|same:password', 
            'rol' => 'required', 
            'status' => 'required', 
        ];
    }
}
