
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Contrato Inquilinato a {{ Session::get('cliente.nomcli'). ' '.Session::get('cliente.apecli') }}</title>
		<link href="{{ url('assets/css/Font-open-sans.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ url('assets/css/reporte.css') }}">
		{{-- <script src="{{ url('assets/js/sweetalert2.all.min.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js" integrity="sha512-vNrhFyg0jANLJzCuvgtlfTuPR21gf5Uq1uuSs/EcBfVOz6oAHmjqfyPoB5rc9iWGSnVE41iuQU4jmpXMyhBrsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
	</head>

	@php
		use App\Models\direcciones;
		$direccionPropiedad = direcciones::where('codpro', Session::get('detalle.codpro'))->first();
	@endphp

	<body>
		{{-- <div class="button">
			<button id="download"><i class="fas fa-file-pdf"></i> PDF</button>
		</div> --}}
	
		<div class="invoice-box" id="invoice-box">
			
			<h1 align= "center"> Contrato de Inquilinato  </h1>  <br />  <b></b>
            <h3>ENTRE: </h3>
			<p align="justify">LA PRIMERA PARTE: <b><p style="text-transform: uppercase;">{{ Session::get('clienteVendedor.nomcli'). ' ' .Session::get('clienteVendedor.apecli') }} </p></b>, dominicano/a,
				mayor de edad,  portador/a de la Cédula/RNC No. {{ Session::get('clienteVendedor.cedrnc') }}, 
				domiciliado/a y residente en {{ Session::get('clienteVendedor.dircli') }}; el cual en lo adelante 
				y para los fines del presente contrato se denominará  <b>EL PROPIETARIO/A;</b>
				</p> 

               <p align="justify"> LA SEGUNDA PARTE: <b><p style="text-transform: uppercase;">{{ Session::get('cliente.nomcli'). ' ' .Session::get('cliente.apecli') }}</b>, dominicano/a,
			    mayor de edad, portador/a de la cédula/RNC No. {{ Session::get('cliente.cedrnc') }}, domiciliado/a y
			    residente en {{ Session::get('cliente.dircli') }}, el cual en lo adelante y para los fines del presente
			    contrato se denominará <b>EL/LA INQUILINO/A</b>.</p> 

				<h3 align= "center"><b>HAN CONVENIDO Y PACTADO LO SIGUIENTE:</b> </h3>  <br />

				<p align="justify"><b>PRIMERO: Objeto. EL/LA PROPIETARIO/A,</b>  por medio del presente 
					acto, da en alquiler, a favor de <b>EL/LA INQUILINO/A</b>, el cual acepta, el 
					inmueble que se describe a continuación: 
					</p>

				<p align="justify">“Un inmueble que cuenta con {{ Session::get('propiedad.habit') }} habitaciones, 
					{{ Session::get('propiedad.baños') }} baño/s, {{ Session::get('propiedad.metros') }} m² de construcción,
					identificado como {{ Session::get('propiedad.titulo') }}, ubicado en {{-- {{ $direccionPropiedad->direccion. ' '. $direccionPropiedad->municipio. ' '. $direccionPropiedad->ciudad }} --}}
					,Republica Dominicana, el cual a sido visto y encontrado a entera satisfacción por el/la INQUILINO/A, quien lo 
					usara para fines exclusivamente como vivienda, no pudiendo dedicarlo a otros fines, ni cederlos sin el consentimiento escrito 
					de EL PROPIETARIO/A"
				</p>

				<p align="justify"><b>SEGUNDO: Precio del alquiler.</b> La cantidad convenida como 
					precio del presente inquilinato es la suma de <b>US {{ $money_number = number_format(Session::get('propiedad.preren'),2,'.',',') }}</b> 
					durante los {{ Session::get('detalle.cantidad') }} meses, pagaderos mensuales a más tardar los días 15 de cada mes; 
					Esta suma incluye el pago de la cuota mensual del mantenimiento de las áreas comunes.</p>

				<p align="justify">2.1. Queda debidamente convenido que al momento mismo de
					concluir este contrato y, al efectuarse la devolución de las llaves
					del inmueble objeto del alquiler y la entrega del mismo, deberá
					realizarse la revisión por parte de EL/LA PROPIETARIO/A; el depósito
					quedará retenido hasta tanto no se haya comprobado que <b>EL/LA
						INQUILINO/A</b> ha cumplido con todas las cláusulas del presente
					contrato. Se establece, además, que el inmueble objeto del
					presente inquilinato, será recibido por EL/LA PROPIETARIO/A en las
					mismas condiciones en que le fue entregado A <b>EL/LA INQUILINO/A.</b></p>

				<p align="justify"><b>TERCERO:</b> Duración del contrato. Este contrato se conviene por
					el término un ({{ Session::get('detalle.cantidad') }}) meses, a partir de la firma de este acuerdo, sin
					embargo, las obligaciones de EL/LA INQUILINO/A persistirán hasta el
					momento mismo en que real y efectivamente entregue A EL/LA
					PROPIETARIO/A las llaves del inmueble alquilado. </p>

				<p align="justify">3.1. Terminación anticipada por el/la propietario/a e inquilino/a. el/la propietario/a e inquilino/a, 
					tendrán la facultad de poner termino anticipado al contrato mediante notificación hecha por el escrito
					en el domicilio de elección de los mismos, sea por carta certificadas o por acto de alguacil.</p>

				<p align="justify">3.2. En caso de que <b>EL/LA INQUILINO/A</b> abandone el inmueble
					alquilado, sin entregar las llaves a EL/LA PROPIETARIO/A, ésta tendrá
					plenos derechos a considerar concluido el contrato. Se
					considera que hubo abandono, después de transcurrido cinco
					(5) días a partir de la notificación que hiciese EL/LA PROPIETARIO/A, haciéndole el requerimiento a 
					<b>EL/LA INQUILINO/A</b> en su domicilio de elección</p>


				<p align="justify"><b>CUARTO: EL/LA INQUILINO/A</b> , por medio del presente contrato queda
					obligada a mantener el inmueble en buen estado y todos los
					desperfectos en paredes, pisos, cisterna, puertas, ventanas,
					cristales, pestillos, cerraduras, instalación eléctrica y sanitaria
					(obstrucción de inodoros, lavamanos, fregadero y cualquier otro
					desagüe, cambio de zapatillas, roturas de llaves), y que se
					deban al uso ordinario del inmueble, van por cuenta de EL/LA INQUILINO/A, salvo la reparación de aquellos desperfectos
					ocasionados en edificaciones estructurales. También queda a
					cargo de EL/LA INQUILINO/A la pintura interior de la propiedad.
					Además, EL/LA INQUILINO/A tendrá el inmueble libre de animales
					dañinos. 
					</p>

				<p align="justify">4.1. Queda convenido entre las partes, que EL/LA PROPIETARIO/A
					tendrán la facultad de supervisar el inmueble alquilado por lo
					menos mensualmente; que <b>EL/LA INQUILINO/A</b> acepta y presta su
					consentimiento y se someterá a las reglas del condominio. 
					</p>

				<p align="justify">4.2. Los defectos pertenecientes a la construcción del inmueble
					(infiltraciones, tuberías subterráneas y entre paredes, etc.)
					serán de la responsabilidad de EL/LA PROPIETARIO/A, aunque no
					sean causados por estos; pero previa investigación realizada al
					efecto. 
					</p>

				<p align="justify"><b>QUINTO:</b> Si durante el curso de este contrato ocurriere en el
					inmueble alquilado algún caso de enfermedad contagiosa y fuere
					necesario la intervención de las autoridades para efectuar la
					desinfección, EL/LA PROPIETARIO/A tendrán esa facultad según la
					opinión de dichas autoridades y todos los gastos originados
					corresponderán por cuenta de <b>EL/LA INQUILINO/A</b>, además ésta se
					compromete a velar por el fiel cumplimiento de los reglamentos
					sanitarios, sean nacionales o municipales. </p>

				<p align="justify"><b>SEXTO:</b> <b>EL/LA INQUILINO/A</b> por medio de este contrato, se
					compromete a no hacer cambios o distribución nueva en el
					inmueble alquilado, sin la previa autorización por escrito de EL/LA
					PROPIETARIO/A, y en caso de ser obtenida; las mejoras hechas de
					cualquier naturaleza incluyendo las instalaciones sanitarias,
					telefónicas y eléctricas, quedan en beneficio de EL/LA
					PROPIETARIO/A, sin compensación de ninguna especie. </p>

				<p><b>SEPTIMO:</b> Queda acordado que los servicios de suministro de
					energía eléctrica, el servicio de agua potable y el suministro de
					gas GLP, será por cuenta de <b>EL/LA INQUILINO/A</b>, que deberá
					pagarlos puntualmente y hasta el último día del inquilinato junto
					con la mensualidad, lo cual se comprobará por la presentación
					de las facturas una vez hayan sido pagados. 
					</p>

				<p align="justify"><b>OCTAVO:</b> EL/LA PROPIETARIO/A no se responsabiliza por ningún
					daño o pérdida que EL/LA INQUILINO/A o cualquier persona que habite el inmueble alquilado sufra, ni tampoco sus efectos,
					objetos y valores que se encuentran en el inmueble alquilado.
					Como tampoco se hace responsable por los daños y perjuicios
					que pudiese sufrir el inquilinato con motivo de las lluvias,
					inundaciones, derrumbes, terremotos, tempestades, ciclones,
					etc. 
				</p>


				<p align="justify"><b>NOVENO:</b> Para los fines de ejecución y consecuencia del
				presente contrato, las partes eligen domicilio de la manera
				siguiente. EL/LA PROPIETARIO/A en su domicilio indicado al inicio del
				presente contrato y el inquilinato en el inmueble alquilado.</p>
				
				<p align="justify"><b>NOVENO PRIMERO:</b> Todos los gastos y honorarios del presente
				contrato serán por cuenta de EL/LA INQUILINO/A, así como los
				gastos, costas y honorarios de abogado; daños y perjuicios,
				gastos judiciales y extrajudiciales que se producen con motivo
				de la ejecución de este contrato. </p>
				
				<p align="justify"><b>HECHO Y FIRMADO:</b> En dos originales, uno para cada uno de las
				partes en la ciudad de Santiago, República Dominicana, a los
				dieciséis (16) días del mes de enero del año dos mil veintidós
				(2022)</p> <br />

				<p align="center"><b></b>
				<label>____________________________________________</label> <br />
				<b><p style="text-transform: uppercase;">{{ Session::get('clienteVendedor.nomcli'). ' ' .Session::get('clienteVendedor.apecli') }} </p></b> <br />
				PROPIETARIO/A</P>
				</p>

				<p align="center"><b></b>
				<label>____________________________________________</label> <br />
				<p align="center"><b><p style="text-transform: uppercase;">{{ Session::get('cliente.nomcli'). ' ' .Session::get('cliente.apecli') }} </p></b> <br />
				INQUILINA</p> <br />
				
				<p align="justify">Yo, <b>LIC. ARTURO AUGUSTO RODRIGUEZ FDEZ.</b>, notario público
				de los Del número para el Municipio de Santiago con Matrícula
				del Colegio Dominicano de Notarios número <b>5160</b> para ejercer
				en el municipio Santiago de los caballeros, provincia de
				Santiago, República Dominicana, con mi estudio profesional
				abierto en la calle Mella No.55 , Santiago de los Caballeros,
				República Dominicana; certifico y doy fe que las firmas que han
				sido puestas más arriba, pertenecen al señor <b>JAVIER AQUILES
					MOREL CASTILLO,</b> a la señora <b>MARIEL EMILIA GRULLON</b>
				PIMENTEL, y el señor <b>CHRISTOPHER ARIEL BARRERA RAMIREZ</b>
				los cuales me declaran, libre y voluntariamente que esa es la
				forma como cada uno de ellos acostumbra firmar en todos los
				actos de su vida civil. En la ciudad de Santiago de los Caballeros,
				República Dominicana, a los dieciséis (16) días del mes de enero
				del año dos mil veintidós (2022). </p> <br /> <br />
				
				<p align="center"><b></b>
				<label>_______________________________________________________________________</label> <br />
				<p align="center"><b>LIC. ARTURO AUGUSTO RODRIGUEZ FDEZ.
				NOTARIO PÚBLICO </b></p> <br />

		</div>
</body>

	<script type="text/javascript">
		window.onload = function(e) {
			/* const invoice = document.getElementById("invoice-box");
			html2pdf().from(invoice).save(); */
			window.print();
		}
    </script>
</html>