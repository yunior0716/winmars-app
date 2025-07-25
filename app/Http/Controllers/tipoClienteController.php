<?php

namespace App\Http\Controllers;

use App\Http\Requests\tipoClienteRequest;
use App\Models\tipo_clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tipoClienteController extends Controller
{
    public function show()
    {
        return view('fijos.registrarTipoCliente');
    }

    public function create(tipoClienteRequest $request)
    {
        $cliente = tipo_clientes::create($request->validated());
        return redirect()->to('registrarTipoCliente')->with('success', 'Formulario enviado correctamente!');
    }
}
