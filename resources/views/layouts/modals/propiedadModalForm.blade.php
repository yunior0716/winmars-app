<div class="mb-3">
    <label for="titulo">Titulo/nombre</label>
    <input type="text" class="form-control" id="mtitulo" name="titulo" value="{{ old('mtitulo') }}" placeholder="Ingrese el Titulo/Nombre...">
    @error('titulo')
        @include('layouts.partials.messages')
    @enderror
</div>

<div class="mb-3">
    <label for="descrip">Descripcion</label>
    <textarea type="text" class="form-control" id="mdescrip" name="descrip" rows="4" placeholder="Ingrese la descripcion...">{{ old('mdescrip') }}</textarea>
    @error('descrip')
    @include('layouts.partials.messages')
@enderror
</div>

<div class="mb-3">
    <label for="direccion">Direccion</label>
    <textarea type="text" class="form-control" id="mdireccion" name="direccion" rows="3" placeholder="Ingrese la direccion...">{{ old('mdireccion') }}</textarea>
    @error('direccion')
    @include('layouts.partials.messages')
@enderror
</div>

<div class="row" style="margin-bottom: 12px;">
    <div class="col">
        <label for="ciudad">Provincia</label>
        <input type="text" class="form-control" id="mciudad" name="ciudad" value="{{ old('mciudad') }}" placeholder="Ingrese el ciudad...">
        @error('ciudad')
            @include('layouts.partials.messages')
        @enderror
    </div>
    <div class="col">
        <label for="municipio">Municipio</label>
        <input type="text" class="form-control" id="mmunicipio" name="municipio" value="{{ old('mmunicipio') }}" placeholder="Ingrese el municipio...">
        @error('municipio')
            @include('layouts.partials.messages')
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="fotos">Fotos</label>
    <input type="file" class="form-control" id="fotos[]" accept="image/*" multiple="multiple">
    @error('fotos')
    @include('layouts.partials.messages')
@enderror
</div>

<div class="row" style="margin-bottom: 12px;">
    <div class="col">
        <label for="habit">Habitaciones</label>
        <input type="number" min="0" class="form-control" id="mhabit" name="habit" value="{{ old('mhabit') }}" placeholder="Numero de habitaciones...">
        @error('habit')
            @include('layouts.partials.messages')
        @enderror
    </div>
    <div class="col">
        <label for="baños">Baños</label>
        <input type="number" min="0" class="form-control" id="mbaños" name="baños" value="{{ old('mbaños') }}" placeholder="Numero de baños...">
        @error('baños')
            @include('layouts.partials.messages')
        @enderror
    </div>
</div>

<div class="row" style="margin-bottom: 12px;">
    <div class="col">
        <label for="metros">Metros</label>
        <input type="text" class="form-control" id="mmetros" name="metros" value="{{ old('mmetros') }}" placeholder="Metros...">
        @error('metros')
            @include('layouts.partials.messages')
        @enderror
    </div>
    <div class="col">
        <label for="parqueo">Parqueos</label>
        <input type="number" min="0" class="form-control" id="mparqueo" name="parqueo" value="{{ old('mparqueo') }}" placeholder="Numero de parqueos...">
        @error('parqueo')
            @include('layouts.partials.messages')
        @enderror
    </div>
</div>

<div class="row" style="margin-bottom: 12px;">
    <div class="col">
        <label for="preven">Precio de venta</label>
        <input type="text" class="form-control" id="mpreven" name="preven" value="{{ old('mpreven') }}" placeholder="Ingrese precio de venta...">
        @error('preven')
            @include('layouts.partials.messages')
        @enderror
    </div>
    <div class="col">
        <label for="preren">Precio de renta</label>
        <input type="text" class="form-control" id="mpreren" name="preren" value="{{ old('mpreren') }}" placeholder="Ingrese precio de renta...">
        @error('preren')
            @include('layouts.partials.messages')
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="comision">Comision(ganacia)</label>
    <input type="text" class="form-control" id="mcomision" name="comision" value="{{ old('mcomision') }}" placeholder="Ingrese comision...">
    @error('comision')
        @include('layouts.partials.messages')
    @enderror
