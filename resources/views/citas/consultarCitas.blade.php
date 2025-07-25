@extends('layouts.consulta-master')
<title>Consulta de Citas</title>

@php
    use App\Models\empleados;
@endphp

@section('content')

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label>/</label> 
        <a href="/consultarCitas">Consulta de Citas</a>
    </div>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="row">
        <div class="col">
            <h3>Consulta de Citas</h3>
        </div>
        <div class="col">
            <div class="button-group" style="text-align: right;">
                <button type="button" class="btn btn-primary shadow-none" style="background: #1E88E5;"><i class="fas fa-file-pdf"></i> Print</button>
                <button type="reset" class="btn btn-primary shadow-none" style="background: #1976D2;"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
                <a href="{{ url('registrarCitas') }}" type="button" class="btn btn-primary shadow-none" style="background: #0ead69;"><i class="fa-solid fa-circle-plus"></i> Nueva Cita</a>
            </div>
        </div>
    </div>

    <table id="dataTable" class="table table-striped table-hover table-borderless align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Solicitud</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citas as $cita)
                <tr>
                    <td scope="row">{{ $cita->codcit }}</td>
                    <td>{{ $cita->codsol }}</td>
                    @php 
                        $empleado = empleados::where('codemp', auth()->user()->codemp)->first() 
                    @endphp
                    <td>{{ $empleado->codemp. ' - '. $empleado->nomemp. '  ' .$empleado->apeemp }}</td>
                    <td>{{ $cita->fecha }}</td>
                    <td>{{ $cita->descrip }}</td>
                    @if($cita->estcit == 'Pendiente')
                        <td><li class="btn btn-warning">{{ $cita->estcit}}</li></td>
                    @elseif($cita->estcit == 'Completada')
                        <td><li class="btn btn-success">{{ $cita->estcit}}</li></td>
                    @endif
                   
                    <td><a href='editarCitas?cita={{ $cita->codcit }}' class="btn btn-warning btn-editar"><i class="fas fa-file-edit"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

    
@endsection