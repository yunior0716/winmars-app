@extends('layouts.auth-master')

@section('content')

    {{-- <div class="pagina-inicio" style="text-align: center; margin: 30px;">
        <a href="/inicio" type="button" class="btn btn-primary shadow-none"><i class="fa-solid fa-house"></i> Pagina de inicio</a>
    </div> --}}

    <h3><img src="{{ url('assets/img/Solo_logo.png') }}" alt="Logo">Login</h3>

    <form action="/login" method="POST">

        @csrf
        <div class="mb-3">
            <label for="username" class="form-label"><i class="fa fa-user"></i> Username/Email</label>
            <input type="text" class="form-control" name="username" placeholder="Ingresa tu email o username...">
            <div name="input-message" class="form-text">No compartas esta informacion con nadie.</div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label"><i class="fa-solid fa-lock"></i> Password</label>
            <input type="password" class="form-control" placeholder="Ingresa contraseña..." name="password">
        </div>

        @include('layouts.partials.messagesLogin')

        <div class="button-group">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i>  Login</button>
        </div>

    </form>

@endsection


