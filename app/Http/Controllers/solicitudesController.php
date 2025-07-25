<?php

namespace App\Http\Controllers;

use App\Http\Requests\solicitudesRequest;
use App\Models\clientes;
use App\Models\propiedades;
use App\Models\solicitudes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class solicitudesController extends Controller
{
    public function show()
    {
        $clientes = clientes::where('estcli', 'activo')->get();
        $propiedades = propiedades::where('estpro', 'activo')->get();
        return view('solicitudes.registrarSolicitudes', compact(['clientes', 'propiedades']));
    }

    public function create(solicitudesRequest $request)
    {
        $solicitud = solicitudes::create($request->validated());

        return redirect('registrarSolicitudes')->with('success', 'Formulario enviado correctamente!');
    }

    public function query()
    {
        $datos['solicitudes'] = solicitudes::where('estsol', 'Pendiente')->get();
        return view('solicitudes.consultarSolicitudes', $datos);
    }

    public function edit()
    {
        $solicitud = solicitudes::find($_GET['solicitud']);
        return view('solicitudes.editarSolicitudes', compact('solicitud'));
    }

    public function update(solicitudesRequest $request)
    {
        $solicitud = solicitudes::find($request->codsol);

        $solicitud->codcli = $request->input('codcli');
        $solicitud->codpro = $request->input('codpro');
        $solicitud->comentario = $request->input('comentario');


        $solicitud->save();
        return redirect('consultarSolicitudes')->with('success', 'Edicion realizada correctamente');
    }

    public function delete($id)
    {
        $solicitud = solicitudes::find($id);

        $solicitud->estsol = 'Rechazada';
        $solicitud->save();

        return redirect('consultarSolicitudes')->with('sucess', 'Solicitud rechazada correctamente');
    }

    public function approve($id)
    {
        $solicitud = solicitudes::find($id);

        $solicitud->estsol = 'Aprobada';
        $solicitud->save();
    }
}
