@extends('layouts.formulario-master')
<title>Regitro de Usuarios</title>

@php
    use App\Models\User;
@endphp

@section('content')

    <div class="tab-nav">
        <a href="{{ url()->previous() }}">Atras</a>
        <label>/</label> 
        <a> Formulario de Usuarios</a>
    </div>
    
    <h3>Formulario de Usuarios</h3>

    <form action="/registrarUsuarios" method="POST">
        @csrf

        @if (Session::get('success', false))
            @include('layouts.partials.messages')
        @endif

        <input type="hidden" class="form-control" id="codemp" name="codemp">

        <div class="mb-3">
            <label for="nomemp" class="form-label">Empleado</label>
            <div class="input-group">
                <input type="text" class="form-control" id="nomemp" name="nomemp" readonly>
                <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" data-bs-toggle="modal" data-bs-target="#buscarEmpleadoModal"><i class="fas fa-search"></i></button>  
            </div>
            @error('codemp')
                @include('layouts.partials.messages')
            @enderror
        </div>
            
        <div class="mb-3">
            <label for="username" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Nombre de usuario...">
            @error('username')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Contraseña...">
            @error('password')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña...">
            @error('password_confirmation')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="email">Correo</label>
            <input type="email" class="form-control" id="correo" name="email" placeholder="Correo...">
            @error('email')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="rol">Rol</label>
            <select class="form-select" name="rol">
                <option value="Administrador" selected>Administrador</option>
                <option value="Usuario">Usuario</option>
            </select>
            @error('rol')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <input type="hidden" class="form-control" name="status" value="activo">

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>

    <div class="modal fade" id="buscarEmpleadoModal" role="dialog" tabindex="-1" aria-labelledby="Seleccionar Empleado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Seleccionando Empleado</h3>
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
                                @foreach($empleados as $empleado)
                                    @php $usuario = User::where('codemp', $empleado->codemp)->first() @endphp
                                    @if(is_null($usuario))
                                        <tr>
                                            <td scope="row">{{$empleado->codemp}}</td>
                                            <td>{{$empleado->nomemp.' '.$empleado->apeemp}}</td>
                                            <td>{{$empleado->telem1}}</td>
                                            <td>{{$empleado->cedula}}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectEmpleado('{{$empleado->codemp}}','{{$empleado->nomemp}}','{{$empleado->apeemp}}')">
                                                    <i class="fas fa-hand-pointer"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
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
        function selectEmpleado(codemp, nomemp, apeemp){
            document.getElementById('codemp').value = codemp;
            document.getElementById('nomemp').value = nomemp+' '+apeemp;
        }
    </script>

@endsection

