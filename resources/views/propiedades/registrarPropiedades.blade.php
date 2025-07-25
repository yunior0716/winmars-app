@extends('layouts.formulario-master')
<title>Registro de Propiedades</title>

@php
    use App\Models\clientes;
    use App\Models\tipo_propiedades;
    use App\Models\itbis;
@endphp

@section('content')

    <div class="tab-nav">
        <a href="{{ url()->previous() }}">Atras</a>
        <label>/</label> 
        <a> Formulario de Propiedades</a>
    </div>

    <h3>Formulario de Propiedades</h3>

    <form action="/registrarPropiedades" method="POST" enctype="multipart/form-data">
        @csrf

        @if (Session::get('success', false))
        @include('layouts.partials.messages')
          @endif
        
        <div class="mb-3">
            <label for="titulo">Titulo/nombre</label>
            <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" placeholder="Ingrese el Titulo/Nombre...">
            @error('titulo')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="descrip">Descripcion</label>
            <textarea type="text" class="form-control" name="descrip" rows="4" placeholder="Ingrese la descripcion...">{{ old('descrip') }}</textarea>
            @error('descrip')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="direccion">Direccion</label>
            <textarea type="text" class="form-control" name="direccion" rows="3" placeholder="Ingrese la direccion...">{{ old('direccion') }}</textarea>
            @error('direccion')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="row" style="margin-bottom: 12px;">
            <div class="col">
                <label for="ciudad">Provincia</label>
                <input type="text" class="form-control" name="ciudad" value="{{ old('ciudad') }}" placeholder="Ingrese el ciudad...">
                @error('ciudad')
                    @include('layouts.partials.messages')
                @enderror
            </div>
            <div class="col">
                <label for="municipio">Municipio</label>
                <input type="text" class="form-control" name="municipio" value="{{ old('municipio') }}" placeholder="Ingrese el municipio...">
                @error('municipio')
                    @include('layouts.partials.messages')
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="fotos">Fotos</label>
            <input type="file" class="form-control" name="fotos[]" accept="image/*" multiple="multiple">
            @error('fotos')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="row" style="margin-bottom: 12px;">
            <div class="col">
                <label for="habit">Habitaciones</label>
                <input type="number" min="0" class="form-control" name="habit" value="{{ old('habit') }}" placeholder="Numero de habitaciones...">
                @error('habit')
                    @include('layouts.partials.messages')
                @enderror
            </div>
            <div class="col">
                <label for="baños">Baños</label>
                <input type="number" min="0" class="form-control" name="baños" value="{{ old('baños') }}" placeholder="Numero de baños...">
                @error('baños')
                    @include('layouts.partials.messages')
                @enderror
            </div>
        </div>

        <div class="row" style="margin-bottom: 12px;">
            <div class="col">
                <label for="metros">Metros</label>
                <input type="text" class="form-control" name="metros" value="{{ old('metros') }}" placeholder="Metros...">
                @error('metros')
                    @include('layouts.partials.messages')
                @enderror
            </div>
            <div class="col">
                <label for="parqueo">Parqueos</label>
                <input type="number" min="0" class="form-control" name="parqueo" value="{{ old('parqueo') }}" placeholder="Numero de parqueos...">
                @error('parqueo')
                    @include('layouts.partials.messages')
                @enderror
            </div>
        </div>

        <div class="row" style="margin-bottom: 12px;">
            <div class="col">
                <label for="preven">Precio de venta</label>
                <input type="text" class="form-control" name="preven" value="{{ old('preven') }}" placeholder="Ingrese precio de venta...">
                @error('preven')
                    @include('layouts.partials.messages')
                @enderror
            </div>
            <div class="col">
                <label for="preren">Precio de renta</label>
                <input type="text" class="form-control" name="preren" value="{{ old('preren') }}" placeholder="Ingrese precio de renta...">
                @error('preren')
                    @include('layouts.partials.messages')
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="comision">Comision(ganacia)</label>
            <input type="number" min="1" max="5" class="form-control" name="comision" value="{{ old('comision') }}" placeholder="Ingrese comision...">
            @error('comision')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <input type="hidden" name="codcli" id="codcli" value="{{ old('codcli') }}">
            <label for="codcli">Cliente</label>
            <div class="input-group">
                <input type="text" class="form-control" value="{{ old('nomcli') }}" id="nomcli" name="nomcli" readonly>
                <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" id="buscar-cli" data-bs-toggle="modal" data-bs-target="#buscarClienteModal"><i class="fas fa-search"></i></button>  
            </div>
            @error('codcli')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <input type="hidden" name="codtpro" id="codtpro" value="{{ old('codtpro') }}">
            <label for="codtpro">Tipo de Propiedad</label>
            <div class="input-group">
                <input type="text" class="form-control" value="{{ old('tippro') }}" id="tippro" name="tippro" readonly>
                <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" id="buscar-tpro" data-bs-toggle="modal" data-bs-target="#tipoPropiedadModal"><i class="fas fa-search"></i></button>  
            </div>
            @error('codtpro')
                @include('layouts.partials.messages')
            @enderror  
        </div>

        <div class="mb-3">
            <input type="hidden" name="citbis" id="citbis" value="{{ old('citbis') }}">
            <label for="citbis">Itbis</label>
            <div class="input-group">
                <input type="text" class="form-control" value="{{ old('itbis') }}" id="itbis" name="itbis" readonly>
                <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" id="buscar-itb" data-bs-toggle="modal" data-bs-target="#itbisModal"><i class="fas fa-search"></i></button>  
            </div>
            @error('citbis')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <input type="hidden" class="form-control" name="estpro" value="activo">

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
                    @include('layouts.modals.seleccionarCliente')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
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

    <div class="modal fade" id="itbisModal" role="dialog" tabindex="-1" aria-labelledby="Seleccionar itbis" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Seleccionando Itbis</h3>
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
                                    <th scope="col">Itbis</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($itbis as $itb)
                                    <tr>
                                        <td scope="row">{{$itb->citbis}}</td>
                                        <td>{{$itb->itbis}}</td>

                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectItbis('{{$itb->citbis}}', '{{$itb->itbis}}')">
                                                <i class="fa-solid fa-check"></i>
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
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript"> 
        function selectItbis(citbis, itbis){
            document.getElementById('citbis').value = citbis;
            document.getElementById('itbis').value = itbis;
        }
    </script>

    <div class="modal fade" id="tipoPropiedadModal" role="dialog" tabindex="-1" aria-labelledby="Seleccionar tipo propiedad" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Seleccionando Tipo de Propiedad</h3>
                    <button type="button" class="btn btn-primary" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <table class="table table-responsive" id="dataTable2">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tipo de Propiedad</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tipo_propiedades as $tpropiedad)
                                    <tr>
                                        <td scope="row">{{$tpropiedad->codtpro}}</td>
                                        <td>{{$tpropiedad->tippro}}</td>

                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectTPropiedad('{{$tpropiedad->codtpro}}', '{{$tpropiedad->tippro}}')">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#dataTable2').DataTable();
                            });
                        </script>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript"> 
        function selectTPropiedad(codtpro, tippro){
            document.getElementById('codtpro').value = codtpro;
            document.getElementById('tippro').value = tippro;
        }
    </script>

@endsection