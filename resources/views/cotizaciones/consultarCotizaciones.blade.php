@extends('layouts.consulta-master')
<title>Consultar Cotizaciones</title>
@php
    use App\Models\clientes;
    use App\Models\detalle_cotizacion;
    use App\Models\propiedades;
    use App\Models\User;
@endphp

@section('content')

<div class="tab-nav">
    <a href="/home">Home</a>
    <label>/</label> 
    <a href="/consultarCotizaciones"> Consulta de Cotizaciones</a>
</div>

@if (Session::get('success', false))
    @include('layouts.partials.messages')
@endif

<div class="row">
    <div class="col">
        <h3>Consulta de Cotizaciones</h3>
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
            <a href="{{ url('Cotizacion') }}" type="button" class="btn btn-primary shadow-none" style="background: #208b3a;"><i class="fa-solid fa-circle-plus"></i> Nueva Cotizacion</a>
        </div>
    </div>
</div>

<table id="dataTable" class="table table-striped table-hover table-borderless align-middle">
    <thead>
        <tr>
            <th>NO. Cotizacion</th>
            <th>Cliente</th>
            <th>Propiedad</th>
            <th>Usuario</th>
            <th>Condicion</th>
            <th>Concepto</th>
            <th>Subtotal</th>
            <th>Total</th>
            <th>Fecha vencimiento</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cotizaciones as $cotizacion)
            @php
                $detalle = detalle_cotizacion::where('numcot', $cotizacion->numcot)->first();
                $propiedad = propiedades::where('codpro', $detalle->codpro)->first();
                $cliente = clientes::where('codcli', $cotizacion->codcli)->first();
            @endphp
            <tr>
                <td scope="row">{{ $cotizacion->numcot }}</td>
                <td>{{ $cliente->codcli.'-' .$cliente->nomcli. ' '.$cliente->apecli }}</td>
                <td>{{ $propiedad->codpro. ' '. $propiedad->titulo }}</td>
                <td>{{ $cotizacion->codusu }}</td>
                <td>{{ $cotizacion->condicion }}</td>
                <td>{{ $detalle->concepto }}</td>
                <td>{{'US$'. number_format($cotizacion->subtot, 2, '.', ',') }}</td>
                <td>{{'US$'. number_format($cotizacion->total, 2, '.', ',')  }}</td>
                <td>{{ date("d/m/Y", strtotime($cotizacion->fecvenc)) }}</td>
                @if($cotizacion->estcot == 'Por Facturar')
                    <td><li class="btn btn-warning">{{ $cotizacion->estcot}}</li></td>
                @elseif($cotizacion->estcot == 'Facturado')
                    <td><li class="btn btn-success">{{ $cotizacion->estcot}}</li></td>
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
                    title: 'Reporte de Cotizaciones',
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