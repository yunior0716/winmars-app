@extends('layouts.inicio-master')

@php
    use App\models\propiedades;
    use App\models\imagenes;
    $propiedadesR = propiedades::orderBy('created_at','DESC')->paginate(4);
@endphp

@section('content')
    <div class="section-searh-box">

        <div class="search-box">
            <div class="hero-title">
                <h1>¡Tenemos el inmueble que buscas!</h1>
            </div>
            <form class="form" action="/comprar-alquilar" method="POST">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <select class="form-select shadow-none" name="accion" id="accion">
                            <option value="Comprar" selected>Comprar</option>
                            <option value="Alquilar">Alquilar</option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" class="form-control shadow-none" name="ubicacion" placeholder="Ciudad donde te interesaria el inmueble.">
                            <button class="btn btn-primary shadow-none" id="buscar" > <i class="fa-solid fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Tipo inmueble:</label>
                        <select class="form-select shadow-none" name="tipo" id="tipo">
                            <option value="Apartamento" selected>Apartamento</option>
                            <option value="Casa">Casa</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Habitaciones:</label>
                        <input type="number" min="1" max="5" name="habit" class="form-control shadow-none" placeholder="Cuantas habitaciones desea...">
                    </div>
                    <div class="col">
                        <label for="">Baños:</label>
                        <input type="number" min="1" max="5" name="baños" class="form-control shadow-none" placeholder="Cuantas baños desea...">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container-fluid propiedades-recientes" style="width: 96%; height: fit-content; text-align:center; margin:40px; border-radius:35px; padding: 30px; ">
        <h3 style="font-weight: bold;">Propiedades Recientes</h3>
        <div class="row" style="diplay: flex; align-items: center; justify-content: center; text-align: center;">
            @foreach ($propiedadesR as $propiedad)
                @php
                    $thumbnail = imagenes::where('codpro', $propiedad->codpro)->first();
                @endphp
                <div class="property" style=" width:fit-content; margin: 20px; padding: 0; backgroud: white;">
                    <div class="propiedad-image">
                        <a href="mostrar-propiedad?id={{ $propiedad->codpro }}&peticion=Comprar">
                            <img  style="border: 3px solid #0466c8; border-radius: 35px; width: 350px; height: 200px;" src="{{ url($thumbnail->url) }}" alt="property-image">
                        </a>
                    </div>
                    <h5 style="text-align:left; font-weight: bold; font-size: 16px; margin-top: 10px; margin-left: 20px;">{{ $propiedad->titulo }}</h5>
                    <p style="color:#0466c8; text-align:left; font-weight: bold; font-size: 24px; margin-left:20px; margin-bottom: 5px;">{{ 'US$'. number_format($propiedad->preven, 0, '.', ',') }}</p>
                    <ul style=" padding:0; display:flex; list-style-type: none; text-align: left; font-weight: 600; color:#0466c8;" >
                        <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-bed"></i> {{ $propiedad->habit }}</li>
                        <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-bath"></i> {{ $propiedad->baños }}</li>
                        <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-car"></i> {{ $propiedad->parqueo }}</li>
                        <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-map"></i> {{ $propiedad->metros. " M²" }}</li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

    <div class="porque-nosotros">
        <div class="hero-title">
            <h2>¿Por qué <span style="color: #0466c8;">comprar, alquilar o vender</span> un inmueble con nosotros?</h2>
        </div>
        <div class="porque-container">
            <div class="row">
                <div class="col">
                    <div class="icon-container">
                        <i class="fa-solid fa-file-shield"></i>
                    </div>
                </div>
                <div class="col">
                    <h4 style="font-weight: bold;">Compra y alquila con seguridad</h4>
                    <p>Adquiere una propiedad con seguridad y sienta confianza al buscar en nuestro catalogo con propiedades depuradas y en buen estado, que te brinda Winmars Properties.</p>
                </div>
                <div class="col">
                    <div class="icon-container">
                        <i class="fa-solid fa-user-group"></i>
                    </div>
                </div>
                <div class="col">
                    <h4 style="font-weight: bold;">Todos nuestros clientes satisfechos</h4>
                    <p>Compra, alquila o vende tu inmueble con una empresa de más de 5 años de experiencia, cientos de clientes satisfechos y que te garantizan un proceso exitoso.</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="icon-container">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                </div>
                <div class="col">
                    <h4 style="font-weight: bold;">Todos los servicios, una agencia en su inversión</h4>
                    <p >Realiza cualquier operación inmobiliaria que necesites y cuando la necesites. Estaremos contigo hasta el final, incluso después de la compra y venta de tu inmueble.</p>
                </div>
                <div class="col">
                    <div class="icon-container">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                </div>
                <div class="col">
                    <h4 style="font-weight: bold;">Asesórate con especialistas</h4>
                    <p>Recibe asesoría personalizada por parte de un equipo de agentes entrenados bajo un modelo de atención comercial que solo Winmars Properties ofrece.</p>
                </div>
            </div>
    </div>

    <div class="contacto-container" style="height: 300px; background: #0466c8; width: 100%; margin: 40px 0 40px 0; border-radius: 0;">
        <div class="row">
            <h2 style="font-weight: bold; color: white;">Te interesa algun inmueble?</h2>
            <h3 style="font-weight: 600; color: white; font-style:italic;">Dinos cuales son las caracteristicas</h3>
            <div class="evaluacion-button" style="text-align: center;">
                <button data-tf-popup="G186BqpV" class="solicitud-button" data-tf-iframe-props="title=Comprar-form" data-tf-medium="snippet">Me interesa!</button>
            </div>
        </div>
    </div>

    <script src="//embed.typeform.com/next/embed.js"></script>

    <div class="contacto-fondo">
        <div class=" contacto-container">
            <div class="row" style="padding: 20px; ">
                <div class="col-1">
                    <div class="icon-container">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                </div>
                <div class="col">
                    <h4 style="font-weight: bold;">Ubicación:</h4>
                    <p>Santiago De Los Caballeros</p>
                </div>
                <div class="col-1">
                    <div class="icon-container">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                </div>
                <div class="col">
                    <h4 style="font-weight: bold;">Teléfonos:</h4>
                    <p>
                        <a style="text-decoration: none; color:#0466c8;" href="https://api.whatsapp.com/send?phone=18498652406"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a><br/>
                        <a style="text-decoration: none; color:#0466c8;" href="tel:8884404140"><i class="fa-solid fa-phone"></i> (888) 440-4140 </a>
                    </p>
                </div>
                <div class="col-1" >
                    <div class="icon-container">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                </div>
                <div class="col" >
                    <h4 style="font-weight: bold;">Correos electrónicos:</h4>
                    <p>winmarsproperties@gmail.com<br>wmuser123@gmail.com</p>
                </div>
            </div>
    </div>

    </div>

@endsection
