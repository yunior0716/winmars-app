<?php

namespace App\Http\Controllers;

use App\Http\Requests\propiedadesRequest;
use App\Models\propiedades;
use App\Models\clientes;
use App\Models\direcciones;
use App\Models\imagenes;
use App\Models\tipo_propiedades;
use App\Models\itbis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class propiedadesController extends Controller
{
    public function show()
    {
        $tipo_propiedades = tipo_propiedades::all();
        $clientes = clientes::where('codtpcli', '2')
            ->where('estcli', 'activo')
            ->get();
        $itbis = itbis::all();
        return view('propiedades.registrarPropiedades', compact(['tipo_propiedades', 'clientes', 'itbis']));
    }

    public function create(propiedadesRequest $request)
    {

        $propiedad = propiedades::create($request->validated());
        $codpro = $propiedad->codpro;

        if ($request->getMethod() !== 'PUT') {
            foreach ($request->file('fotos') as $foto) {
                $path = $foto->store('fotos');
                imagenes::create([
                    'codpro' => $codpro,
                    'url' => $path,
                    'descrip' => 'Foto propiedad no. ' . $codpro
                ]);
            }

            $direccion = new direcciones();
            $direccion->codpro = $codpro;
            $direccion->ciudad = $request->ciudad;
            $direccion->municipio = $request->municipio;
            $direccion->direccion = $request->direccion;
            $direccion->save();
        }

        return redirect('registrarPropiedades')->with('success', 'Formulario enviado correctamente!');
    }

    public function query()
    {
        $datos['propiedades'] = propiedades::where('estpro', 'activo')->get();
        return view('propiedades.consultarPropiedades', $datos);
    }

    public function edit()
    {
        $tipo_propiedades = tipo_propiedades::all();
        $clientes = clientes::where('codtpcli', '2')
            ->where('estcli', 'activo')
            ->get();
        $itbis = itbis::all();
        $propiedad = propiedades::find($_GET['propiedad']);
        return view('propiedades.editarPropiedades', compact(['tipo_propiedades', 'clientes', 'itbis', 'propiedad']));
    }

    public function update(propiedadesRequest $request)
    {
        $propiedad = propiedades::find($request->codpro);

        $propiedad->titulo = $request->input('titulo');
        $propiedad->descrip = $request->input('descrip');
        $propiedad->habit = $request->input('habit');
        $propiedad->baños = $request->input('baños');
        $propiedad->metros = $request->input('metros');
        $propiedad->parqueo = $request->input('parqueo');
        $propiedad->preven = priceToFloat($request->input('preven'));
        $propiedad->preren = priceToFloat($request->input('preren'));
        $propiedad->comision = $request->input('comision');
        $propiedad->codcli = $request->input('codcli');
        $propiedad->codtpro = $request->input('codtpro');
        $propiedad->citbis = $request->input('citbis');

        $propiedad->save();
        return redirect('consultarPropiedades')->with('success', 'Edicion realizada correctamente');
    }

    public function delete($id)
    {
        $propiedad = propiedades::find($id);

        $propiedad->estpro = 'inactivo';
        $propiedad->save();

        return redirect('consultarPropiedades')->with('success', 'Propiedad inhabilitada correctamente');
    }
}

function priceToFloat($s)
{
    // is negative number
    $neg = strpos((string)$s, '-') !== false;

    // convert "," to "."
    $s = str_replace(',', '.', $s);

    // remove everything except numbers and dot "."
    $s = preg_replace("/[^0-9\.]/", "", $s);

    // remove all seperators from first part and keep the end
    $s = str_replace('.', '', substr($s, 0, -3)) . substr($s, -3);

    // Set negative number
    if ($neg) {
        $s = '-' . $s;
    }

    // return float
    return (float) $s;
}
