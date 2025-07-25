@extends('layouts.contacto-master')

@section('content')
  <div class="section-image">  
      <div class="title">
          <h1><b>Contacto</b></h1>
      </div>
  </div>

  <div class="contacto-fondo">
    <div class=" contacto-container">
        <div class="row">
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


  <div class="contacto-form" style="margin:40px; width: 96%; height: 800px;">
      <div class="row row-mapa">

        <div class="col">
          <h1 class="fw-300 titulo">Nuestra Ubicación:</h1>
          <iframe style="border-radius: 25px; height: 650px; opacity: 0.8; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.208); filter:saturate(130%) contrast(90%);" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.9579453698666!2d-70.65492788561819!3d19.414222946299994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eb1cf62c72bf7b9%3A0xece9b96e03eb72a9!2sWinmars%20Properties!5e0!3m2!1ses!2sdo!4v1660703331998!5m2!1ses!2sdo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

  


@endsection