<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Winmars Properties | Contacto</title>
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

            .section-image{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 500px;
                animation: bg 40s infinite;
                background: url("assets/img/nosotros/pexels-andrew-neel-2312369.jpg"); 
                background-repeat: no-repeat; 
                background-size: cover; 
            }

            .search-box{
                background: white;
                width: 50%;
                height: 400px;
                border-radius: 20px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.208);
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

            .title{
                color: #edf2fb;
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.656);
                font-weight: 900;
                text-align: center;
                animation: fadeIn 2s;
                
            }

            .title h1{
                font-size: 56px;
            }

            .titulo {
                text-align: center;
                font-weight: bold;
                margin: 40px;
                font-size: 36px;
            }

            .texto-nosotros{
                font-weight: 300px;
                font-size: 14px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .img1{
                width: 100%;
            }

           

            .row-mapa{
                margin-top: 50px;
            }

            iframe{
                width: 100%;
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