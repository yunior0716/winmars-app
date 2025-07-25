@extends('layouts.formulario-master')

@section('content')
    
    <h3>Formulario Posicion Empleado</h3>

    <form action="/registrarPosicionesEmpleado" method="POST">
        
        @csrf

        @if (Session::get('success', false))
            @include('layouts.partials.messages')
        @endif

        <div class="mb-3">
            <label for="posicion" class="form-label">Posicion de Empleado</label>
            <input type="text" class="form-control" placeholder="Ingresa tipo de empleado..." name="posicion">
            @error('posicion')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="button-group">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>

    </form>

@endsection