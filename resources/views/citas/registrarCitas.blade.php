@extends('layouts.formulario-master')
<title>Registro de Citas</title>

@section('content')

    <div class="tab-nav">
        <a href="{{ url()->previous() }}">Atras</a>
        <label>/</label> 
        <a> Formulario de Citas</a>
    </div>

    <h3>Formulario de Citas</h3>

    <form action="/registrarCitas" method="POST">
        @csrf

        @if (Session::get('success', false))
        @include('layouts.partials.messages')
          @endif
        
        <div class="mb-3">
            <label for="codsol">Solicitud</label>
            <input type="text" class="form-control" name="codsol" value="{{ old('codsol') }}">
            @error('codsol')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="codusu">Usuario</label>
            <input type="text" class="form-control" name="codusu" value="{{ old('codusu') }}">
            @error('codusu')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="fecha">Fecha</label>
            <input type="datetime-local" min="{{  $fechaHoy = date("Y-m-d h:i", strtotime(date("Y-m-d h:i")."+ 2 days")) }}" class="form-control" name="fecha" placeholder="Ingrese el fecha..." value="{{ old('fecha') }}">
            @error('fecha')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="descrip">Descripcion</label>
            <textarea class="form-control" name="descrip" rows="4" cols="50" placeholder="Descripcion..." value="{{ old('descrip') }}"></textarea>
            @error('descrip')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="estcit">Estado</label>
            <select class="form-select" name="estcit" value="{{ old('estcit') }}" disabled>
                <option value="Pendiente" selected>Pendiente</option>
                <option value="En Proceso">En proceso</option>
                <option value="Comletada">Completada</option>
            </select>
        </div>

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>
    
@endsection