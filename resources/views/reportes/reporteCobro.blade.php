<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Reporte Cobro No. {{ Session::get('pago.codcob') }}</title>
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
                                Factura No. {{ Session::get('pago.codcob') }} <br />
                                Fecha de Emision: <span id="fecemis"></span> <br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading" style="background: transparent;text-align:center;" >
                <td></td>
                <td> </td>
                <td colpan="3">Recibo de ingreso</td>
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
                <td style="text-align: right;">Monto pagado</td>
                <td style="text-align: right;">Cobrado</td>
                <td style="text-align: right;">Deuelto</td>
            </tr>

            <tr class="item">
                <td>{{ Session::get('propiedad.titulo') }}</td>     
                <td>{{ Session::get('detalle.concepto') }}</td>
                <td>{{ Session::get('detalle.cantidad') }}</td>
                <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('pago.montpag'),2,'.',',') }}</td>
                <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('pago.cobrado')*Session::get('propiedad.itbis'),2,'.',',') }}</td>
                <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('pago.devuelta'),2,'.',',') }}</td>
                
            </tr>

            <tr class="heading">
                <td>Forma de pago: {{ Session::get('pago.formpag') }}</td>
                <td></td>
                <td></td>
                <td colspan="2">Monto pagado:</td>
                <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('pago.montpag'),2,'.',',') }}</td>
            </tr>

            <tr class="heading">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Cobrado:</td>
                <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('pago.cobrado'),2,'.',',') }}</td>
            </tr>
            <tr class="heading">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Devuelto:</td>
                <td style="text-align: right;">{{ '$'.$money_number = number_format(Session::get('pago.devuelta'),2,'.',',') }}</td>
            </tr>
            <tr class="details">
                <td>Comentantario: {{ Session::get('pago.comentario') }}</td>

                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>

            </tr>
        </table>
        <div style="margin: 20px; text-align: right; margin-top: 30px;">
            <label style="font-weight: 700; font-size: 18px;">Autorizado por: ______________________</label> <br /><br />
            <label style="font-weight: 700; font-size: 18px; margin-right: 80px;">Maricela Filpo</label> <br />
            <label style="font-weight: 700; font-size: 18px; margin-right: 70px;">Gerente General</label>
        </div>
    </div>


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