<?php

namespace App\Http\Controllers;

use App\Http\Requests\facturaRequest;
use App\Models\clientes;
use App\Models\cotizaciones;
use App\Models\cuentas;
use App\Models\detalle_cotizacion;
use App\Models\detalle_factura;
use App\Models\direcciones;
use App\Models\facturas;
use App\Models\pago;
use App\Models\propiedades;
use App\Models\tipo_clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class facturaController extends Controller
{
    public function create()
    {
        //para las facturas
        $clientes = clientes::where('codtpcli', '1')->where('estcli', 'activo')->get();
        $propiedades = propiedades::join('itbis', 'propiedades.citbis', '=', 'itbis.citbis')
            ->select('itbis.itbis', 'propiedades.codpro', 'propiedades.titulo', 'propiedades.preven', 'propiedades.preren')
            ->where('propiedades.estpro', 'activo')->get();
        $cotizaciones = cotizaciones::where('estcot', 'Por Facturar')->get();
        $tipo_clientes = tipo_clientes::all();

        return view('facturas.Facturacion', compact(['clientes', 'propiedades', 'tipo_clientes', 'cotizaciones']));
    }

    public function save(Request $request)
    {
        $codcli = $request->codcli;
        $condicion = $request->condicion;

        $facturas = guardarFactura($request);
        $numfac = $facturas->numfac;

        $detalle = guardarDetalle($request, $numfac);

        $cuenta = actualizarCuenta($request, $codcli, $condicion);

        //Actualizar estado factura
        $propiedad = propiedades::where('codpro', $request->codpro)->first();
        $propiedad->estpro = 'Vendida';
        $propiedad->save();

        //Actualizar estado cotizacion
        if ($request->numcot != '') {
            $cotizacion = cotizaciones::where('numcot', $request->numcot)->first();
            $detalleC = detalle_cotizacion::where('numcot', $request->numcot)->first();
            if ($cotizacion->codcli == $codcli && $detalleC->codpro == $request->codpro) {
                $cotizacion->estcot = 'Facturado';
                $cotizacion->save();
            }
        }


        //Datos a mandar a los reportes
        $cliente = clientes::where('codcli', $codcli)->first();
        $propiedad1 = propiedades::join('itbis', 'propiedades.citbis', '=', 'itbis.citbis')
            ->select('itbis.itbis', 'propiedades.codpro', 'propiedades.titulo', 'propiedades.preven', 'propiedades.preren')
            ->where('propiedades.codpro', $propiedad->codpro)->first();
        $clienteVendedor = clientes::where('codcli', $propiedad->codcli)->first();
        $direccion = direcciones::where('codpro', $propiedad->codpro)->first();

        return redirect()->to('/reporteFactura')->with([
            'cliente' => $cliente,
            'clienteVendedor' => $clienteVendedor,
            'direccion' => $direccion,
            'propiedad' => $propiedad1,
            'facturas' => $facturas,
            'detalle' => $detalle
        ]);

        /* $pdf = App::make('dompdf.wrapper'); */
        /* return FacadePdf::loadView('reportes.reporteFactura', compact(['cliente', 'propiedad1', 'facturas', 'detalle']))
            ->setOption('enable_remote', true)
            ->download('Reporte Factura No. #' . $numfac . '.pdf');*/
    }

    public function query()
    {
        $datos['facturas'] = facturas::where('estfac', 'Pendiente')->get();
        return view('facturas.consultarFacturas', $datos);
    }
}

function guardarFactura($request)
{
    //Guardar Factura
    $facturas = new facturas();
    $facturas->codcli = $request->codcli;
    $facturas->codusu = Auth::user()->id;
    $facturas->condicion = $request->condicion;
    $facturas->subtot = priceToFloat($request->subtot);
    $facturas->total = priceToFloat($request->total);
    $facturas->form_pag = $request->form_pag;
    $facturas->fecvenc = date("Y-m-d h:i", strtotime(date("Y-m-d h:i") . "+ 30 days"));
    $facturas->observaciones = $request->observaciones;
    if ($request->condicion == 'Financiamiento') {
        $facturas->estfac = 'Pendiente';
    } else {
        $facturas->estfac = 'Completada';
    }
    $facturas->save();
    return $facturas;
}

function guardarDetalle($request, $numfac)
{
    //Guardar Detalle
    $detalle = new detalle_factura();

    $detalle->numfac = $numfac;
    $detalle->codpro = $request->codpro;
    $detalle->concepto = $request->concepto;
    $detalle->cantidad = $request->cantidad;
    $detalle->precio = priceToFloat($request->subtot);

    $detalle->save();
    return $detalle;
}

function actualizarCuenta($request, $codcli, $condicion)
{
    //Crear/Actualizar Cuentas
    $cuenta = cuentas::where('codcli', $codcli)->first();
    $cuentas = new cuentas();
    if (is_null($cuenta) && $condicion == 'Financiamiento') {
        $cuentas->codcli = $codcli;
        $cuentas->balance = priceToFloat($request->total) - priceToFloat($request->total) * 0.20;
        $cuentas->totpag = 0;
        $cuentas->balpend = priceToFloat($request->total) - priceToFloat($request->total) * 0.20;
        $cuentas->estcue = 'Pendiente';
        $cuentas->save();
    } else if ($condicion == 'Financiamiento') {
        $cuenta->balance = (priceToFloat($cuenta->balance) + priceToFloat($request->total)) - priceToFloat($request->total) * 0.20;
        $cuenta->balpend = (priceToFloat($cuenta->balpend) + priceToFloat($request->total)) - priceToFloat($request->total) * 0.20;
        $cuenta->estcue = 'Pendiente';
        $cuenta->save();
    } else {
        if (is_null($cuenta)) {
            $cuentas->codcli = $codcli;
            $cuentas->balance = priceToFloat($request->total);
            $cuentas->totpag = priceToFloat($request->total);
            $cuentas->balpend = 0;
            $cuentas->estcue = 'Completada';
            $cuentas->save();
        }
    }

    return $cuentas;
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
