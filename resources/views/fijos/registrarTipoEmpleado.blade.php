@extends('layouts.formulario-master')

@section('content')
    
    <h3>Formulario Tipo Empleado</h3>

    <form action="/registrarTipoEmpleado" method="POST">
        
        @csrf
        @if (Session::get('success', false))
        @include('layouts.partials.messages')
             @endif
        <div class="mb-3">
            <label for="descripcion" class="form-label"> Tipo Empleado</label>
            <input type="text" class="form-control" name="descripcion" placeholder="Tipo de Empleado...">
            @error('descripcion')
                @include('layouts.partials.messages')
            @enderror
        </div>

       

        <div class="button-group">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>

    </form>

@endsection