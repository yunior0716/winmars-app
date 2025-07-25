@extends('layouts.formulario-master')

@section('content')
    
    <h3>Formulario Tipo Cliente</h3>

    <form action="/registrarTipoCliente" method="POST">
        
        @csrf
        @if (Session::get('success', false))
        @include('layouts.partials.messages')
             @endif
        <div class="mb-3">
            <label for="tipcli" class="form-label"> Tipo Cliente</label>
            <input type="text" class="form-control" name="tipcli" placeholder="Tipo de cliente...">
            @error('tipcli')
                @include('layouts.partials.messages')
            @enderror
        </div>

       

        <div class="button-group">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>

    </form>

@endsection