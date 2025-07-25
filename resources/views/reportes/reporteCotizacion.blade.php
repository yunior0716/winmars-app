
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Reporte Cotizacion No. {{ Session::get('cotizacion.numcot') }}</title>
		<link href="{{ url('assets/css/Font-open-sans.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ url('assets/css/reporte.css') }}">
		{{-- <script src="{{ url('assets/js/sweetalert2.all.min.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js" integrity="sha512-vNrhFyg0jANLJzCuvgtlfTuPR21gf5Uq1uuSs/EcBfVOz6oAHmjqfyPoB5rc9iWGSnVE41iuQU4jmpXMyhBrsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
	</head>

	
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
									Cotizacion No. {{ Session::get('cotizacion.numcot') }} <br />
									Fecha de Emision: <span id="fecemis"></span> <br />
									Fecha de Vencimiento: {{ date("d/m/Y h:i", strtotime(Session::get('cotizacion.fecvenc'))) }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading" style="background: transparent;text-align:center;" >
					<td></td>
					<td> </td>
					<td>Contizacion</td>
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
	  			    <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('cotizacion.subtot'),2,'.',',') }}</td>
                    <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('cotizacion.subtot')*Session::get('propiedad.itbis'),2,'.',',') }}</td>
                    <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('cotizacion.total'),2,'.',',') }}</td>
					
				</tr>

				<tr class="heading">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>Subtotal:</td>
                    <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('cotizacion.subtot'),2,'.',',') }}</td>
				</tr>

				<tr class="heading">
					<td></td>
					<td></td>
					<td></td>
                    <td></td>
					<td>Itbis:</td>
                    <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('cotizacion.subtot')*Session::get('propiedad.itbis'),2,'.',',') }}</td>
				</tr>
				<tr class="heading">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>Total:</td>
                    <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('cotizacion.total'),2,'.',',') }}</td>
				</tr>
			</table>
			<div style="margin: 20px; text-align: right; margin-top: 30px;">
				<label style="font-weight: 700; font-size: 18px;">Autorizado por: ______________________</label> <br /><br />
				<label style="font-weight: 700; font-size: 18px; margin-right: 80px;">Maricela Filpo</label> <br />
				<label style="font-weight: 700; font-size: 18px; margin-right: 70px;">Gerente General</label>
			</div>
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
		}
    </script>
</html>