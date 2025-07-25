@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="assets/img/Solo_logo.png">

        <!--JavaScritp-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('assets/js/datatables.min.js') }}"></script>
        <!--Fonts-->
        <link rel="stylesheet" href="{{ url('assets/css/font-nunito.css') }}" >
        <!--Bootstrap-->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/datatables.min.css') }}">
        <!--Styles-->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <style>
            *{
                font-family: 'Nunito', sans-serif;
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

            .tab-nav a:visited,.tab-nav a:link,.tab-nav a:active{
                text-decoration: none;
                color: #1976d2;
            }

            .tab-nav{
                border-radius: 5px;
                font-weight: bold;
                padding: 10px;
                margin-bottom: 30px;
            }

            .tab-nav:hover{
                padding: 10px;
            }

            .form-container{
                width: 45%;
                margin: 8%;
                font-weight: 600;
            }

            .modal-content{
                border-radius: 12px;
                background: #E3F2FD;
            }

            .modal-body{
                padding: 40px 80px 40px 80px;
            }

            .modal-header button{
                border: none;
                color: white;
                width: 200px;
            }

            .table{
                width: 100%;
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                min-width: 400px;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 0 20px rgba( 0, 0, 0, 0.15)
            }

            .table thead tr{
                background-color: #1E88E5;
                color: white;
                font-weight: bold;
                text-align: left;
                white-space: nowrap;
            }

            .table th,
            .table td{
                padding: 12px 15px;
            }

            .table tbody td{
                background-color: #64B5F6;
                border-bottom: 1px solid #ffffff66;
                font-size: 0.9em;
                font-weight: 600;
                text-align: left;
                white-space: nowrap;
            }

            .dataTables_paginate .pagination li{
                height: 40px;
                font-weight: bold;
            }

            .form-container input, .form-container select, .form-container textarea{
                border: 1px solid #6c757d;
                border-bottom: 3px solid #6c757d;
                border-radius: 10px;
            }

            .form-container input:hover, .form-container select:hover, .form-container textarea:hover{
                border: 1px solid #1976d2;
                border-bottom: 3px solid #1976d2;
            }

            .form-container input:focus, .form-container select:focus, .form-container textarea:focus{
                border: 1px solid #1976d2;
                border-bottom: 3px solid #1976d2;
            }

            label{
                font-weight: 600;
            }

            .input-group input, .input-group button, .input-group{
                height: 40px;
            }

            .input-group .btn{
                margin: 0;
                height: 40px;
            }

            .form-container button{
                background: #1976d2;
                width: fit-content;
                height: 45px;
                margin: 10px;
                font-weight: bold;
                border-radius: 10px;
            }

            .form-container button:hover{
                background: #1565C0;
            }

            .modal-content button{
                background: #1976d2;
                width: fit-content;
                height: 40px;
                margin: 10px;
                font-weight: bold;
                border-radius: 10px;
            }

            .button-group{
                text-align: right;
            }

            h3{
                font-weight: bold;
                text-align: left;
                margin: 30px;
            }
        </style>
    </head>

    <body class="antialiased">

        @include('layouts.partials.navbar')

        <main class="form-container">
            @yield('content')
        </main>

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
