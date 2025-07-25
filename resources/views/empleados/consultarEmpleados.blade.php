@extends('layouts.consulta-master')
<title>Consulta de Empleados</title>

@php
    use App\Models\tipo_empleados;
    use App\Models\posiciones_empleado;
@endphp

@section('content')

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label>/</label> 
        <a href="/consultarEmpleados"> Consulta de Empleados</a>
    </div>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="row">
        <div class="col">
            <h3>Consulta de empleados</h3>
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
                <a href="{{ url('registrarEmpleados') }}" type="button" class="btn btn-primary shadow-none" style="background: #208b3a;"><i class="fa-solid fa-circle-plus"></i> Nuevo Empleado</a>
            </div>
        </div>
    </div>

    <table id="dataTable" class="table table-striped table-hover table-borderless align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Direccion</th>
                <th>Correo</th>
                <th>Cedula/RNC</th>
                <th>Tipo (Empleado)</th>
                <th>Posicion</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Estado</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td scope="row">{{ $empleado->codemp }}</td>
                    <td>{{ $empleado->nomemp }}</td>
                    <td>{{ $empleado->apeemp }}</td>
                    <td>{{ $empleado->telem1 }}</td>
                    <td>{{ $empleado->telem2 }}</td>
                    <td>{{ $empleado->direccion }}</td>
                    <td>{{ $empleado->correo }}</td>
                    <td>{{ $empleado->cedula }}</td>
                    @php
                        $tipo_emp = tipo_empleados::where('ctipemp',$empleado->ctipemp)->first();
                    @endphp
                    <td>{{ $tipo_emp->descripcion }}</td>
                    @php
                        $pos_emp = posiciones_empleado::where('codpos',$empleado->codpos)->first();
                    @endphp
                    <td>{{ $pos_emp->posicion }}</td> 
                    <td>{{ $empleado->hora_entrada }}</td> 
                    <td>{{ $empleado->hora_salida }}</td> 
                    @if($empleado->estemp == 'inactivo')
                        <td><li class="btn btn-warning">{{ $empleado->estemp}}</li></td>
                    @elseif($empleado->estemp == 'activo')
                        <td><li class="btn btn-success">{{ $empleado->estemp}}</li></td>
                    @endif 
                      
                    
                    <td>
                        <a href='editarEmpleado?empleado={{ $empleado->codemp }}' class="btn btn-warning btn-editar"><i class="fas fa-file-edit"></i></a>
                        <a href="{{ route('inhabilitarEmpleado', ['id' => $empleado->codemp]) }}" class="btn btn-danger btn-editar"><i class="fas fa-ban"></i></a>
                    </td>
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
                        extend: 'print',
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        title: ' ',
                        customize: function ( win ) {
                            $(win.document.body)
                                .css( 'font-size', '7px')
                                .prepend(
                                    '<div>xxxxxxxxxxxxxxxxxxxxxxxx</div>',
                                    '<img src="{{ url("assets/img/Solo_Logo.png")}}" style="position:absolute; top:10; left:10; opacity:0.6; " />'
                                );
        
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fa-solid fa-file-excel"></i> Excel',
                        title: 'Reporte de Empleados',
                    } 
                    {
                        extend: 'csv',
                        text: '<i class="fa-solid fa-file-excel"></i> Excel',
                        title: 'Reporte de Empleados',
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