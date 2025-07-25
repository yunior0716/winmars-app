<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Winmars Properties | Venta, alquiler y administracion de Propiedades</title>
        <link rel="icon" href="assets/img/Solo_logo.png">

        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
        />

        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <!--Fonts-->
        <link rel="stylesheet" href="{{ url('assets/css/Nunito-Sans.css') }}" >
        <!--Bootstrap-->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <!--Styles-->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <style>
            *{
                font-family: 'Nunito Sans';
                box-sizing: border-box;
            }

            img{
                width: 150px;
                image-rendering: pixelated;
            }

            body{
                width: 100%;
            }

            .container-fluid{
                padding: 0;
            }

            .search-box .form{
                width: 80%;
            }

            ::-webkit-scrollbar{
                background: white;
                width: 8px;
            }

            ::-webkit-scrollbar-button{
                display: none;
            }

            ::-webkit-scrollbar-thumb{
                background: #0466c890;
                border-radius: 10px;
            }

            .section-searh-box{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 980px;
                animation: bg 40s infinite;
                background: url("assets/img/search_section/search-image1.jpg"); 
                background-repeat: no-repeat; 
                background-size: cover; 
            }

            .section-vender-box{
                color: black;
                text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.703);
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 965px;
                margin: 0;
                background: url("assets/img/vender-section/grant-lemons-jTCLppdwSEc-unsplash.jpg"); 
                background-repeat: no-repeat; 
                background-size: cover; 
            }

            .section-vender-box .vender-button{
                color: black;
                /* text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.811); */
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.45);
                margin: 50px;
                margin-top: 30px; 
                width: 300px;
                height: 55px;
                border: 1px solid transparent;
                border-radius: 25px;
                background: #e3f2fd;
                font-weight: bold;
                font-size: 24px;
            }

            .contacto-container .solicitud-button{
                color: black;
                /* text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.811); */
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.45);
                margin: 30px;
                width: 200px;
                height: 55px;
                border: 1px solid transparent;
                border-radius: 25px;
                background: #e3f2fd;
                font-weight: bold;
                font-size: 22px;
                font-style: italic;
            }


            .contacto-container{
                display: flex; 
                align-items: center; 
                justify-content: center;
                width: 96%; 
                height: 230px; 
                margin: 40px; 
                background: #e3f2fd;
                border-radius: 35px; 
            }

            .contacto-container .row{
                display: flex; 
                align-items: center; 
                justify-content: center; 
                margin: 40px;
                width: 90%;
                text-align: center;
            }

            .contacto-container .row p{
                font-weight: 600;
            }

            .contacto-container .icon-container{ 
                border-radius: 35px;
                display: flex; 
                align-items: center; 
                justify-content: center; 
                color: white;
                font-size: 35px;
                width: 100px; 
                height: 100px; 
                background-color: #0466c8; 
                margin-left: 40px;
            }

            .porque-container{
                display: flex; 
                align-items: center; 
                justify-content: center;
                width: 100%; 
                height: 750px;  
                background: #e3f2fd;
            }

            .porque-container .row{
                display: flex; 
                flex-direction: column;
                align-items: center; 
                justify-content: center; 
                width: 400px;
                margin: 80px;
                text-align: center;
            }

            .porque-container .row p{
                font-weight: 600;
            }

            .porque-container .col{
                margin: 15px;
            }

            .porque-container .icon-container{ 
                border-radius: 25px;
                display: flex; 
                margin: auto;
                align-items: center; 
                justify-content: center; 
                color: white;
                font-size: 25px;
                width: 80px; 
                height: 80px; 
                background-color: #0466c8; 
            }

            .mostrar-propiedad{
                width: 100%; 
                margin-top: 70px;
                background: #e3f2fd;
                border-radius: 35px; 
            }

            .search-box{
                display: flex; 
                align-items: center; 
                justify-content: center; 
                flex-direction: column;
                /* background: white; */
                backdrop-filter: blur(8px);
                width: 60%;
                height: 450px;
                border-radius: 35px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.208);
                backdrop-filter: blur(10px);
            }

            .search-box .row{
                width: 90%;
                margin: 30px;
            }

            select::-ms-expand {
                display: none;
            }

            .search-box .form-select, .search-box .form-control{
                -moz-appearance:none; /* Firefox */
                -webkit-appearance:none; /* Safari and Chrome */
                appearance:none;
                font-weight: 600; 
                border: 1px solid #0466c8; 
                color: #0466c8;
                border-radius: 15px;
                font-size: 16px;
                height: 45px;
            }

            .search-box .form-select:hover{
                color: white;
                background: #0466c873;
            }

            .search-box .input-group .btn{
                background: #0466c8;
                border-radius: 0 15px 15px 0;
                width: 20%;
                height: 45px;
                font-weight: bold;
            }

            .search-box-comprar-alquilar{
                display: flex; 
                align-items: left; 
                justify-content: center; 
                flex-direction: column;
                margin-left: 40px; 
                /* background: white; */
                width: 100%;
                backdrop-filter: blur(10px);
            }

            .search-box-comprar-alquilar .form{
                width: 70%;
            }

            .search-box-comprar-alquilar .form-select, .search-box-comprar-alquilar .form-control{
                -moz-appearance:none; /* Firefox */
                -webkit-appearance:none; /* Safari and Chrome */
                appearance:none;
                font-weight: 600; 
                border: 1px solid #0466c8; 
                color: #0466c8;
                border-radius: 15px;
                font-size: 16px;
                height: 40px;
            }

            .search-box-comprar-alquilar .form-select:hover{
                color: white;
                background: #0466c873;
            }

            .search-box-comprar-alquilar .btn{
                background: #0466c8;
                border-radius: 15px;
                width: fit-content;
                height: 45px;
                font-weight: bold;
            }


            .search-form{
                margin: 60px;
            }

            .hero-title{
                color: black;
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.656);
                font-weight: 900;
                text-align: center;
                animation: fadeIn 2s;
            }

            .search-box .form label{
                font-weight: bold;
                margin-left: 20px;
                color: black;
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.656);
                animation: fadeIn 2s;
            }

            .search-box-comprar-alquilar .form label{
                font-weight: bold;
                margin-left: 10px;
                color: black;
                animation: fadeIn 2s;
            }

            .hero-title-vender{
                font-weight: 900;
                text-align: center;
                animation: fadeIn 2s;
            }

            .hero-title-vender h1{
                font-size: 80px;
            }

            @keyframes fadeIn {
                0% { opacity: 0; }
                100% { opacity: 1; }
            }

            @keyframes bg {
                50% { 
                    background: url("assets/img/search_section/search-image2.jpg");
                    background-repeat: no-repeat; 
                    background-size: cover; 
                }
                100% { 
                    background: url("assets/img/search_section/search-image3.jpg");
                    background-repeat: no-repeat; 
                    background-size: cover; 
                }
            }

        </style>
    </head>

    <body>
        <header>
            @include('layouts.partials.navbarClientes')
        </header>
        <main class="container-fluid">
            @yield('content')
        </main>
    </body>

</html>