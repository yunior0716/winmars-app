<?php

namespace App\Http\Controllers;

use App\Http\Requests\citasRequest;
use App\Models\citas;
use App\Models\solicitudes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class citasController extends Controller
{
    public function show()
    {
        return view('citas.registrarCitas');
    }

    public function create(citasRequest $request)
    {
        $cita = citas::create($request->validated());

        return redirect()->to('registrarCitas')->with('success', 'Formulario enviado correctamente!');
    }

    public function query()
    {
        $datos['citas'] = citas::where('estcit', 'Pendiente')->get();
        return view('citas.consultarCitas', $datos);
    }

    public function edit()
    {
        $cita = citas::find($_GET['cita']);
        return view('citas.editarCitas', compact('cita'));
    }

    public function update(citasRequest $request)
    {
        $cita = citas::find($request->codcit);

        $cita->codsol = $request->codsol;
        $cita->codusu = $request->codusu;
        $cita->fecha = $request->fecha;
        $cita->descrip = $request->descrip;
        $cita->estcit = $request->estcit;

        $cita->save();
        return redirect('consultarCitas')->with('success', 'Edicion realizada correctamente');
    }

    public function agendar(citasRequest $request)
    {
        $citas = new citas();

        $citas->codsol = $request->input('codsol');
        $citas->codusu = $request->input('codusu');
        $citas->fecha = $request->input('fecha');
        $citas->descrip = $request->input('descrip');
        $citas->estcit = $request->input('estcit');

        $citas->save();

        $solicitud = solicitudes::find($request->input('codsol'));

        $solicitud->estsol = 'Aprobada';
        $solicitud->save();
        return redirect('consultarCitas')->with('success', 'Cita agendada correctamente');
    }

    public function approve()
    {
        $codsol = $_GET['solicitud'];
        return view('citas.agendarCita', compact('codsol'));
    }
}
