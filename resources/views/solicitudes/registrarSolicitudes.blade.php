@extends('layouts.formulario-master')
<title>Registro de Solicitudes</title>

@section('content')
    
    <div class="tab-nav">
        <a href="{{ url()->previous() }}">Atras</a>
        <label>/</label> 
        <a> Formulario de Solicitudes</a>
    </div>

    <h3>Enviar Solicitud</h3>

    <form action="/registrarSolicitudes" method="POST">
        @csrf

        @if (Session::get('success', false))
            @include('layouts.partials.messages')
        @endif

        <div class="mb-3">
            <input type="hidden" name="codcli" id="codcli" value="{{ old('codcli') }}">
            <label for="codcli" class="form-label">Cliente</label>
            <div class="input-group">
                <input type="text" class="form-control" value="{{ old('nomcli') }}" id="nomcli" name="nomcli" readonly>
                <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" data-bs-toggle="modal" data-bs-target="#buscarClienteModal"><i class="fas fa-search"></i></button>  
            </div>
            @error('codcli')
                @include('layouts.partials.messages')
            @enderror
        </div>
        
        <div class="mb-3">
            <input type="hidden" name="codpro" id="codpro" value="{{ old('codpro') }}">
            <label for="codpro" class="form-label">Propiedad</label>
            <div class="input-group">
                <input type="text" class="form-control" value="{{ old('titulo') }}" id="titulo" name="titulo" readonly>
                <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" data-bs-toggle="modal" data-bs-target="#buscarPropiedadModal"><i class="fas fa-search"></i></button>  
            </div>
            @error('codpro')
                @include('layouts.partials.messages')
            @enderror
        </div>
       

        <div class="mb-3">
            <label for="comentario">Comentario</label>
            <textarea type="text" class="form-control" rows="4" cols="50" name="comentario" placeholder="Escriba su comentario...">{{ old('comentario') }}</textarea>
            @error('comentario')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <input type="text" name="estsol" value="Pendiente" hidden>

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>

    <div class="modal fade" id="buscarClienteModal" role="dialog" tabindex="-1" aria-labelledby="Seleccionar cliente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Seleccionando Cliente</h3>
                    <button type="button" class="btn btn-primary" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <table class="table table-responsive" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Cedula</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                    <tr>
                                        <td scope="row">{{$cliente->codcli}}</td>
                                        <td>{{$cliente->nomcli.' '.$cliente->apecli}}</td>
                                        <td>{{$cliente->tecli1}}</td>
                                        <td>{{$cliente->cedrnc}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectCliente('{{$cliente->codcli}}','{{$cliente->nomcli}}','{{$cliente->apecli}}')">
                                                <i class="fas fa-hand-pointer"></i>
                                            </button>
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript"> 
        function selectCliente(codcli, nomcli, apecli){
            document.getElementById('codcli').value = codcli;
            document.getElementById('nomcli').value = nomcli+' '+apecli;
        }
    </script>

    <div class="modal fade" id="buscarPropiedadModal" tabindex="-1" role="dialog" aria-labelledby="Seleccionar Propiedad" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle1">Seleccionando Propiedad</h3>
                    <button type="button" class="btn btn-primary" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <table class="table table-responsive" id="dataTable1">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Habitaciones</th>
                                    <th scope="col">Baños</th>
                                    <th scope="col">Metros</th>
                                    <th scope="col">Parqueos</th>
                                    <th scope="col">Precio de venta</th>
                                    <th scope="col">Precio de renta</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($propiedades as $propiedad)
                                    <tr>
                                        <td scope="row">{{$propiedad->codpro}}</td>
                                        <td>{{$propiedad->titulo}}</td>
                                        <td>{{$propiedad->habit}}</td>
                                        <td>{{$propiedad->baños}}</td>
                                        <td>{{$propiedad->metros}}</td>
                                        <td>{{$propiedad->parqueo}}</td>
                                        <td>{{$propiedad->preven}}</td>
                                        <td>{{$propiedad->preren}}</td>

                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectPropiedad('{{$propiedad->codpro}}','{{$propiedad->titulo}}')">
                                                <i class="fas fa-hand-pointer"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#dataTable1').DataTable();
                            });
                        </script>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function selectPropiedad(codpro, titulo){
            document.getElementById('codpro').value = codpro;
            document.getElementById('titulo').value = titulo;
        }
    </script>

@endsection