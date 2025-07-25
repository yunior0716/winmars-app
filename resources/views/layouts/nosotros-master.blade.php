<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Winmars Properties | Nosotros</title>
        <link rel="icon" href="assets/img/Solo_logo.png">

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
            }

            body{
                width: 100%;
                margin-bottom: 5%;
            }

            .container .row{

                background-color: #e2eafc;
                margin-top: 5%;

            }

            .container-fluid{
                padding: 0;
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
                height: 450px;
                background: url("assets/img/nosotros/pexels-alena-darmel-7642000.jpg"); 
                background-repeat: no-repeat; 
                background-size: cover; 
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
                text-align: center;
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

            .hero-title{
                color: #edf2fb;
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.656);
                font-weight: 900;
                text-align: center;
                animation: fadeIn 2s;
            }

            .hero-title h1{
                font-size: 56px;
            }

            .titulo {
                text-align: left;
                font-size: 30px;
            }

            .texto-nosotros{
                font-weight: 300px;
                font-size: 16px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                 
            }

            .container .row{
                border-radius: 25px;
            }

            .container .col h1{
                font-weight: bold;
                margin: 20px;
            }

            .container .col p{
                font-weight: 600;
                font-size: 18px;
            }

            .img1{
                width: 100%;
                border-radius: 0 25px 25px 0;
            }

            .img2{
                width: 100%;
                border-radius: 25px 0 0 25px ;
                margin: 0;
            }

            p{
                text-align: justify;
                margin-left: 30px;
                margin-right: 30px;
            }

            @keyframes fadeIn {
                0% { opacity: 0; }
                100% { opacity: 1; }
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