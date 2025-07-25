@extends('layouts.inicio-master')

@php
    Use App\Models\propiedades;
    Use App\Models\imagenes;
    $propiedades = propiedades::all();

    $propiedades = propiedades::join('tipo_propiedades','propiedades.codtpro', '=', 'tipo_propiedades.codtpro')
    ->where('tipo_propiedades.tippro', $peticion->tipo)->get();

    if(!is_null($peticion->ubicacion)){
        $propiedades = propiedades::join('tipo_propiedades','propiedades.codtpro', '=', 'tipo_propiedades.codtpro')
        ->join('direcciones','propiedades.codpro', '=', 'direcciones.codpro')
        ->where('tipo_propiedades.tippro', $peticion->tipo)->where('direcciones.ciudad', $peticion->ubicacion)->get();
    }

    $cantidad = 0;
@endphp

@section('content')
    <div class="row" style="display:flex; align-items:center; justify-items:center; height: 150px; width:100%; background:#e3f2fd; margin-top: 70px;">
        <div class="col">
            <div class="search-box-comprar-alquilar">
                <form class="form" action="/comprar-alquilar" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col"> 
                            <label for="">Que te interesa</label>
                            <select class="form-select shadow-none" name="accion" id="accion">
                                <option value="Comprar" selected>Comprar</option>
                                <option value="Alquilar">Alquilar</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Ciudad</label>
                            <div class="input-group">
                                <input type="text" class="form-control shadow-none" name="ubicacion" placeholder="Ciudad donde te interesaria el inmueble.">
                                
                            </div>
                        </div>
                        <div class="col"> 
                            <label for="">Tipo inmueble:</label>
                            <select class="form-select shadow-none" name="tipo" id="tipo">
                                <option value="Apartamento" selected>Apartamento</option>
                                <option value="Casa">Casa</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Habitaciones:</label>
                            <input type="number" min="1" max="5" name="habit" class="form-control shadow-none" placeholder="Cuantas habitaciones desea...">
                        </div>
                        <div class="col">
                            <label for="">Baños:</label>
                            <input type="number" min="1" max="5" name="baños" class="form-control shadow-none" placeholder="Cuantas baños desea...">
                        </div>
                        <div class="col">
                            <button class="btn btn-primary shadow-none" style="margin-top: 20px;" id="buscar" > <i class="fa-solid fa-search"></i> Buscar</button>
                        </div>
                        
                    </div>
                </form>
            </div> 
        </div>
        </div>
    </div>

    <div class="row" style="display:flex; align-items:center; justify-items:center;  height: 80px; width:100%; background:#e3f2fd; ">
        <div class="col" style="text-align:left; margin-left: 40px;">
            <h5 id="registros"><span id="cantidad-encontrada" style="color:#0466c8;"></span> resultados encontrados</h5>
        </div>
    </div>

    <div class="row" style="display:flex; justify-content:center; width: 90%; margin: 40px; ">
        
        @if(!is_null($peticion))
            @foreach($propiedades as $propiedad)
                @php
                    $thumbnail = imagenes::where('codpro', $propiedad->codpro)->first();
                @endphp
                @if(($peticion->accion == 'Alquilar' && $propiedad->preren > 0) || ($peticion->accion == 'Comprar' && $propiedad->preren > 0))
                    @if(!is_null($peticion->habit) && !is_null($peticion->baños))
                        @if($propiedad->habit == $peticion->habit && $propiedad->baños == $peticion->baños)
                        @php 
                            $cantidad = $cantidad + 1; 
                        @endphp
                        <script> document.getElementById('cantidad-encontrada').innerHTML = {{ $cantidad }} </script>
                        <div class="property" style=" width:fit-content; margin: 20px; padding: 0; backgroud: white;">
                            <div class="propiedad-image">
                                <a href="mostrar-propiedad?id={{ $propiedad->codpro }}&peticion={{ $peticion->peticion }}">
                                <img  style="border: 3px solid #0466c8; border-radius: 35px; width: 350px; height: 200px;" src="{{ url($thumbnail->url) }}" alt="property-image">
                                </a>
                            </div>
                            <h5 style="text-align:left; font-weight: bold; font-size: 16px; margin-top: 10px; margin-left: 20px;">{{ $propiedad->titulo }}</h5>
                            @if($peticion->accion == 'Comprar')
                                <p style="color:#0466c8; text-align:left; font-weight: bold; font-size: 24px; margin-left:20px; margin-bottom: 5px;">{{ 'US$'. number_format($propiedad->preven, 0, '.', ',') }}</p>
                            @else
                                <p style="color:#0466c8; text-align:left; font-weight: bold; font-size: 24px; margin-left:20px; margin-bottom: 5px;">{{ 'US$'. number_format($propiedad->preren, 0, '.', ',') }}</p>
                            @endif
                            <ul style=" padding:0; display:flex; list-style-type: none; text-align: left; font-weight: 600; color:#0466c8;" >
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-bed"></i> {{ $propiedad->habit }}</li>
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-bath"></i> {{ $propiedad->baños }}</li>
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-car"></i> {{ $propiedad->parqueo }}</li> 
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-map"></i> {{ $propiedad->metros. " M²" }}</li>
                            </ul>
                        </div>
                        @endif
                    @elseif(!is_null($peticion->habit))
                        @if($propiedad->habit == $peticion->habit)
                        @php 
                            $cantidad = $cantidad + 1; 
                        @endphp
                        <script> document.getElementById('cantidad-encontrada').innerHTML = {{ $cantidad }} </script>
                        <div class="property" style=" width:fit-content; margin: 20px; padding: 0; backgroud: white;">
                            <div class="propiedad-image">
                                <a href="mostrar-propiedad?id={{ $propiedad->codpro }}&peticion={{ $peticion->peticion }}">
                                    <img  style="border: 3px solid #0466c8; border-radius: 35px; width: 350px; height: 200px;" src="{{ url($thumbnail->url) }}" alt="property-image">
                                    </a>
                            </div>
                            <h5 style="text-align:left; font-weight: bold; font-size: 16px; margin-top: 10px; margin-left: 20px;">{{ $propiedad->titulo }}</h5>
                            @if($peticion->accion == 'Comprar')
                                <p style="color:#0466c8; text-align:left; font-weight: bold; font-size: 24px; margin-left:20px; margin-bottom: 5px;">{{ 'US$'. number_format($propiedad->preven, 0, '.', ',') }}</p>
                            @else
                                <p style="color:#0466c8; text-align:left; font-weight: bold; font-size: 24px; margin-left:20px; margin-bottom: 5px;">{{ 'US$'. number_format($propiedad->preren, 0, '.', ',') }}</p>
                            @endif
                            <ul style=" padding:0; display:flex; list-style-type: none; text-align: left; font-weight: 600; color:#0466c8;" >
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-bed"></i> {{ $propiedad->habit }}</li>
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-bath"></i> {{ $propiedad->baños }}</li>
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-car"></i> {{ $propiedad->parqueo }}</li> 
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-map"></i> {{ $propiedad->metros. " M²" }}</li>
                            </ul>
                        </div>
                        @endif
                    @elseif(!is_null($peticion->baños))
                        @if($propiedad->baños == $peticion->baños)
                        @php 
                            $cantidad = $cantidad + 1; 
                        @endphp
                        <script> document.getElementById('cantidad-encontrada').innerHTML = {{ $cantidad }} </script>
                        <div class="property" style=" width:fit-content; margin: 20px; padding: 0; backgroud: white;">
                            <div class="propiedad-image">
                                <a href="mostrar-propiedad?id={{ $propiedad->codpro }}&peticion={{ $peticion->peticion }}">
                                    <img  style="border: 3px solid #0466c8; border-radius: 35px; width: 350px; height: 200px;" src="{{ url($thumbnail->url) }}" alt="property-image">
                                    </a>
                            </div>
                            <h5 style="text-align:left; font-weight: bold; font-size: 16px; margin-top: 10px; margin-left: 20px;">{{ $propiedad->titulo }}</h5>
                            @if($peticion->accion == 'Comprar')
                                <p style="color:#0466c8; text-align:left; font-weight: bold; font-size: 24px; margin-left:20px; margin-bottom: 5px;">{{ 'US$'. number_format($propiedad->preven, 0, '.', ',') }}</p>
                            @else
                                <p style="color:#0466c8; text-align:left; font-weight: bold; font-size: 24px; margin-left:20px; margin-bottom: 5px;">{{ 'US$'. number_format($propiedad->preren, 0, '.', ',') }}</p>
                            @endif
                            <ul style=" padding:0; display:flex; list-style-type: none; text-align: left; font-weight: 600; color:#0466c8;" >
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-bed"></i> {{ $propiedad->habit }}</li>
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-bath"></i> {{ $propiedad->baños }}</li>
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-car"></i> {{ $propiedad->parqueo }}</li> 
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-map"></i> {{ $propiedad->metros. " M²" }}</li>
                            </ul>
                        </div>
                        @endif
                    @else
                        @php 
                            $cantidad = $cantidad + 1; 
                        @endphp
                        <script> document.getElementById('cantidad-encontrada').innerHTML = {{ $cantidad }} </script>
                        <div class="property" style=" width:fit-content; margin: 20px; padding: 0; backgroud: white;">
                            <div class="propiedad-image">
                                <a href="mostrar-propiedad?id={{ $propiedad->codpro }}&peticion={{ $peticion->accion }}">
                                    <img  style="border: 3px solid #0466c8; border-radius: 35px; width: 350px; height: 200px;" src="{{ url($thumbnail->url) }}" alt="property-image">
                                    </a>
                            </div>
                            <h5 style="text-align:left; font-weight: bold; font-size: 16px; margin-top: 10px; margin-left: 20px;">{{ $propiedad->titulo }}</h5>
                            @if($peticion->accion == 'Comprar')
                                <p style="color:#0466c8; text-align:left; font-weight: bold; font-size: 24px; margin-left:20px; margin-bottom: 5px;">{{ 'US$'. number_format($propiedad->preven, 0, '.', ',') }}</p>
                            @else
                                <p style="color:#0466c8; text-align:left; font-weight: bold; font-size: 24px; margin-left:20px; margin-bottom: 5px;">{{ 'US$'. number_format($propiedad->preren, 0, '.', ',') }}</p>
                            @endif
                            <ul style=" padding:0; display:flex; list-style-type: none; text-align: left; font-weight: 600; color:#0466c8;" >
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-bed"></i> {{ $propiedad->habit }}</li>
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-bath"></i> {{ $propiedad->baños }}</li>
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-car"></i> {{ $propiedad->parqueo }}</li> 
                                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-map"></i> {{ $propiedad->metros. " M²" }}</li>
                            </ul>
                        </div>
                    @endif
                @endif
            @endforeach
            
            @if($cantidad == 0)
                <script> document.getElementById('cantidad-encontrada').innerHTML = {{ $cantidad }} </script>
                <h2>No se han encontrado resultados</h2>
            @endif
        @endif
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

    <div class="contacto-fondo">
        <div class=" contacto-container">
            <div class="row" style="padding: 20px; ">
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