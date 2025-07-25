@extends('layouts.consulta-master')
<title>Consulta de Solicitudes</title>

@php
    use App\Models\clientes;
    use App\Models\propiedades;
@endphp

@section('content')

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label>/</label> 
        <a href="/consultarSolicitudes"> Consulta de Solicitudes</a>
    </div>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <div class="row">
        <div class="col">
            <h3>Consulta de Solicitudes</h3>
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
                <th>Cliente</th>
                <th>Propiedad</th>
                <th>Comentario</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solicitudes as $solicitud)
                <tr>
                    <td scope="row">{{ $solicitud->codsol }}</td>
                    @php $clientes = clientes::where('codcli',$solicitud->codcli)->first() @endphp
                    <td>{{ $clientes->codcli. ' - ' .$clientes->nomcli. '  ' .$clientes->apecli }}</td>
                    @php $propiedad = propiedades::where('codpro',$solicitud->codpro)->first() @endphp
                    <td>{{ $propiedad->codpro. ' - ' .$propiedad->titulo }}</td>
                    <td>{{ $solicitud->comentario }}</td>
                    <td>{{ $solicitud->fecha }}</td>
                    @if($solicitud->estsol == 'Pendiente')
                        <td><li class="btn btn-warning">{{ $solicitud->estsol}}</li></td>
                    @elseif($solicitud->estsol == 'Procesada')
                        <td><li class="btn btn-success">{{ $solicitud->estsol}}</li></td>
                    @endif
                    
                    <td>
                        <a href='editarSolicitudes?solicitud={{ $solicitud->codsol }}' class="btn btn-warning btn-editar"><i class="fas fa-file-edit"></i></a>
                        <a href="{{ route('rechazarSolicitud', ['id' => $solicitud->codsol]) }}" class="btn btn-danger btn-editar"><i class="fas fa-ban"></i></a>
                        <a href='aprobarSolicitud?solicitud={{ $solicitud->codsol }}' class="btn btn-success btn-editar"><i class="fas fa-check"></i></a>
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
                                    '<img src="assets/img/Solo logo.png" style="position:absolute; top:10; left:10; opacity:0.6; " />'
                                );
        
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fa-solid fa-file-excel"></i> Excel',
                        title: 'Reporte de Solicitudes',
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