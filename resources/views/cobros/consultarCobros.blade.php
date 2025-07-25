@extends('layouts.consulta-master')
<title>Consultar Cobros</title>
@php
    use App\Models\clientes;
    use App\Models\cuentas;
    use App\Models\propiedades;
    use App\Models\facturas;
    use App\Models\detalle_factura;
@endphp

@section('content')

<div class="tab-nav">
    <a href="/home">Home</a>
    <label>/</label> 
    <a href="/consultarCobros"> Consulta de Cobros</a>
</div>

@if (Session::get('success', false))
    @include('layouts.partials.messages')
@endif

<div class="row">
    <div class="col">
        <h3>Consulta de Cobros</h3>
    </div>

    <div class="col">
        <div class="button-group">  
            <div class="buttons" id="buttons" style="text-align: right;"></div>
        </div>
    </div>

    <div class="col-2">
        <div class="button-group" style="text-align: right;">  
            {{-- <button id="imprimir" class="btn btn-primary shadow-none" style="background: #1E88E5;"><i class="fas fa-file-pdf"></i> Impirmir</button> --}}
            <button type="reset" class="btn btn-primary shadow-none" style="background: #1976D2;"><i class="fa-solid fa-arrow-rotate-left"></i> Limpiar</button>
            <a href="{{ url('Cobros') }}" type="button" class="btn btn-primary shadow-none" style="background: #208b3a;"><i class="fa-solid fa-circle-plus"></i> Nuevo Cobro</a>
        </div>
    </div>
</div>

<table id="dataTable" class="table table-striped table-hover table-borderless align-middle">
    <thead>
        <tr>
            <th>NO. Cobro</th>
            <th>Cuenta</th>
            <th>Cliente</th>
            <th>NO. Factura</th>
            <th>Concepto</th>
            <th>Forma de pago</th>
            <th>Monto pagado</th>
            <th>Cobrado</th>
            <th>Devuelta</th>
            <th>Fecha emision</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cobros as $cobro)
            @php
                $factura = facturas::where('numfac', $cobro->numfac)->first();
                $detalle = detalle_factura::where('numfac', $factura->numfac)->first();
                $propiedad = propiedades::where('codpro', $detalle->codpro)->first();
                $cuenta = cuentas::where('codcue', $cobro->codcue)->first();
                $cliente = clientes::where('codcli', $cuenta->codcli)->first();
                
            @endphp
            <tr>
                <td scope="row">{{ $cobro->codcob }}</td>
                <td scope="row">{{ $cobro->codcue }}</td>
                <td>{{ $cliente->codcli.'-' .$cliente->nomcli. ' '.$cliente->apecli }}</td>
                <td>{{ $factura->numfac }}</td>
                <td>{{ $detalle->concepto }}</td>
                <td>{{ $cobro->form_pag }}</td>
                <td>{{ 'US$'. number_format($cobro->montpag, 2, '.', ',')}}</td>
                <td>{{'US$'. number_format($cobro->cobrado, 2, '.', ',') }}</td>
                <td>{{'US$'. number_format($cobro->devuelta, 2, '.', ',')  }}</td>
                <td>{{ date("d/m/Y", strtotime($cobro->fecemi)) }}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    text: '<i class="fa-solid fa-file-excel"></i> Excel',
                    title: 'Reporte de Cobros',
                } 
            ]
        });

        table.buttons().container()
        .appendTo("#buttons");

        document.querySelectorAll('#imprimir').forEach(function(element) {
            element.addEventListener('click', function() {
                print();
            });
        });
    });
</script>

@endsection