
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Reporte Factura No. {{ Session::get('facturas.numfac') }}</title>
		<link href="{{ url('assets/css/Font-open-sans.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ url('assets/css/reporte.css') }}">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		{{-- <script src="{{ url('assets/js/sweetalert2.all.min.js') }}"></script> --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js" integrity="sha512-vNrhFyg0jANLJzCuvgtlfTuPR21gf5Uq1uuSs/EcBfVOz6oAHmjqfyPoB5rc9iWGSnVE41iuQU4jmpXMyhBrsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	</head>

	{{-- @php
		use App\Models\direcciones;
		use App\Models\facturas;
		use App\Models\clientes;
		use App\Models\propiedades;
		use App\Models\detalle_factura;
		$direccionPropiedad = direcciones::where('codpro', Session::get('detalle.codpro'))->first();
		$factura = facturas::where('numfac', Session::get('facturas.numfac'))->first();
		$cliente = clientes::where('codcli', Session::get('cliente.codcli'))->first();
		$clienteV = clientes::where('codcli', Session::get('propiedad.codcli'))->first();
		$propiedad = propiedades::where('codpro', Session::get('propiedad.codpro'))->first();
		$detalle = detalle_factura::where('numfac', Session::get('facturas.numfac'))->first();
	@endphp --}}
	
	<body>
		{{-- <div class="button">
			<button id="download"><i class="fas fa-file-pdf"></i> PDF</button>
		</div> --}}
	
		<div class="invoice-box" id="invoice-box">
			
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="6">
						<table>
							<tr>
								<td class="title">
									<img src="{{ url('assets/img/LOGO WM PROPERTIE horizontal.png') }}" style="width: 100%; max-width: 300px" />
								</td>

								<td>
									Factura No. {{ Session::get('facturas.numfac') }} <br />
									Fecha de Emision: <span id="fecemis"></span> <br />
									Fecha de Vencimiento: {{ date("d/m/Y h:i", strtotime(Session::get('facturas.fecvenc'))) }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading" style="background: transparent;text-align:center;" >
					<td></td>
					<td> </td>
					<td>Factura</td>
					<td> </td>
					<td> </td>
					<td> </td>

				</tr>

				<tr class="heading">
					<td>Informacion de contacto</td>

					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>

				</tr>
				<tr class="information">
					<td colspan="6">
						<table>
							<tr>
								<td>
                                    <b>Winmars Properties, S.R.L.</b> <br />
                                    <b>RNC:</b> 132239768 <br />
									<b>Direccion:</b> Edificio Mia Molina A-1, Canabacoa
                                                <br />
                                    Santiago De Los Caballeros, 51000 <br />
                                    <b>Teléfono:</b> 809-889-2709 <br />
                                    <b>Correo:</b> winmarsproperties@gmail.com
								</td>
								<td>  </td>
							</tr>
						</table>
					</td>
				</tr>


				<tr class="heading">
					<td>Datos del cliente</td>

					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>

				</tr>

				<tr class="details">
					<td>
						<b>Cliente:</b> {{ Session::get('cliente.nomcli'). ' '.Session::get('cliente.apecli') }} <br />
                        <b>Direccion:</b> {{ Session::get('cliente.dircli') }}<br />
						<b>Cedula/RNC:</b> {{ Session::get('cliente.cedrnc') }}<br />
                        <b>Teléfono:</b> {{ Session::get('cliente.tecli1') }} <br />
						@if (is_null(Session::get('cliente.tecli2')))
							
						@else
							<b>Celular:</b> {{ Session::get('cliente.tecli2') }} <br />
						@endif
					</td>
				</tr>

				<tr class="heading">
					<td>Descripcion de la propiedad</td>
					<td>Concepto</td>
					<td>Cantidad</td>
                    <td style="text-align: right;">Precio</td>
                    <td style="text-align: right;">Itbis</td>
                    <td style="text-align: right;">Total</td>
				</tr>

				<tr class="item">
					<td>{{ Session::get('propiedad.titulo') }}</td>     
					<td>{{ Session::get('detalle.concepto') }}</td>
					<td>{{ Session::get('detalle.cantidad') }}</td>
	  			    <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('facturas.subtot'),2,'.',',') }}</td>
                    <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('facturas.subtot')*Session::get('propiedad.itbis'),2,'.',',') }}</td>
                    <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('facturas.total'),2,'.',',') }}</td>
					
				</tr>

				<tr class="heading">
					<td>Forma de pago: {{ Session::get('facturas.form_pag') }}</td>
					<td></td>
					<td></td>
					<td></td>
					<td>Subtotal:</td>
                    <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('facturas.subtot'),2,'.',',') }}</td>
				</tr>

				<tr class="heading">
					<td></td>
					<td></td>
					<td></td>
                    <td></td>
					<td>Itbis:</td>
                    <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('facturas.subtot')*Session::get('propiedad.itbis'),2,'.',',') }}</td>
				</tr>
				<tr class="heading">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>Total:</td>
                    <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('facturas.total'),2,'.',',') }}</td>
				</tr>
				<input type="text" value="{{ Session::get('detalle.concepto') }}" id="concepto" hidden>
				<input type="text" value="{{ Session::get('facturas.condicion') }}" id="condicion" hidden>
			</table>
			<div style="margin: 20px; text-align: right; margin-top: 30px;">
				<label style="font-weight: 700; font-size: 18px;">Autorizado por: ______________________</label> <br /><br />
				<label style="font-weight: 700; font-size: 18px; margin-right: 80px;">Maricela Filpo</label> <br />
				<label style="font-weight: 700; font-size: 18px; margin-right: 70px;">Gerente General</label>
			</div>
		</div>

		<div id="contrato-inquilinato" class="contrato-inquilinato" style="display: none; ">
			<h1 align= "center"> Contrato de Inquilinato  </h1>  <br />  <b></b>
            <h3>ENTRE: </h3>
			<p align="justify">LA PRIMERA PARTE: <span style="text-transform: uppercase;"><b>{{ Session::get('clienteVendedor.nomcli'). ' ' .Session::get('clienteVendedor.apecli') }}</b></span>, 
				dominicano/a, mayor de edad,  portador/a de la Cédula/RNC No. {{ Session::get('clienteVendedor.cedrnc') }}, 
				domiciliado/a y residente en {{ Session::get('clienteVendedor.dircli') }}; el cual en lo adelante 
				y para los fines del presente contrato se denominará  <b>EL PROPIETARIO/A;</b>
				</p> 

               <p align="justify"> LA SEGUNDA PARTE: <span style="text-transform: uppercase;"><b>{{ Session::get('cliente.nomcli'). ' ' .Session::get('cliente.apecli') }}</b></span>, 
			   	dominicano/a, mayor de edad, portador/a de la cédula/RNC No. {{ Session::get('cliente.cedrnc') }}, domiciliado/a y
			    residente en {{ Session::get('cliente.dircli') }}, el cual en lo adelante y para los fines del presente
			    contrato se denominará <b>EL/LA INQUILINO/A</b>.</p> 

				<h3 align= "center"><b>HAN CONVENIDO Y PACTADO LO SIGUIENTE:</b> </h3>  <br />

				<p align="justify"><b>PRIMERO: Objeto. EL/LA PROPIETARIO/A,</b>  por medio del presente 
					acto, da en alquiler, a favor de <b>EL/LA INQUILINO/A</b>, el cual acepta, el 
					inmueble que se describe a continuación: 
					</p>

				<p align="justify">“Un inmueble que cuenta con {{ Session::get('propiedad.habit') }} habitaciones, 
					{{ Session::get('propiedad.baños') }} baño/s, {{ Session::get('propiedad.metros') }} m² de construcción,
					identificado como {{ Session::get('propiedad.titulo') }}, ubicado en {{ Session::get('direccion.direccion'). ', ' .Session::get('direccion.municipio').', '.Session::get('direccion.ciudad') }},
					Republica Dominicana, el cual a sido visto y encontrado a entera satisfacción por el/la INQUILINO/A, quien lo 
					usara para fines exclusivamente como vivienda, no pudiendo dedicarlo a otros fines, ni cederlos sin el consentimiento escrito 
					de EL PROPIETARIO/A"
				</p>

				<p align="justify"><b>SEGUNDO: Precio del alquiler.</b> La cantidad convenida como 
					precio del presente inquilinato es la suma de <b>US$ {{ $money_number = number_format(Session::get('propiedad.preren'),2,'.',',') }}</b> 
					durante los {{ Session::get('detalle.cantidad') }} meses para una suma total con impuestos de <b>US$ {{ $money_number = number_format(Session::get('facturas.total'),2,'.',',') }}</b> , pagaderos mensuales a más tardar los días 15 de cada mes; 
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

				<br />
				<br />
				<br />
				<br />
				<br />
				<br />

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
				partes en la ciudad de Santiago, República Dominicana, a la fecha {{ date("d/m/Y") }}.</p> <br />

				<p align="center"><b></b>
				<label>____________________________________________</label> <br />
				<b><span style="text-transform: uppercase;">{{ Session::get('clienteVendedor.nomcli'). ' ' .Session::get('clienteVendedor.apecli') }} </span></b> <br />
				<b>PROPIETARIO/A</b></P>
				</p>

				<p align="center"><b></b>
				<label>____________________________________________</label> <br />
				<p align="center"><b><span style="text-transform: uppercase;">{{ Session::get('cliente.nomcli'). ' ' .Session::get('cliente.apecli') }} </span></b> <br />
				<b>INQUILINO/A</b></p> <br />
				
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
				República Dominicana, a la fecha {{ date("d/m/Y") }}. </p> <br /> <br />
				
				<p align="center"><b></b>
				<label>________________________________________________</label> <br />
				<p align="center"><b>LIC. ARTURO AUGUSTO RODRIGUEZ FDEZ.<br />
				NOTARIO PÚBLICO </b></p> <br />
		</div>

		<div id="contrato-promesa" class="contrato-promesa" style="display: none; ">
			<h2 style="text-align: center";><b>CONTRATO DE PROMESA<br> DE COMPRAVENTA INMOBILIARIA</b></h2>
			<h3> <br> ENTRE: <br></h3>
			<p align="justify">EL PROPIETARIO/A: <span style="text-transform: uppercase;"><b>{{ Session::get('clienteVendedor.nomcli'). ' ' .Session::get('clienteVendedor.apecli') }}</b></span>, 
				dominicano/a, mayor de edad,  portador/a de la Cédula/RNC No. {{ Session::get('clienteVendedor.cedrnc') }}, 
				domiciliado/a y residente en {{ Session::get('clienteVendedor.dircli') }}; el cual en lo adelante 
				y para los fines del presente contrato se denominará  <b>LA PRIMERA PARTE;</b>
				</p> 

               <p align="justify"> EL/LA COMPRADOR/A: <span style="text-transform: uppercase;"><b>{{ Session::get('cliente.nomcli'). ' ' .Session::get('cliente.apecli') }}</b></span>, 
			   	dominicano/a, mayor de edad, portador/a de la cédula/RNC No. {{ Session::get('cliente.cedrnc') }}, domiciliado/a y
			    residente en {{ Session::get('cliente.dircli') }}, el cual en lo adelante y para los fines del presente
			    contrato se denominará <b>LA SEGUNDA PARTE</b>.</p> 
			
			<h3><b> SE HA CONVENIDO Y PACTADO LO SIGUIENTE:</b></h3>

			<p align="justify"> <b>ARTICULO PRIMERO: Objeto de la Promesa de Venta: LA PRIMERA PARTE, por medio del presente</b> contrato, otorga en favor de <b> LA SEGUNDA PARTE, </b> quien acepta, con todas las garantías ordinarias y de derecho, formal e irrevocable promesa de venta, bajo las condiciones que más adelante se indicarán, respecto de los inmuebles que se describes descrito a continuación. -</p>
		
			<p align="justify">“Un inmueble que cuenta con {{ Session::get('propiedad.habit') }} habitaciones, 
				{{ Session::get('propiedad.baños') }} baño/s, {{ Session::get('propiedad.metros') }} m² de construcción,
				identificado como {{ Session::get('propiedad.titulo') }}, ubicado en {{ Session::get('direccion.direccion'). ', ' .Session::get('direccion.municipio').', '.Session::get('direccion.ciudad') }},
				Republica Dominicana, el cual a sido visto y encontrado a entera satisfacción por el/la COMPRADOR/A, quien lo 
				usara para fines exclusivamente como vivienda, no pudiendo dedicarlo a otros fines, ni cederlos sin el consentimiento escrito 
				de EL PROPIETARIO/A"
		
		      <p align="justify"><b>ARTICULO SEGUNDO: Precio de la Promesa de Venta y Forma de Pago.</b> El precio de la presente promesa de venta del inmueble 
				anteriormente indicado ha sido convenido y pactado por las partes en la suma de <b>US$ {{ $money_number = number_format(Session::get('propiedad.preven'),2,'.',',') }}</b>  
				cuya</b> suma será pagada por <b>EL COMPRADOR,</b> de la manera siguiente:</p>


			<p align="justify"> a)<b> La suma de US$ {{ $money_number = number_format(Session::get('propiedad.preven')* 0.20,2,'.',',')}}</b> , a la firma
				del presente contrato por concepto de avance, y cuya suma <b>EL PROPIETARIO</b>
				reconoce haber recibido en dinero en efectivo en esta misma fecha y de manos de
				<b>EL COMPRADOR</b>, por lo cual le otorga el correspondiente recibo de pago y
				descargo por dicha suma y concepto.
				 </p>

				 
				 <p align="justify">b) La suma restante de<b> US$ {{ $money_number = number_format(Session::get('propiedad.preven') - Session::get('propiedad.preven')* 0.20,2,'.',',')}}</b>
					 la cual será pagada o financiada con una institución financiera,
					a más tardar al momento de la entrega del inmueble. -</p>

				 <p align="justify">c)<b>PÁRRAFO:</b>Tanto <span style="text-transform: uppercase;"><b>{{ Session::get('clienteVendedor.nomcli'). ' ' .Session::get('clienteVendedor.apecli') }}</b></span> como <b>
					<span style="text-transform: uppercase;"><b>{{ Session::get('cliente.nomcli'). ' ' .Session::get('cliente.apecli') }}</b></span></b>, se obliga y comprometen a firmar y suscribir cuantos documentos fueren de lugar a
					fin de que puedan ser traspasados los derechos inmobiliarios objeto del presente
					contrato, cuando hayan cumplido con</p>

				 <p align="justify"><b>ARTICULO TERCERO: INCUMPLIMIENTO DE LAS PARTES</b>. Las partes
					convienen que en caso de que <b>EL BENEFICIARIO</b> incumpla su obligación de comprar el
					inmueble objeto del presente contrato en las condiciones antes indicadas, perderá
					<b>EL CINCUENTA PORCIENTO ( 50%) </b> la suma adelantada y
					entregada <b> Al OFERTANTE</b> por concepto de avance; y si el señor <b><span style="text-transform: uppercase;"><b>{{ Session::get('clienteVendedor.nomcli'). ' ' .Session::get('clienteVendedor.apecli') }}</b></span>
					 que incumple su obligación de vender el inmueble objeto del presente
					contrato en las condiciones antes indicadas, devolverá la suma entregada como
					avance, más un cincuenta por ciento (50%) del total entregado como avance por
					<b>El COMPRADOR</b>. En caso de que <span style="text-transform: uppercase;"><b>{{ Session::get('cliente.nomcli'). ' ' .Session::get('cliente.apecli') }}</b></span></b> no cumpla con el acápite (b)
					del artículo segundo, y una vez transcurridos treinta (30) días después de la notificación de la
					terminación y la ofertante entrega de dicho apartamento éste pagará un tres por ciento (3%)de
					interés mensual en pesos de la suma adeudada. La documentación (título de propiedad) será
					entregada 1 mes antes de la entrega formal de dicho apartamento</p>
				 
				 <p align="justify"><b>ARTICULO CUARTO: ACTO DEFINITIVO DE VENTA:</b> Una vez ambas partes
					hayan cumplido con todas las obligaciones puestas a su cargo, se comprometen además a suscribir
					el acto de Compraventa definitiva, tendiente a traspasar el inmueble objeto del presente
					contrato</p>
				 <p align="justify"><b>ARTICULO QUINTO: EL COMPRADOR,</b> se compromete y obliga a pagar todos los impuestos de ley y honorarios de abogados relativos a la transferencia definitiva del inmueble
					anteriormente indicada.
					</p>
				 <p align="justify"><b>ARTICULO SEXTO: JURISDICCIÓN COMPETENTE Y LEY APLICABLE.</b> Las
					partes acuerdan que la jurisdicción competente para dirimir cualquier diferendo
					relacionado con el presente contrato será la de los tribunales de la ciudad de Santiago de los
					Caballeros, que es el domicilio donde radica el inmueble objeto del presente contrato, y que las
					únicas leyes aplicables serán las de la República Dominicana.-</p>
					<br />
					<br />
					<br />
					<br />
					<br />
					<br />



				 <p align="justify"><b>ARTICULO SÉPTIMO: JUSTIFICACIÓN DE DERECHO DE
					PROPIEDAD: LA PRIMERA PARTE</b> justifica su derecho de propiedad del
					inmueble objeto de la presente promesa de venta, en virtud del Certificado de
					Título Matricula No,0200173139, inscrito en el libro 2100, folio187, expedido a su
					favor por el Registrador de títulos del Departamento de Santiago.
					</p>
				 <p align="justify"><b>ARTICULO OCTAVO: ELECCIÓN DE DOMICILIO.</b> Para todos los
					fines y consecuencias legales del presente contrato, las partes eligen domicilio atributivo de
					competencia de la siguiente manera: a) EL COMPRADOR en su domicilio referido
					en el cuerpo del presente contrato; y b) EL VENDEDOR en su dirección
					anteriormente descrita, y en su defecto en la Procuraduría Fiscal de Santiago, donde desde
					ya reconocen la validez de todas las notificaciones que hubiere que efectuar.-</p>

				 <p align="justify"><b>ARTICULO NOVENO: LA PRIMERA PARTE;</b> se compromete a entregar dicho
					apartamento en el mes de mayo 2022. Dicha fecha no será variada si los atrasos no son
					provocados por casos fortuitos o de fuerza mayor, tales como (terremotos, guerra, huelgas,
					huracanes, vaguadas). </p>

				 <p align="justify"><b>HECHO, CONVENIDO, PACTADO Y FIRMADO</b> de buena fe entre las partes en dos (2)
					originales de un mismo tenor y efecto, uno para cada una de las partes contratantes y el
					restante para ser archivado por el Notario Público actuante, en la ciudad de Santiago de
					los Caballeros, Municipio y Provincia de Santiago, República Dominicana,  a la fecha {{ date("d/m/Y") }}</p> <br />

					<h3 style="text-align: center";><b>EL VENDEDOR	</b></h3><br />
					<p align="center"><b></b>
						<label>____________________________________________</label> <br />
					 <p align="center"><b><span style="text-transform: uppercase;"><b>{{ Session::get('clienteVendedor.nomcli'). ' ' .Session::get('clienteVendedor.apecli') }}</b></span> <br />
						</p> <br />


						<h3 style="text-align: center";><b>EL COMPRADOR	</b></h3><br />
					<p align="center"><b></b>
							<label>____________________________________________</label> <br />
						 <p align="center"><b>THOMAS B SPIESS
					</b> <br />
					</p> <br />
						 <p align="center"><span style="text-transform: uppercase;"><b>{{ Session::get('cliente.nomcli'). ' ' .Session::get('cliente.apecli') }}</b></span></b> <br />
							</p> <br />

				 	<p align="justify"><b>YO, LIC. JUAN GUILLERMO FRANCO,</b> Notario Público de los del número para el
					Municipio de Santiago, con Matricula del Colegio Dominicano de Notarios No.584, con
					estudio profesional abierto en la calle Privada No.12, La Moraleja, de esta ciudad de
					Santiago de los Caballeros, con teléfonos Nos.809-734-2223/24, e-mail: Info@kanada.do,
					<b>CERTIFICO Y DOY FE:</b> Que las firmas que aparecen en el presente acto fueron puestas
					libre y voluntariamente en mi presencia por los señores<b> JOSÉ EDWIN J. RODRIGUEZ
					RODRIGUEZ Y THOMAS B SPIESS</b> , quienes me han declarado que esas son las firmas
					que ellos acostumbran a usar en todos los actos de su vida pública y privada, a quienes
					también doy fe conocer y de haber identificado.- En la ciudad de Santiago de los
					Caballeros, Municipio y Provincia de Santiago, República Dominicana, a la fecha {{ date("d/m/Y") }}</p> <br />
				 
					<p align="center"><b></b>
						<label>____________________________________________</label> <br />
					 <p align="center"><b>LIC. JUAN GUILLERMO FRANCO</b> <br />
						NOTARIO PÚBLICO 
						</p> <br />

		</div>
