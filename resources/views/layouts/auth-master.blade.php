<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="icon" href="assets/img/Solo_logo.png">

        <!--Fonts-->
        <link rel="stylesheet" href="{{ url('assets/css/font-nunito.css') }}" >
        <!--Bootstrap-->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <!--Styles-->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <style>
            *{
                font-family: 'Nunito';
            }

            img{
                width: 100px;
                image-rendering: pixelated;
            }

            body{
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 100vh;
            }

            .footer{
                display: flex;
                font-weight: bold;
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

            label{
                margin-left: 10px;
            }

            .form-container{
                width: 25%;
            }

            .form-container input{
                border: 1px solid #6c757d;
                border-bottom: 3px solid #6c757d;
                border-radius: 10px;
            }

            .form-container input:hover, .form-container input:focus{
                border: 1px solid #1976d2;
                border-bottom: 3px solid #1976d2;
            }

            .form-container button{
                background: #1976d2;
                width: 100px;
                height: 45px;
                margin: 10px;
                font-weight: bold;
                border-radius: 10px;
            }

            .form-container button:hover{
                background: #1565C0;
            }

            .button-group{
                margin-top: 30px;
                text-align: center;
            }

            .pagina-inicio .btn{
                background: transparent;
                border: 2px solid #1976d2;
                color: #1976d2;
                border-radius: 15px;
            }

            .pagina-inicio .btn:hover{
                background: #1976d2;
                border-color: #eee;
                color: white;
            }

            h3{
                font-size: 36px;
                font-weight: bold;
                text-align: center;
            }

            .footer a {
        color: black;
        text-decoration: underline;
        position: absolute;
        left: 20px;
        line-height: 50px;
    }
        </style>
    </head>

    <body>

        <main class="form-container">
            @yield('content')
        </main>

        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    </body>
    <footer class=" footer footer-expand-lg fixed-bottom">
        <a href="/inicio">Inicio </a>
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
