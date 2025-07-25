@extends('layouts.nosotros-master')

@section('content')
<div class="section-searh-box">  
    <div class="hero-title">
        <h1><b>Nosotros</b></h1>
    </div>
</div>

<div class="container">
    <div class="row">
      <div class="col texto-nosotros">
        <h1 class="fw-300 titulo">Conoce Sobre Nosotros:</h1>
        <p>Winmars Properties, es una empresa joven que surge de la mano de desarrolladores reconocidos de la Ciudad de Santiago de los Caballeros, con la finalidad de ofrecer un servicio eficiente orientado en satisfacer las necesidades de nuestros clientes.</p>

        <p>Evaluamos su perfil y les ofrecemos soluciones para su inversión mediante propuestas de ventas y alquiler de propiedades de todos los niveles, así como proyectos innovadores, elegantes, seguros, que inspiran y que brindan espacios únicos.</p>
      </div>

      <div class="col image">
        <img class="img1" src="../assets/img/nosotros/pexels-kampus-production-8730045.jpg" alt="">
      </div>
    </div>

    <div class="row">
      <div class="col image">
        <img class="img2" src="../assets/img/nosotros/pexels-kindel-media-7579201.jpg" alt="">
      </div>
      <div class="col texto-nosotros">
        <h1 class="fw-300 titulo">Misión:</h1>
        <p>Ofrecer un servicio confiable con un alto nivel de compromiso a nuestros clientes e inversionistas, garantizando rentabilidad y satisfacción.</p> 
      </div> 
    </div>

    <div class="row">
      <div class="col texto-nosotros">
        <h1 class="fw-300 titulo">Vision:</h1>
        <p>Lograr un posicionamiento estratégico en el sector inmobiliario, desarrollando siempre nuevas e innovadoras estrategias comerciales entregando hogares y valor a nuestros clientes, inversionistas y empresas relacionadas, a través de nuestro capital humano, plataforma tecnológica, reputación y valores compartidos.</p> 
      </div>
      <div class="col">
        <img class="img1" src="../assets/img/nosotros/pexels-rodnae-productions-8293694.jpg" alt="">
      </div>
    </div>

    <div class="row">
      <div class="col image">
        <img class="img2" src="../assets/img/nosotros/pexels-ron-lach-9870226.jpg" alt="">
      </div>
      <div class="col texto-nosotros">
        <h1 class="fw-300 titulo">Valores:</h1>
        <ul style="padding-bottom: 10%;">
          <li>Integridad</li>
          <li>Confianza</li>
          <li>Transparencia</li>
          <li>Responsabilidad</li>
          <li>Calidad de Servicio</li>
          <li>Trabajo en equipo</li>
      </ul>
      </div> 
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


@endsection