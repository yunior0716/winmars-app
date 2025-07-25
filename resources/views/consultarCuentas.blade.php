@extends('layouts.consulta-master')
<title>Consultar Cuentas</title>

@php
    $rol = auth()->user()->rol;
    use App\Models\clientes;
@endphp

@section('content')

@if($rol == 'Administrador' || $rol == 'Usuario')
     
    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Reporte de Cuentas</label>
    </div>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="row">
        <div class="col">
            <h3>Reporte de Cuentas</h3>
        </div>
        <div class="col">
            <div class="button-group" style="text-align: right;">
                <button type="button" class="btn btn-primary shadow-none" style="background: #0ead69;"><i class="fas fa-file-pdf"></i> Print</button>
                <button type="reset" class="btn btn-primary shadow-none" style="background: #1976D2;"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            </div>
        </div>
    </div>

    <table id="dataTable" class="table table-striped table-hover table-borderless align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Balance</th>
                <th>Total Pagado</th>
                <th>Balance Pendiente</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cuentas as $cuenta)
                <tr>
                    <td scope="row">{{ $cuenta->codcue }}</td>
                    @php $clientes = clientes::where('codcli',$cuenta->codcli)->first() @endphp
                    <td>{{ $clientes->codcli. ' - ' .$clientes->nomcli. '  ' .$clientes->apecli }}</td>
                    <td>{{ $cuenta->balance }}</td>
                    <td>{{ $cuenta->totpag }}</td>
                    <td>{{ $cuenta->balpend }}</td>
                    @if($cuenta->estcue == 'Pendiente')
                        <td><li class="btn btn-warning">{{ $cuenta->estcue}}</li></td>
                    @elseif($cuenta->estcue == 'Completada')
                        <td><li class="btn btn-success">{{ $cuenta->estcue}}</li></td>
                    @endif

                    <td>
                        <a href='Cobros' class="btn btn-success btn-editar"><i class="fa-solid fa-check"></i> Pagar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

@else
    <h3>No puede acceder a esta pagina, retornar a <a href="/home">Home</a></h3>
@endif

@endsection