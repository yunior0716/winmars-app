<?php

namespace App\Http\Controllers;

use App\Http\Requests\cotizacionRequest;
use App\Models\clientes;
use App\Models\detalle_cotizacion;
use App\Models\cotizaciones;
use App\Models\propiedades;
use App\Models\tipo_clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cotizacionController extends Controller
{
    public function create()
    {
        $clientes = clientes::where('codtpcli', '1')->where('estcli', 'activo')->get();
        $propiedades = propiedades::join('itbis', 'propiedades.citbis', '=', 'itbis.citbis')
            ->select('itbis.itbis', 'propiedades.codpro', 'propiedades.titulo', 'propiedades.preven', 'propiedades.preren')
            ->where('propiedades.estpro', 'activo')->get();
        $tipo_clientes = tipo_clientes::all();
        return view('cotizaciones.Cotizacion', compact(['clientes', 'propiedades', 'tipo_clientes']));
    }

    public function save(cotizacionRequest $request)
    {

        $cotizacion = new cotizaciones();

        $cotizacion->codcli = $request->codcli;
        $cotizacion->codusu = Auth::user()->id;
        $cotizacion->condicion = $request->condicion;
        $cotizacion->subtot = priceToFloat($request->subtot);
        $cotizacion->total = priceToFloat($request->total);
        $cotizacion->fecvenc = date("Y-m-d h:i", strtotime(date("Y-m-d h:i") . "+ 30 days"));
        $cotizacion->observaciones = $request->observaciones;
        $cotizacion->estcot = 'Por Facturar';
        $cotizacion->save();
        $numcot = $cotizacion->numcot;

        $detalle = new detalle_cotizacion();

        $detalle->numcot = $numcot;
        $detalle->codpro = $request->codpro;
        $detalle->concepto = $request->concepto;
        $detalle->cantidad = $request->cantidad;
        $detalle->precio = priceToFloat($request->subtot);
        $detalle->save();


        $cliente = clientes::where('codcli', $request->codcli)->first();
        $propiedad1 = propiedades::join('itbis', 'propiedades.citbis', '=', 'itbis.citbis')
            ->select('itbis.itbis', 'propiedades.codpro', 'propiedades.titulo')
            ->where('propiedades.codpro', $request->codpro)
            ->first();

        /* $pdf = App::make('dompdf.wrapper'); */
        /* return FacadePdf::loadView('reportes.reporteFactura', compact(['cliente', 'propiedad1', 'facturas', 'detalle']))
            ->setOption('enable_remote', true)
            ->download('Reporte Factura No. #' . $numfac . '.pdf'); */
        return redirect()->to('/reporteCotizacion')->with([
            'cliente' => $cliente,
            'propiedad' => $propiedad1,
            'cotizacion' => $cotizacion,
            'detalle' => $detalle
        ]);
    }

    public function query()
    {
        $datos['cotizaciones'] = cotizaciones::where('estcot', 'Por Facturar')->get();
        return view('cotizaciones.consultarCotizaciones', $datos);
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