</div>

<div class="mb-3">
    <input type="hidden" id="mcodcli" name="codcli" value="{{ old('mcodcli') }}">
    <label for="codcli">Cliente</label>
    <div class="input-group">
        <input type="text" class="form-control" value="{{ old('mnomcli') }}" name="nomcli" id="mnomcli" readonly>
        <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" id="buscar-cliv" data-bs-toggle="modal" data-bs-target="#buscarClienteVendedor"><i class="fas fa-search"></i></button>
    </div>
    @error('codcli')
        @include('layouts.partials.messages')
    @enderror
</div>

<div class="mb-3">
    <input type="hidden" id="mcodtpro" name="codtpro" value="{{ old('mcodtpro') }}">
    <label for="codtpro">Tipo de Propiedad</label>
    <div class="input-group">
        <input type="text" class="form-control" value="{{ old('tippro') }}" name="tippro" id="mtippro" readonly>
        <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" id="buscar-tpro" data-bs-toggle="modal" data-bs-target="#tipoPropiedadModal"><i class="fas fa-search"></i></button>  
    </div>
    @error('codtpro')
        @include('layouts.partials.messages')
    @enderror  
</div>

<div class="mb-3">
    <input type="hidden" id="mcitbis" name="citbis" value="{{ old('mcitbis') }}">
    <label for="citbis">Itbis</label>
    <div class="input-group">
        <input type="text" class="form-control" value="{{ old('itbis') }}" id="mitbis" name="itbis" readonly>
        <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" id="buscar-itb" data-bs-toggle="modal" data-bs-target="#itbisModal"><i class="fas fa-search"></i></button>  
    </div>
    @error('citbis')
        @include('layouts.partials.messages')
    @enderror
</div>

<input type="hidden" class="form-control" name="estpro" value="activo">

<div class="button-group">
    <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
    <button id="enviarPropiedad" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
</div>

<div class="modal fade" id="buscarClienteVendedor" data-bs-backdrop="static" role="dialog" tabindex="-1" aria-labelledby="Seleccionar cliente" aria-hidden="true">
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
                    <table class="table table-responsive" id="dataTable3">
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
                            @foreach($clientesVendedores as $clienteVendedor)
                                <tr>
                                    <td scope="row">{{$clienteVendedor->codcli}}</td>
                                    <td>{{$clienteVendedor->nomcli.' '.$clienteVendedor->apecli}}</td>
                                    <td>{{$clienteVendedor->tecli1}}</td>
                                    <td>{{$clienteVendedor->cedrnc}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectClienteVendedor('{{$clienteVendedor->codcli}}', '{{$clienteVendedor->nomcli}}', '{{$clienteVendedor->apecli}}', '{{$clienteVendedor->tecli1}}', '{{$clienteVendedor->cedrnc}}')">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <script>
                        $(document).ready(function() {
                            $('#dataTable3').DataTable();
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
    function selectClienteVendedor(codcli, nomcli, apecli){
        document.getElementById('codcli').value = codcli;
        document.getElementById('nomcli').value = nomcli+' '+apecli;
    }
</script>

<div class="modal fade" id="itbisModal" role="dialog" data-bs-backdrop="static" tabindex="-1" aria-labelledby="Seleccionar itbis" aria-hidden="true">
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
                    <table class="table table-responsive" id="dataTable4">
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
                            $('#dataTable4').DataTable();
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

<div class="modal fade" id="tipoPropiedadModal" role="dialog" data-bs-backdrop="static" tabindex="-1" aria-labelledby="Seleccionar tipo propiedad" aria-hidden="true">
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
                    <table class="table table-responsive" id="dataTable5">
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
                            $('#dataTable5').DataTable();
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
