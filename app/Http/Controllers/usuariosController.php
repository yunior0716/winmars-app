<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\usuariosRequest;
use App\Models\empleados;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class usuariosController extends Controller
{
    public function show()
    {
        $empleados = empleados::where('estemp', 'activo')->get();
        return view('auth.registrarUsuarios', compact('empleados'));
    }

    public function create(usuariosRequest $request)
    {
        $usuario = User::create($request->validated());

        return redirect('registrarUsuarios')->with('success', 'Formulario enviado correctamente!');
    }

    public function query()
    {
        $datos['users'] = User::where('status', 'activo')->get();
        return view('auth.consultarUsuarios', $datos);
    }

    public function delete($id)
    {
        $usuario = User::find($id);

        $usuario->status = 'inactivo';
        $usuario->save();

        return redirect('consultarUsuarios')->with('success', 'Usuario desabilitado correctamente');
    }
}
