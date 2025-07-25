@extends('layouts.consulta-master')
<title>Cobros</title>



@section('content')

    <div class="tab-nav">
        <a href="/home">Home</a>
        <label for="form-label">/ Formulario de Cobros</label>
    </div>

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <form action="/Cobros" method="POST">
        @csrf

    <div class="row">
        <div class="col">  
            <h3>Cobros</h3>
        </div>
        <div class="col">
            <div class="col">
                <div class="button-group" style="text-align: right;">
                    <button type="reset" class="btn btn-danger shadow-none" onclick="limpiarFormaPago()"><i class="fa-solid fa-arrow-rotate-left"></i> Limpiar</button>
                    <button disabled type="submit" class="btn btn-primary shadow-none" id="enviarCobro" style="background: #0ead69;" ><i class="fa-solid fa-floppy-disk"></i> Procesar</button>
                </div>
            </div>
        </div>
    </div>

    <input type="text" name="codcue" id="codcue" hidden>
    <input type="text" name="numfac" id="numfac" hidden>

    <div class="row">
        <div class="col-1"></div>
        <div class="col">
            <label for="codcli">Cliente</label>
            <div class="input-group">
                <input type="text" class="form-control" id="codcli" name="codcli" readonly>
                <button class="btn btn-primary shadow-none" style="background: #0d973b;" type="button" id="nuevo-cli" data-bs-toggle="modal" data-bs-target="#nuevoClienteModal"><i class="fa-solid fa-circle-plus"></i></button>
                <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" id="buscar-cli" data-bs-toggle="modal" data-bs-target="#buscarClienteModal"><i class="fas fa-search"></i></button>  
            </div>
            @error('codcli')
                @include('layouts.partials.messages')
            @enderror
        </div>
     
        <div class="col">
            <label for="nomcli">Nombre</label>
            <input type="text" class="form-control" id="nomcli" name="nomcli" readonly>
        </div>

        <div class="col">
            <label for="tecli1">Teléfono</label>
            <input type="tel" class="form-control" id="tecli1" name="tecli1" readonly>
        </div>

        <div class="col">
            <label for="cedrnc">Cedula</label>
            <input type="tel" class="form-control" id="cedrnc" name="cedrnc"  readonly>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row">
        <div class="col">
            <label for="fecha">Fecha</label>
            <input type="datetime" class="form-control" id="fecha" name="fecha" disabled>
        </div>
        <div class="col">
            <label for="Forma de Pago">Forma de Pago</label>
            <select class="form-select" name="form_pag" id="form_pag">
                <option value="Efectivo" selected>Efectivo</option>
                <option value="Transferencia">Transferencia</option>
            </select>
        </div>

        <div class="col">
            <label for="banco">Banco</label>
            <select class="form-select" name="banco" id="banco">
                <option value="11245625647" selected>Banreservas</option>
                <option value="25135241547">BHD</option>
            </select>
        </div>
        <div class="col">
            <label for="cuenta_empresa">Cuenta/Empresa</label>
            <input type="text" class="form-control" value="11245625647" id="cuenta_empresa" name="cuenta_empresa" readonly>
        </div>
        <div class="col">
            <label for="cuenta_cliente">Cuenta/Cliente</label>
            <input type="number" class="form-control" min="0" id="cuenta_cliente" name="cuenta_cliente" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col"></div>
        <div class="col">
            <label for="montpag">Monto</label>
            <input type="text" class="form-control shadow-none" id="montpag" name="montpag">
        </div>
        <div class="col">
            <label for="recibido">Recibido</label>
            <input type="text" class="form-control" value="0.00" id="recibido" name="recibido" readonly>
        </div>
        <div class="col">
            <label for="cobrado">A Cobrar</label>
            <input type="text" class="form-control" value="0.00" id="cobrado" name="cobrado" readonly>
        </div>
        <div class="col">
            <label for="A Devolver">A Devolver</label>
            <input type="text" class="form-control" value="0.00" id="devuelta" name="devuelta" readonly>
        </div>
        <div class="col"></div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="comentario">Comentario</label>
            <textarea type="text" class="form-control" name="comentario" rows="4"></textarea>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="balance">Balance</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" style="text-align: right;" class="form-control" id="balance" name="balance" value="0.00" readonly>
            </div>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="totpag">Total Pagado</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" style="text-align: right;" class="form-control" id="totpag" name="totpag" value="0.00" readonly>
            </div>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="balpend">Balance Pendiente</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" style="text-align: right;" class="form-control" id="balpend" name="balpend" value="0.00" readonly>
            </div>
        </div>
    </div>

    </form>
    
    <script>
        document.getElementById('form_pag').addEventListener('click', Transferencia);
        document.getElementById('montpag').addEventListener('keyup', validarFormPag);
        document.getElementById('cuenta_cliente').addEventListener('keyup', validarFormPag);
        document.getElementById('montpag').addEventListener('blur', formatoMontPag);
        document.getElementById('montpag').addEventListener('click', deformatMontPag);
        document.getElementById('banco').addEventListener('click', cuentaEmpresa);

        function validarFormPag(e){
            var montpag = accounting.unformat(document.getElementById('montpag').value, ".");
            var cobrado = accounting.unformat(document.getElementById('cobrado').value, ".");
            var cuentaLength = (document.getElementById('cuenta_cliente').value).length;
            var form_pag = document.getElementById('form_pag').value;
            if(form_pag == 'Transferencia'){
                if(parseFloat(montpag) < parseFloat(cobrado) || cuentaLength <= 0){
                    document.getElementById('montpag').style.borderColor = "crimson";
                    document.getElementById('cuenta_cliente').style.borderColor = "crimson";
                    document.getElementById('enviarCobro').disabled = true;
                    document.getElementById('devuelta').value = formatter.format(0);
                    document.getElementById('recibido').value = formatter.format(0);
                }else if(parseFloat(cobrado) != 0){
                    document.getElementById('montpag').style.borderColor = "#208b3a";
                    document.getElementById('cuenta_cliente').style.borderColor = "#208b3a";
                    document.getElementById('enviarCobro').disabled = false;
                    document.getElementById('devuelta').value = formatter.format(parseFloat(montpag)-parseFloat(cobrado));
                    document.getElementById('recibido').value = formatter.format(parseFloat(montpag));
                }
            }else{
                if(parseFloat(montpag) < parseFloat(cobrado)){
                    document.getElementById('montpag').style.borderColor = "crimson";
                    document.getElementById('enviarCobro').disabled = true;
                    document.getElementById('devuelta').value = formatter.format(0);
                    document.getElementById('recibido').value = formatter.format(0);
                }else if(parseFloat(cobrado) != 0){
                    document.getElementById('montpag').style.borderColor = "#208b3a";
                    document.getElementById('enviarCobro').disabled = false;
                    document.getElementById('devuelta').value = formatter.format(parseFloat(montpag)-parseFloat(cobrado));
                    document.getElementById('recibido').value = formatter.format(parseFloat(montpag));
                }
            }
        }

        function limpiarFormaPago(){
            document.getElementById('cuenta_cliente').value = '';
            document.getElementById('montpag').value = '';
            document.getElementById('devuelta').value = formatter.format(0);
            document.getElementById('montpag').removeAttribute('style');
            document.getElementById('cuenta_cliente').removeAttribute('style');
            document.getElementById('enviarCobro').disabled = true;
        }

        function Transferencia(e) {
            if(document.getElementById('form_pag').value == 'Transferencia'){
                document.getElementById('banco').readOnly = false;
                document.getElementById('cuenta_cliente').readOnly = false;
            }else{
                document.getElementById('banco').readOnly = true;
                document.getElementById('cuenta_cliente').readOnly = true;
            }   
            limpiarFormaPago();
        }

        function deformatMontPag(e) { 
            document.getElementById('montpag').value = accounting.unformat(document.getElementById('montpag').value, ".");
        }

        function formatoMontPag(e) { 
            document.getElementById('montpag').value = formatter.format(document.getElementById('montpag').value);
        }

        function cuentaEmpresa(e) {
            document.getElementById('cuenta_empresa').value = document.getElementById('banco').value;
        }

        var formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
        });

    </script>

    {{-- <h5 style="margin-left: 20px; font-weight: bold;">Facturas pendientes</h5>

    <table class="table table-striped table-hover table-borderless align-middle" id="facturasPendientes">
        <thead>
            <tr>
                <th scope="col">No. Factura</th>
                <th scope="col">Cliente</th>
                <th scope="col">Propiedad</th>
                <th scope="col">Concepto</th>
                <th scope="col">Fecha vencimiento</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Itbis</th>
                <th scope="col">Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table> --}}

    <script>
        function cuentaCliente(codcue, balance, totpag, balpend, cobrado, numfac){
            document.getElementById('codcue').value = codcue;
            document.getElementById('numfac').value = numfac;
            document.getElementById('balance').value = formatter.format(balance);
            document.getElementById('totpag').value = formatter.format(totpag);
            document.getElementById('balpend').value = formatter.format(balpend);
            document.getElementById('cobrado').value = formatter.format(cobrado);
        }

        $(document).ready(function() {
            $('#facturasPendientes').DataTable({
                "bPaginate": false,
                "bFilter": false,
                "bInfo": true, 
            });

        });

    </script>

    <div class="modal fade" id="buscarClienteModal" role="dialog" tabindex="-1" aria-labelledby="Seleccionar cliente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Facturas Pendientes</h3>
                    <button type="button" class="btn btn-primary" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @php
                    use App\Models\detalle_factura;   
                    use App\Models\clientes;
                    use App\Models\facturas;
                    use App\Models\cuentas;
                @endphp
                <div class="modal-body">
                    <div class="row">
                        <table class="table table-responsive" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Cedula</th>
                                    <th scope="col">NO. Factura</th>
                                    <th scope="col">Concepto</th>
                                    <th scope="col">Balance Pendiente</th>
                                    <th scope="col">Fec. Vencimiento</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                    @php
                                        $facturas = facturas::where('codcli', $cliente->codcli)->where('estfac', 'Pendiente')->orderBy('fecvenc', 'DESC')->get();
                                        $cuenta = cuentas::where('codcli', $cliente->codcli)->where('estcue', 'Pendiente')->first();
                                    @endphp
                                    @if(!is_null($facturas) && !is_null($cuenta))
                                        @foreach($facturas as $factura)
                                            @php
                                                $detalle = detalle_factura::where('numfac', $factura->numfac)->first();
                                                $cobrado = 0;
                                            @endphp
                                            <tr>
                                                <td scope="row">{{$cliente->codcli}}</td>
                                                <td>{{$cliente->nomcli.' '.$cliente->apecli}}</td>
                                                <td>{{$cliente->tecli1}}</td>
                                                <td>{{$cliente->cedrnc}}</td>
                                                <td>{{ $factura->numfac }}</td>
                                                <td>{{ $detalle->concepto }}</td>
                                                <td>{{'$'. number_format($cuenta->balpend,2,'.',',') }}</td>
                                                <td>{{ date("d/m/Y", strtotime($factura->fecvenc)) }}</td>
                                                @if($detalle->cantidad > 1)
                                                    @php
                                                        $cobrado = $factura->total/$datalle->cantidad;
                                                    @endphp
                                                @else
                                                    @php
                                                        $cobrado = $factura->total*0.20;
                                                    @endphp
                                                @endif
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="cuentaCliente('{{ $cuenta->codcue }}','{{ $cuenta->balance }}', '{{ $cuenta->totpag }}', '{{ $cuenta->balpend }}', '{{ $cobrado }}', '{{ $factura->numfac }}'),selectCliente('{{$cliente->codcli}}', '{{$cliente->nomcli}}', '{{$cliente->apecli}}', '{{$cliente->tecli1}}', '{{$cliente->cedrnc}}')">
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function fecha(){
            var today = new Date();
            var date = today.getDate().toString().padStart(2, "0")+'/'+(today.getMonth()+1).toString().padStart(2, "0")+'/'+today.getFullYear();
            var time = today.getHours().toString().padStart(2, "0") + ":" + today.getMinutes().toString().padStart(2, "0");
            var dateTime = date+' '+time;

            document.getElementById('fecha').value = dateTime;
        }

        setInterval(fecha, 1000);
   
        function selectCliente(codcli, nomcli, apecli, tecli1, cedrnc){
            document.getElementById('codcli').value = codcli;
            document.getElementById('nomcli').value = nomcli + ' ' + apecli;
            document.getElementById('tecli1').value = tecli1;
            document.getElementById('cedrnc').value = cedrnc;
        }

        function stopDefAction(evt){
            evt.preventDefault(evt);
        }
    </script>

    <div class="modal fade" id="nuevoClienteModal" role="dialog" tabindex="-1" aria-labelledby="Nuevo Cliente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Registrar Cliente</h3>
                    <button type="button" class="btn btn-primary" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="cliente-modal-form" method="POST" action="/nuevoClienteModal">
                        @csrf
                        @include('layouts.modals.clienteModalForm')
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function(){
            $('#enviarCliente').click(function (e){
                e.preventDefault(); //evita recargar la pagina
                //var route = $('#cliente-modal-form').data('route'); Lo mismo
                var form  = $("#cliente-modal-form").attr("action");
                //var formValues = $(this).serialize(); Lo mismo
                var dataString = $("#cliente-modal-form").serialize();
                $.ajax({
                    method:'POST',
                    url:form,
                    data:dataString,
                    dataType:'json', 
                    //data:formValues,
                    success: function(result){
                        $('#codcli').val(result.clientes[0].codcli);
                        $('#nomcli').val(result.clientes[0].nomcli+' '+result.clientes[0].apecli);
                        $('#tecli1').val(result.clientes[0].tecli1);
                        $('#cedrnc').val(result.clientes[0].cedrnc);
                        
                        $("#cliente-modal-form")[0].reset(); //limpiar Formulario
                        $("#nuevoClienteModal").modal('hide'); //cerrar Modal
                        Swal.fire({
                            title: 'Exito',
                            text: 'Cliente/a '+ result.clientes[0].nomcli +' registrado correctamente!',
                            icon: 'success',
                            iconColor: '#0ead69',
                            showConfirmButton: true,
                            confirmButtonColor: '#1976D2',
                            buttonsStyling: false,
                            confirmButtonText: "OK!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    },
                    error: function(err){
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message').fadeIn().html(err.responseJSON.message);
                            
                            // you can loop through the errors object and show it to the user
                            console.warn(err.responseJSON.errors);
                            // display errors on each form field
                            $.each(err.responseJSON.errors, function (i, error) {
                                var el = $('#cliente-modal-form').find('[name="'+i+'"]');
                                el.after($('<ol style="margin: 0px; margin-left: 10px; padding:0px; color: #d62828;"><i class="fa-solid fa-circle-exclamation"></i> '+error[0]+'</ol>').fadeIn());        
                                $("ol").each(function(index) {
                                    setTimeout(() => {
                                        $("ol").fadeOut(1000);
                                    }, 2500);
                                });
                            });
                        }
                        /*Swal.fire({
                            icon: 'error',
                            title: 'Intentelo de nuevo...',
                            text: 'Puede que el dato en el campo telefono, correo o cedula/rnc ya esten en uso o tengan formato incorrecto',
                            footer: '<a href="consultarClientes"  style="text-decoration: none; color: #1976d2;">Que puedo hacer? <p style="font-weight: bold;">Consultar clientes</p></a>',
                            showConfirmButton: false
                        })*/
                    }
                });
            });
        });
    </script>

@endsection