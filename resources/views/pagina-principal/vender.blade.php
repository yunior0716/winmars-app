@extends('layouts.inicio-master')
<title>Winmars Properties | Vender</title>

@section('content')  

    <div class="section-vender-box">  
        <div class="hero-title-vender">
            <h1>¡Vende con nosotros!</h1>
            <h3>Ahorra gastos en publicidad y el estres que supone vender un inmueble. </h3>
            <h4 align="justify">Solo debes llenar el formulario de evaluacion a continuacion y nosotros nos escargamos del resto. </h4>
        </div>
        <div class="evaluacion-button" style="text-align: center;">
            <button data-tf-popup="oiunI0qA" class="vender-button" data-tf-iframe-props="title=Vender-form" data-tf-medium="snippet">Iniciar evaluacion</button>
        </div> 
    </div>

    <script src="//embed.typeform.com/next/embed.js"></script>

@endsection