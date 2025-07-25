<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
        <link rel="icon" href="assets/img/Solo_logo.png">

        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
        <script src="{{ url('assets/js/canvasjs.min.js') }}"></script>
        {{-- <script src="{{ url('assets/js/jquery.canvasjs.min.js') }}"></script> --}}
        <!--Fonts-->
        <link rel="stylesheet" href="{{ url('assets/css/font-nunito.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/Nunito-Sans.css') }}">
        <!--Bootstrap-->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <!--Styles-->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
        <style>

            *{
                font-family: 'Nunito';
            }

            img{
                width: 150px;
                image-rendering: pixelated;
            }

            body{
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                margin-top: 10%;
                margin-bottom: 5%;
            }

            ::-webkit-scrollbar{
                background: #E3F2FD;
            }

            ::-webkit-scrollbar-button{
                display: none;
            }

            ::-webkit-scrollbar-thumb{
                background: #bfe4ff;
                border-radius: 10px;
            }

            .small-box, .small-box-footer{
                background: #1976d2;
                color: #E3F2FD;
                border-radius: 12px;
            }

            .small-box .icon i{
                font-size: 50px;
            }

            .inner p{
                font-weight: 600;
            }

            .footer{
                display: flex;
                font-weight: bold;
                font-size: 16px;
                background: #E3F2FD;
                justify-content: center;
                height: 50px;
                width: 100%;
            }

            .rights, .date{
                line-height: 50px;
            }

            .date{
                position: absolute;
                right: 20px;
            }

            .container{
                width: 100%;
            }

            .card{
                background: #E3F2FD;
                border-radius: 12px;
            }

            .card-title, .card-tools{
                font-weight: bold;
                vertical-align: center;
            }

            .card-tools button{
                width: fit-content;
                background: #1976d2;
                border-radius: 10px;
                border: none;
            }

        </style>
    </head>

    <body>

        @include('layouts.partials.navbar')

        <main class="container">
            @yield('content')
        </main>
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    </body>
    <footer class="footer footer-expand-lg fixed-bottom">
        <p class="rights"> © 2024 Winmars Properties S.R.L. All rights reserved. </p>
        <p class="date" id="date"></p>
    </footer>

    <script type="text/javascript">
        function fecha(){
            var today = new Date();
            var date = today.getDate().toString().padStart(2, "0")+'/'+(today.getMonth()+1).toString().padStart(2, "0")+'/'+today.getFullYear();
            var time = today.getHours().toString().padStart(2, "0") + ":" + today.getMinutes().toString().padStart(2, "0") + ":" + today.getSeconds().toString().padStart(2, "0");
            var dateTime = date+' '+time;

            document.getElementById('date').innerHTML = dateTime;
        }

        setInterval(fecha, 1000);
    </script>

</html>
