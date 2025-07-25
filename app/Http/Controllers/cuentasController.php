<?php

namespace App\Http\Controllers;

use App\Models\cuentas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cuentasController extends Controller
{

    public function query()
    {
        $cuentas = cuentas::where('estcue', 'Pendiente')->get();
        return view('consultarCuentas', compact('cuentas'));
    }
}
