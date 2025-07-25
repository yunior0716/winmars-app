@extends('layouts.formulario-master');
<title>Agendar Citas</title>

@section('content')

    <div class="tab-nav">
        <a href="/consultarSolicitudes">Atras</a>
        <label>/</label> 
        <a>Agendar Cita</a>
    </div>

    <h3>Agendar Cita</h3>


    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/dateTimePicker.css">
    <script type="text/javascript" src="scripts/components/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/dateTimePicker.min.js"></script>
    

    <form action="/agendarCita" method="POST">
        @csrf

        @method('PUT')

        @if (Session::get('success', false))
        @include('layouts.partials.messages')
          @endif
        
        <div class="mb-3">
            <label for="codsol">Solicitud</label>
            <input type="text" class="form-control" name="codsol" value="{{ $codsol }}" readonly>
            @error('codsol')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="codusu">Usuario</label>
            <input type="text" class="form-control" name="codusu" value="{{ auth()->user()->id }}" readonly>
            @error('codusu')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="fecha">Fecha</label>
            <input type="datetime-local" class="form-control" min="{{  $fechaHoy = date("Y-m-d h:i", strtotime(date("Y-m-d h:i")."+ 2 days")) }}" name="fecha" placeholder="Ingrese el fecha...">
            @error('fecha')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="descrip">Descripcion</label>
            <textarea class="form-control" name="descrip" rows="4" cols="50" placeholder="Descripcion..."> </textarea>
            @error('descrip')
            @include('layouts.partials.messages')
        @enderror
        </div>

        <div class="mb-3">
            <label for="estcit">Estado</label>
            <input type="text" class="form-control" name="estcit" value="Pendiente" readonly>
        </div>

        <div class="button-group">
            <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </div>
        
    </form>
    
@endsection