</body>

	<script type="text/javascript">
        function fecha(){
            var today = new Date();
            var date = today.getDate().toString().padStart(2, "0")+'/'+(today.getMonth()+1).toString().padStart(2, "0")+'/'+today.getFullYear();
            var time = today.getHours().toString().padStart(2, "0") + ":" + today.getMinutes().toString().padStart(2, "0") + ":" + today.getSeconds().toString().padStart(2, "0");
            var dateTime = date+' '+time;

            document.getElementById('fecemis').innerHTML = dateTime;
        }
      
        fecha();

		window.onload = function(e) {
			/* const invoice = document.getElementById("invoice-box");
			html2pdf().from(invoice).save(); */
			window.print();
			var concepto = document.getElementById('concepto').value;
			var condicion = document.getElementById('condicion').value;
			if(concepto == 'Alquiler'){
				
				const invoice = document.getElementById("contrato-inquilinato");

				var clonedElement = invoice.cloneNode(true);

				$(clonedElement).css("display", "block");

				html2pdf().from(clonedElement).save();

				clonedElement.remove();

				/* var page = '/contratoInquilinato';
				var myWindow = window.open(page, "_blank"); */
			}else if(concepto == 'Venta' && condicion == 'Financiamiento'){
				const invoice = document.getElementById("contrato-promesa");

				var clonedElement = invoice.cloneNode(true);

				$(clonedElement).css("display", "block");

				html2pdf().from(clonedElement).save();

				clonedElement.remove();
			}
		}
    </script>
</html>