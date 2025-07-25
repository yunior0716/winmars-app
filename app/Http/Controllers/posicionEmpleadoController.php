<?php

namespace App\Http\Controllers;

use App\Http\Requests\posicionEmpleadoRequest;
use App\Models\posiciones_empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class posicionEmpleadoController extends Controller
{
    public function show()
    {

        return view('fijos.registrarPosicionesEmpleado');
    }

    public function create(posicionEmpleadoRequest $request)
    {
        $cliente = posiciones_empleado::create($request->validated());
        return redirect()->to('registrarPosicionesEmpleado')->with('success', 'Formulario enviado correctamente!');
    }
}
