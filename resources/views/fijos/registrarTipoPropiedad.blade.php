@extends('layouts.formulario-master')

@section('content')
    
    <h3>Formulario Tipo Propiedad</h3>

    <form action="/registrarTipoPropiedad" method="POST">
        
        @csrf

        @if (Session::get('success', false))
            @include('layouts.partials.messages')
        @endif

        <div class="mb-3">
            <label for="tippro" class="form-label">Tipo de propiedad</label>
            <input type="text" class="form-control" placeholder="Ingresa tipo de empleado..." name="tippro">
            @error('tippro')
                @include('layouts.partials.messages')
            @enderror
        </div>

        <div class="button-group">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>

    </form>

@endsection