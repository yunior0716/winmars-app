<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="assets/img/Solo_logo.png">

        <!--JavaScript-->
        <script src="{{ url('assets/js/sweetalert2.all.min.js') }}"></script>
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ url('assets/js/datatables.min.js') }}"></script>
        <script src="{{ url('assets/js/vfs_fonts.js') }}"></script>
        <script src="{{ url('assets/js/pdfmake.min.js') }}"></script>
        <script src="{{ url('assets/js/accounting.min.js') }}"></script>
        <script src="{{ url('assets/js/moment.min.js') }}"></script>
        <!--Fonts-->
        <link rel="stylesheet" href="{{ url('assets/css/font-nunito.css') }}">
        <!--Bootstrap-->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/datatables.min.css') }}">
        <!--Styles-->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
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
                margin-top: 7%;
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

            .container-fluid{
                width: 100%;
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

            .swal2-popup{
                background: #E3F2FD;
                border-radius: 12px;
                color: black;
            }

            .swal2-popup .btn{
                margin-top: 20px;
                background: #1976d2;
                border: none;
            }

            .swal2-title{
                font-weight: bold;
            }

            textarea{
                background-color: transparent;
                border: none;
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

            .table{
                width: 100%;
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                min-width: 400px;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 0 20px rgba( 0, 0, 0, 0.15);
            }

            .table thead tr {
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

            .table tbody td,.table tfoot tr{
                background-color: #64B5F6;
                border-bottom: 1px solid #ffffff66;
                font-size: 0.9em;
                font-weight: bold;
                text-align: left;
                white-space: nowrap;
            }

            tbody>tr>:nth-child(5), tbody>tr>:nth-child(6), tbody>tr>:nth-child(7){
                text-align: right;
            }

            thead>th>:nth-child(5), thead>th>:nth-child(6), thead>th>:nth-child(7){
                text-align: right;
            }

            form .row{
                font-weight: 600;
                margin: 30px 0px 30px 0px;
                margin-top: 0px;
            }

            .input-group input{
                height: 40px;
            }

            .container-fluid input, .container-fluid select, .container-fluid textarea, .input-group-text{
                border: 1px solid #6c757d;
                border-bottom: 3px solid #6c757d;
                border-radius: 10px;
            }

            .container-fluid input:hover, .container-fluid select:hover, .container-fluid textarea:hover{
                border: 1px solid #1976d2;
                border-bottom: 3px solid #1976d2;
            }

            .container-fluid input:focus, .container-fluid select:focus, .container-fluid textarea:focus{
                border: 1px solid #1976d2;
                border-bottom: 3px solid #1976d2;
            }

            label{
                font-weight: 600;
            }

            .input-group-text{
                height: 40px;
                color: #0ead69;
                font-weight: bold;
            }

            .modal-body .input-group .btn{
                background: #1976d2;
                margin: 0;
                height: 41px;
            }

            .button-group button, .table a, .button-group a{
                border: none;
                width: fit-content;
                height: 45px;
                margin: 20px 5px 20px 5px;
                font-weight: bold;
                border-radius: 10px;
            }

            .input-group button{
                border: 1px solid #6c757d;
                border-bottom: 3px solid #6c757d;
            }

            .modal-content button{
                background: #1976d2;
                width: fit-content;
                height: 40px;
                margin: 10px;
                font-weight: bold;
                border-radius: 10px;
            }

            .btn{
                width: fit-content;
                font-weight: bold;
                border-radius: 10px;
            }

            .table .btn-editar{
                width: fit-content;
                margin: 5px;
                height: fit-content;
            }

            .button-group a{
                padding-top: 10px;
            }

            .buttons .buttons-print{
                background: #ba0c0c;
            }

            .buttons .buttons-excel{
                background: #208b3a;
            }

            h3{
                font-weight: bold;
                text-align: left;
                font-size: 30px;
                margin: 30px;
                margin-left: 60px;
            }

            td li{
                height: 35px;
                border-radius: 30px;
            }

            .radio-buttons{
                border: 1px solid #eee;
                border-radius: 30px;
                padding: 0px 10px 5px 10px;
                font-weight: bold;
                width: fit-content;
                height: 45px;
            }

            input[id="comprobante-si"]:hover, input[id="comprobante-si"]:checked, input[id="comprobante-si"]:focus{
                background-color: #0ead69;
            }

            input[id="comprobante-no"]:hover, input[id="comprobante-no"]:checked, input[id="comprobante-no"]:focus{
                background-color: #ad0e0e;
            }

            .radio-body{
                padding: 7px;
                padding-right: 10px;
            }
        </style>
    </head>

    <body class="antialiased">

        @include('layouts.partials.navbar')
        <main class="container-fluid">
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
