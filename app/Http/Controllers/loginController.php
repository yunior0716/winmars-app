<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Models\empleados;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{

    public function show()
    {
        if (Auth::check()) {
            return redirect()->to('home');
        }
        return view('auth.login');
    }

    public function login(loginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) {
            return redirect()->to('/login')->withErrors('Nombre de usuario y/o contraseña son incorrectos, Intente de nuevo!');
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        $status = $user->status;
        if ($status == 'inactivo') {
            return redirect()->to('/login')->withErrors('Este usuario fue inhabilitado!');
        }
        $empleado = empleados::where('codemp', $user->codemp)->first();

        date_default_timezone_set('America/Santo_Domingo');
        $time = time();

        if ($user->id == '1') {
        } else {
            if ($time < strtotime($empleado->hora_entrada) || ($time >= strtotime("Saturday")  && $time < strtotime("Sunday"))) {
                return redirect()->to('/login')->withErrors('Solo tienes acceso en horario laboral: ' . $empleado->hora_entrada . ' a ' . $empleado->hora_salida . ' de Lunes/Viernes!');
            } elseif ($time > strtotime($empleado->hora_salida) || ($time >= strtotime("Saturday")  && $time < strtotime("Sunday"))) {
                return redirect()->to('/login')->withErrors('Solo tienes acceso en horario laboral: ' . $empleado->hora_entrada . ' a ' . $empleado->hora_salida . ' de Lunes/Viernes!');
            }
        }


        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user)
    {
        return redirect()->to('home')->with('success');
    }
}
