@extends('layouts.consulta-master')
<title>Consultar Facturas</title>
@php
    use App\Models\clientes;
    use App\Models\detalle_factura;
    use App\Models\propiedades;
    use App\Models\User;
@endphp

@section('content')

<div class="tab-nav">
    <a href="/home">Home</a>
    <label>/</label> 
    <a href="/consultarFacturas"> Consulta de Facturas</a>
</div>

@if (Session::get('success', false))
    @include('layouts.partials.messages')
@endif

<div class="row">
    <div class="col">
        <h3>Consulta de Facturas</h3>
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
            <a href="{{ url('Facturacion') }}" type="button" class="btn btn-primary shadow-none" style="background: #208b3a;"><i class="fa-solid fa-circle-plus"></i> Nueva Factura</a>
        </div>
    </div>
</div>

<table id="dataTable" class="table table-striped table-hover table-borderless align-middle">
    <thead>
        <tr>
            <th>NO. Factura</th>
            <th>Cliente</th>
            <th>Propiedad</th>
            <th>Usuario</th>
            <th>Condicion</th>
            <th>Concepto</th>
            <th>Subtotal</th>
            <th>Total</th>
            <th>Forma de pago</th>
            <th>Fecha vencimiento</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($facturas as $factura)
            @php
                $detalle = detalle_factura::where('numfac', $factura->numfac)->first();
                $propiedad = propiedades::where('codpro', $detalle->codpro)->first();
                $cliente = clientes::where('codcli', $factura->codcli)->first();
            @endphp
            <tr>
                <td scope="row">{{ $factura->numfac }}</td>
                <td>{{ $cliente->codcli.'-' .$cliente->nomcli. ' '.$cliente->apecli }}</td>
                <td>{{ $propiedad->codpro. ' '. $propiedad->titulo }}</td>
                <td>{{ $factura->codusu }}</td>
                <td>{{ $factura->condicion }}</td>
                <td>{{ $detalle->concepto }}</td>
                <td>{{'US$'. number_format($factura->subtot, 2, '.', ',') }}</td>
                <td>{{'US$'. number_format($factura->total, 2, '.', ',')  }}</td>
                <td>{{ $factura->form_pag }}</td>
                <td>{{ date("d/m/Y", strtotime($factura->fecvenc)) }}</td>
                @if($factura->estfac == 'Pendiente')
                    <td><li class="btn btn-warning">{{ $factura->estfac}}</li></td>
                @elseif($factura->estfac == 'Completada')
                    <td><li class="btn btn-success">{{ $factura->estfac}}</li></td>
                @endif 
                
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
                    title: 'Reporte de Facturas',
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