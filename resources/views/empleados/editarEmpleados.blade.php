@extends('layouts.formulario-master')
<title>Edicion de Empleados</title>

@php
    use App\Models\tipo_empleados;
    use App\Models\posiciones_empleado;

@endphp

@section('content')

    <div class="tab-nav">
        <a href="/consultarEmpleados">Atras</a>
        <label>/</label> 
        <a> Formulario de Empleados</a>
    </div>
    
    <h3>Formulario de Empleados</h3>

    <form action="/updateEmpleado" method="POST">
        @csrf

        @method('PUT')

        @if (Session::get('success', false))
            @include('layouts.partials.messages')
        @endif

        <input type="hidden" name="codemp" value="{{ $_GET['empleado'] }}">

        <div class="mb-3">
            <label for="nomemp">Nombre </label>
            <input type="text" class="form-control" name="nomemp" placeholder="Ingrese el nombre..." value="{{ $empleado->nomemp }}">
            @error('nomemp')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="apeemp">Apellido</label>
            <input type="text" class="form-control" name="apeemp" placeholder="Ingrese el apellido..." value="{{ $empleado->apeemp }}">
            @error('apeemp')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="telem1">Teléfono</label>
            <input type="text" class="form-control" name="telem1" placeholder="Ingrese el teléfono..." value="{{ $empleado->telem1 }}">
            @error('telem1')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="telem2">Celular</label>
            <input type="text" class="form-control" name="telem2" placeholder="Ingrese el celular..." value="{{ $empleado->telem2 }}">
            @error('telem2')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" name="direccion" placeholder="Ingrese la dirección..." value="{{ $empleado->direccion }}">
            @error('direccion')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="correo">Correo Electrónico</label>
            <input type="text" class="form-control" name="correo" placeholder="Ingrese el correo electrónico..." value="{{ $empleado->correo }}">
            @error('correo')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="cedula">Cédula/RNC</label>
            <input type="text" class="form-control" name="cedula" placeholder="Ingrese la cédula/RNC..." value="{{ $empleado->cedula }}">
            @error('cedula')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="row" style="margin-bottom: 12px;">
            <div class="col">
                <input type="hidden" name="ctipemp" id="ctipemp" value="{{ $empleado->ctipemp }}">
                <label for="descripcion">Tipo de Empleado</label>
                @php $te = tipo_empleados::where('ctipemp',$empleado->ctipemp)->first() @endphp
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ $te->descripcion }}" id="descripcion" name="descripcion" readonly>
                    <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" id="buscar-temp" data-bs-toggle="modal" data-bs-target="#buscarTEmpleadoModal"><i class="fas fa-search"></i></button>  
                </div>
                @error('codcli')
                    @include('layouts.partials.messages')
                @enderror
            </div>
            <div class="col">
                <input type="hidden" name="codpos" id="codpos" value="{{ $empleado->codpos }}">
                <label for="posicion">Posicion</label>
                @php $pe = posiciones_empleado::where('codpos',$empleado->codpos)->first() @endphp
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ $pe->posicion }}" id="posicion" name="posicion" readonly>
                    <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" id="buscar-pos" data-bs-toggle="modal" data-bs-target="#buscarPEmpleadoModal"><i class="fas fa-search"></i></button>  
                </div>
                @error('codcli')
                    @include('layouts.partials.messages')
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="hora_entrada">Hora de Entrada</label>
            <input type="time" class="form-control" name="hora_entrada" value="{{ $empleado->hora_entrada }}">
            @error('hora_entrada')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="hora_salida">Hora de Salida</label>
            <input type="time" class="form-control" name="hora_salida" value="{{ $empleado->hora_salida }}">
            @error('hora_salida')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <input type="hidden" class="form-control" name="estemp" value="activo">

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>

    <div class="modal fade" id="buscarTEmpleadoModal" role="dialog" tabindex="-1" aria-labelledby="Seleccionar tipo de empleado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Seleccionando Tipo de Empleado</h3>
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
                                    <th scope="col">Tipo de Empleado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tipo_empleados as $templeado)
                                    <tr>
                                        <td scope="row">{{$templeado->ctipemp}}</td>
                                        <td>{{$templeado->descripcion}}</td>

                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectTEmpleado('{{$templeado->ctipemp}}', '{{$templeado->descripcion}}')">
                                                <i class="fa-solid fa-check"></i>
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
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript"> 
        function selectTEmpleado(ctipemp, descripcion){
            document.getElementById('ctipemp').value = ctipemp;
            document.getElementById('descripcion').value = descripcion;
        }
    </script>

    <div class="modal fade" id="buscarPEmpleadoModal" role="dialog" tabindex="-1" aria-labelledby="Seleccionar posicion del empleado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Seleccionando posicion del empleado</h3>
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
                                    <th scope="col">Posicion</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posiciones_empleados as $pempleado)
                                    <tr>
                                        <td scope="row">{{$pempleado->codpos}}</td>
                                        <td>{{$pempleado->posicion}}</td>

                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectPEmpleado('{{$pempleado->codpos}}', '{{$pempleado->posicion}}')">
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
        function selectPEmpleado(codpos, posicion){
            document.getElementById('codpos').value = codpos;
            document.getElementById('posicion').value = posicion;
        }
    </script>


@endsection