<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reportesController extends Controller
{
    public function imprimirFactura()
    {
        return view('reportes.reporteFactura');
    }

    public function imprimirCotizacion()
    {
        return view('reportes.reporteCotizacion');
    }

    public function contratoInquilinato()
    {
        return view('reportes.contratoInquilinato');
    }

    public function contratoPromesa()
    {
        return view('reportes.contratoPromesa');
    }

    public function imprimirCobro()
    {
        return view('reportes.reporteCobro');
    }
}
