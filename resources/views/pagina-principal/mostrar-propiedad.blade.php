@extends('layouts.inicio-master')

@php
    use App\models\imagenes;
    use App\models\direcciones;
    $imagenes = imagenes::where('codpro', $propiedad->codpro)->get();
    $direccion = direcciones::where('codpro', $propiedad->codpro)->first();
@endphp
<style>
    .swiper {
        width: 100%;
        height: 500px;
        background: rgb(17, 17, 17);
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        image-rendering: auto;
    }

</style>

@section('content')    

    <div class="container-fluid mostrar-propiedad">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($imagenes as $imagen)
                    <div class="swiper-slide"><img src="{{ url($imagen->url) }}" alt="property-image"></div>
                @endforeach
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

    </div>

    <div class="container-fluid mostrar-propiedad" style="background: none; width: 40%; margin-top: 20px;" >
        <div class="informacion" style="margin-top: 40px;">
            <p style="margin:0; color:rgba(0, 0, 0, 0.583); font-size:12px; font-weight:600;">{{ $accion }} | ID: #{{ $propiedad->codpro }}</p>
            @if($accion == 'Comprar')
                <h1 class="price" style="color: #0466c8; font-weight:bold;">{{'US$'. number_format($propiedad->preven, 0, '.',',') }}</h1>
            @else
                <h1 class="price" style="color: #0466c8; font-weight:bold;">{{'US$'. number_format($propiedad->preren, 0, '.',',') }}</h1>
            @endif

            <h1 style="font-weight: bold; margin-bottom: 20px;">{{ $propiedad->titulo }}</h1>

            <ul style="font-size:18px; padding:0; display:flex; list-style-type: none; text-align: left; font-weight: 600; color:#0466c8;" >
                <li style="margin: 0 20px 0 0; display:flex; flex-diretion:row; align-items:center; justify-content:center;">
                    <i class="fa-solid fa-bed" style="padding:20px; background:#0466c840; border-radius:20px;"></i> <p style="font-size: 14px; margin:0px 10px 0 10px;"> <b>{{ $propiedad->habit }}</b> <br/> Habs.</p></li>
                <li style="margin: 0 20px 0 0; display:flex; flex-diretion:row; align-items:center; justify-content:center;">
                    <i class="fa-solid fa-bath" style="padding:20px; background:#0466c840; border-radius:20px;"></i> <p style="font-size: 14px; margin:0px 10px 0 10px;"> <b>{{ $propiedad->baños }}</b> <br/> Baños</p></li>
                <li style="margin: 0 20px 0 0; display:flex; flex-diretion:row; align-items:center; justify-content:center;">
                    <i class="fa-solid fa-car" style="padding:20px; background:#0466c840; border-radius:20px;"></i> <p style="font-size: 14px; margin:0px 10px 0 10px;"> <b>{{ $propiedad->parqueo }}</b> <br/> Parqueo/s</p></li> 
                <li style="margin: 0 20px 0 0; display:flex; flex-diretion:row; align-items:center; justify-content:center;">
                    <i class="fa-solid fa-map" style="padding:20px; background:#0466c840; border-radius:20px;"></i><p style="font-size: 14px; margin:0px 10px 0 10px;"> <b>{{ $propiedad->metros. " M²" }}</b> <br/> Construccion</p> </li>
            </ul>

            <label style="font-size:16px; color:#0466c8; padding-top:13px; padding-left:30px; background: #0466c840; width: 100%; height: 50px; border-radius:20px; text-align: left;">
                <i class="fa-solid fa-location-dot"></i> {{ $direccion->ciudad }}, {{ $direccion->municipio }}
            </label>

            <label style="margin: 40px 40px 0  0; padding-top:13px; padding-left:30px; width: 100%; height: 30px; border-top: 1.5px solid #0466c8;">
            </label>

            <h3 style="font-weight: bold; margin-bottom: 20px;">Descripcion de inmueble</h3>
            
            <p style="white-space: pre-line;"> {{ $propiedad->descrip }} </p>

            
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
                    <p>Mía Molina, Av. Hispanoamericana Calle 1,<br>Santiago De Los Caballeros 51000</p>
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
                        <a style="text-decoration: none; color:#0466c8;" href="tel:8293304140"><i class="fa-solid fa-phone"></i> (829) 330-4140 </a>
                    </p>
                </div>
                <div class="col-1" >
                    <div class="icon-container">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                </div>
                <div class="col" >
                    <h4 style="font-weight: bold;">Correos electrónicos:</h4>
                    <p>winmarsproperties@gmail.com<br>maderamanuel25@gmail.com</p>
                </div>
            </div>
    </div>
        

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 10,
            slidesPerGroup: 3,
            rewind: true,
            loop: true,
            loopFillGroupWithBlank: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>



@endsection
