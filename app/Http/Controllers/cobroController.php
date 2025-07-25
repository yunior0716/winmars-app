<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use App\Models\cobros;
use App\Models\cuentas;
use App\Models\detalle_factura;
use App\Models\facturas;
use App\Models\propiedades;
use App\Models\tipo_clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cobroController extends Controller
{
    public function show()
    {
        $clientes = clientes::where('codtpcli', '1')->where('estcli', 'activo')->get();
        $tipo_clientes = tipo_clientes::all();
        return view('cobros.Cobros', compact(['clientes', 'tipo_clientes']));
    }

    public function save(Request $request)
    {
        $factura = facturas::where('codcli', $request->codcli)->first();
        $detalle = detalle_factura::where('numfac', $factura->numfac)->first();
        $propiedad = propiedades::where('codpro', $detalle->codpro)->first();
        $cuenta = cuentas::where('codcue', $request->codcue)->first();
        $cliente =  clientes::where('codcli', $request->codcli)->first();

        $pago = new cobros();
        $pago->form_pag = $request->form_pag;
        $pago->codcue = $request->codcue;
        $pago->numfac = $factura->numfac;
        if ($request->form_pag == 'Transferencia') {
            $pago->cuenta_empresa = $request->cuenta_empresa;
            $pago->cuenta_cliente = $request->cuenta_cliente;
            $pago->banco = $request->banco;
        }
        $pago->montpag = priceToFloat($request->montpag);
        $pago->cobrado = priceToFloat($request->cobrado);
        $pago->devuelta = priceToFloat($request->devuelta);
        if (is_null($request->comentario)) {
            if ($detalle->concepto == 'Alquiler') {
                $pago->comentario = "Por concepto de: Pago mesualidad de alquiler de la propiedad No." . $propiedad->codpro;
            } else {
                $pago->comentario = "Por concepto de: Abono de financiemiento de la propiedad No." . $propiedad->codpro;
            }
        }
        $pago->save();

        $cuenta->totpag += priceToFloat($request->cobrado);
        $cuenta->balpend -= priceToFloat($request->cobrado);
        $cuenta->save();
        if ($cuenta->balpend <= 0) {
            $cuenta->estcue = "Completada";
            $cuenta->save();
            $factura->estfac = "Completada";
            $factura->save();
        }

        $fecha = date("Y-m-d", strtotime($factura->fecvenc));
        $factura->fecvenc = date("Y-m-d", strtotime($fecha . "+ 30 days"));
        $factura->save();

        return redirect()->to('/reporteCobro')->with([
            'cliente' => $cliente,
            'propiedad' => $propiedad,
            'pago' => $pago,
            'detalle' => $detalle
        ]);
    }

    public function query()
    {
        $datos['cobros'] = cobros::all();
        return view('cobros.consultarCobros', $datos);
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
