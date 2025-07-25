@extends('layouts.consulta-master')
<title>Consulta de Clientes</title>

@php
    use App\Models\tipo_clientes;
@endphp

@section('content')

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label>/</label> 
        <a href="/consultarClientes"> Consulta de Clientes</a>
    </div>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="row">
        <div class="col">
            <h3>Consulta de Clientes</h3>
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
                <a href="{{ url('registrarClientes') }}" type="button" class="btn btn-primary shadow-none" style="background: #208b3a;"><i class="fa-solid fa-circle-plus"></i> Nuevo Cliente</a>
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
                <th>Tipo (Cliente)</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td scope="row">{{ $cliente->codcli }}</td>
                    <td>{{ $cliente->nomcli }}</td>
                    <td>{{ $cliente->apecli }}</td>
                    <td>{{ $cliente->tecli1 }}</td>
                    <td>{{ $cliente->tecli2 }}</td>
                    <td>{{ $cliente->dircli }}</td>
                    <td>{{ $cliente->corcli }}</td>
                    <td>{{ $cliente->cedrnc }}</td>
                    @php $tipcli = tipo_clientes::where('codtpcli',$cliente->codtpcli)->first() @endphp
                    <td>{{ $tipcli->codtpcli.' - '.$tipcli->tipcli }}</td>
                    @if($cliente->estcli == 'inactivo')
                        <td><li class="btn btn-warning">{{ $cliente->estcli}}</li></td>
                    @elseif($cliente->estcli == 'activo')
                        <td><li class="btn btn-success">{{ $cliente->estcli}}</li></td>
                    @endif 
                    
                    <td>
                        <a href='editarCliente?cliente={{$cliente->codcli}}' role="button" class="btn btn-warning btn-editar"><i class="fas fa-file-edit"></i></a>
                        <a href="{{ route('inhabilitarCliente', ['id' => $cliente->codcli]) }}" role="button" class="btn btn-danger btn-editar"><i class="fas fa-ban"></i></a>
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
                                .css( 'font-size', '11px' )
                                .prepend(
                                    '<img src="{{ url("assets/img/Solo_logo.png") }}" style="position:absolute; top:10; left:10; opacity:0.6; " />'
                                );
        
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fa-solid fa-file-excel"></i> Excel',
                        title: 'Reporte de Clientes',
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