@extends('layouts.formulario-master')
<title>Edicion de clientes</title>

<!--<style>
    nav{
        opacity: 0;
    }
</style>-->

@section('content')

    <div class="tab-nav">
        <a href="/consultarClientes">Atras</a>
        <label>/</label> 
        <a> Formulario de Clientes</a>
    </div>

    <h3>Formulario de Clientes</h3>

    <form action="/updateClientes" method="POST">
        @csrf

        @method('PUT')

        <input type="hidden" name="codcli" value="{{ $_GET['cliente'] }}">

        <div class="mb-3">
            <label for="nomcli">Nombre</label>
            <input type="text" class="form-control" name="nomcli" placeholder="Ingrese el nombre..." value="{{ $cliente->nomcli }}">
            @error('nomcli')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="apecli">Apellido</label>
            <input type="text" class="form-control" name="apecli" placeholder="Ingrese el apellido..." value="{{ $cliente->apecli }}">
            @error('apecli')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="tecli1">Teléfono</label>
            <input type="text" class="form-control" name="tecli1" placeholder="Ingrese el teléfono..." value="{{ $cliente->tecli1 }}">
            @error('tecli1')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="tecli2">Celular</label>
            <input type="text" class="form-control" name="tecli2" placeholder="Ingrese el celular..." value="{{ $cliente->tecli2 }}">
            @error('tecli2')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="dircli">Dirección</label>
            <input type="text" class="form-control" name="dircli" placeholder="Ingrese la dirección..." value="{{ $cliente->dircli }}">
        </div>

        <div class="mb-3">
            <label for="corcli">Correo Electrónico</label>
            <input type="text" class="form-control" name="corcli" placeholder="Ingrese el correo electrónico..." value="{{ $cliente->corcli }}">
            @error('corcli')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="cedrnc">Cédula/RNC</label>
            <input type="text" class="form-control" name="cedrnc" placeholder="Ingrese la cédula/RNC..." value="{{ $cliente->cedrnc }}">
            @error('cedrnc')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="mb-3">
            <label for="codtpcli">Tipo de Cliente</label>
            <select class="form-select" name="codtpcli">
                <option value="1" {{($cliente->codtpcli == '1') ? 'selected' : ''}}>Comprador</option>
                <option value="2" {{($cliente->codtpcli == '2') ? 'selected' : ''}}>Vendedor</option>
            </select>
        </div>

        <input type="text" name="estcli" value="activo" hidden>

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </div>
        
    </form>

@endsection