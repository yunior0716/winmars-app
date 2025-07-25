@extends('layouts.consulta-master')
<title>Facturacion</title>

@section('content')

   

    <div class="row">
        <div class="col">
            <div class="tab-nav">
                <a href="/home">Home</a>
                <label for="form-label">/ Facturacion</label>
            </div> 
        </div>

        <div class="col" style="text-align: right;">
            {{-- <label for="" style="font-weight:bold; font-size: 18px;">Factura No. #{{$numfac1+1}}</label> --}}
        </div>
    </div>

    

    @if (Session::get('success', false))
        @include('layouts.partials.messages')
    @endif

    <form method="POST" action="/Facturacion" id="formulario">

    @csrf

    <input type="text" name="numcot" id="numcot" hidden>

    <div class="row">
        <div class="col">
            <h3>Facturacion</h3>
        </div>
        <div class="col">
            <div class="button-group" style="text-align: right;">
                <button type="button" class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#importarCot"><i class="fa-solid fa-circle-plus"></i> Importar cotizacion</button>
                <button type="reset" onclick="limpiarTabla()" class="btn btn-danger shadow-none"><i class="fa-solid fa-arrow-rotate-left"></i> Limpiar</button>
                <button type="button" class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#formaPagoModal" style="background: #208b3a;"><i class="fa-solid fa-floppy-disk"></i> Procesar</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="codcli">Cliente</label>
            <div class="input-group">
                <input type="text" class="form-control" id="codcli" name="codcli" readonly>
                <button class="btn btn-primary shadow-none" style="background: #0ead69;" type="button" id="nuevo-cli" data-bs-toggle="modal" data-bs-target="#nuevoClienteModal"><i class="fa-solid fa-circle-plus"></i></button>
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
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col">
            <label for="fecha">Fecha</label>
            <input type="datetime" class="form-control" id="fecha" name="fecha" disabled>
        </div>
        <div class="col">
            <label for="concepto">Concepto</label>
            <select class="form-select" name="concepto" id="concepto">
                <option value="Venta" selected>Venta</option>
                <option value="Alquiler">Alquiler</option>
            </select>
        </div>
        <div class="col">
            <label for="condicion">Condicion</label>
            <select class="form-select" name="condicion" id="condicion">
                <option value="Al Contado" selected>Al Contado</option>
                <option value="Financiamiento">Financiamiento</option>
            </select>
        </div>
        
        <div class="col-1"></div>
    </div>

    <div class="row">
        <div class="col">
            <label for="codpro">Propiedad</label>
            <div class="input-group">
                <input type="text" class="form-control" id="codpro" name="codpro" readonly>
                {{-- <button class="btn btn-primary shadow-none" style="background: #0ead69;" type="button" id="nueva-pro" data-bs-toggle="modal" data-bs-target="#nuevaPropiedadModal"><i class="fa-solid fa-circle-plus"></i></button> --}}
                <button class="btn btn-primary shadow-none" style="background: #1976D2;" type="button" id="buscar-pro" data-bs-toggle="modal" data-bs-target="#buscarPropiedadModal"><i class="fas fa-search"></i></button>  
            </div>
            @error('codpro')
                @include('layouts.partials.messages')
            @enderror
        </div>
        <div class="col">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" readonly>
        </div>
        <div class="col">
            <label for="preven">Precio de venta/renta</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" style="text-align: right;" class="form-control" id="precio" name="precio" value="0.00" readonly>
            </div>
        </div>
        <div class="col">
            <label for="cantidad">Cantidad</label>
            <input type="number" min="1" max="12" class="form-control" id="cantidad"  name="cantidad" style="text-align: left;" readonly>
            @error('cantidad')
                @include('layouts.partials.messages')
            @enderror
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <label for="observaciones">Observaciones</label>
            <textarea type="text" class="form-control" name="observaciones" id="observaciones" rows="4"></textarea>
        </div>

        <div class="col" style="margin-top: 35px;">
            <label for="subtot">Subtotal</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" style="text-align: right;" class="form-control" id="subtot" name="subtot" value="0.00" readonly>
            </div>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="subtot">Itbis</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" style="text-align: right;" class="form-control" id="itbis" name="itbis" value="0.00" readonly>
            </div>
            <input type="text" class="form-control" id="itbis-fijo" name="itbis-fijo" value="0.00" hidden>
        </div>
        <div class="col" style="margin-top: 35px;">
            <label for="subtot">Total</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" style="text-align: right;" class="form-control" id="total" name="total" value="0.00" readonly>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formaPagoModal" role="dialog" tabindex="-1" aria-labelledby="Forma de Pago" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Forma de Pago</h3>
                    <button type="button" class="btn btn-danger" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="Forma de Pago">Forma de Pago</label>
                                <select class="form-select" name="form_pag" id="form_pag">
                                    <option value="Efectivo" selected>Efectivo</option>
                                    <option value="Transferencia">Transferencia</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="monto">Monto</label>
                                <input type="text" class="form-control shadow-none" id="monto" name="monto">
                            </div>
                        </div>

                        <div class="row">
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
                            <div class="col">
                                <label for="comentario">Comentario</label>
                                <textarea type="text" class="form-control" name="comentario" id="comentario" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="recibido">Recibido</label>
                                <input type="text" class="form-control" value="0.00" id="recibido" name="recibido" readonly>
                            </div>
                            <div class="col">
                                <label for="cobrar">A Cobrar</label>
                                <input type="text" class="form-control" value="0.00" id="cobrar" name="cobrar" readonly>
                            </div>
                            <div class="col">
                                <label for="A Devolver">A Devolver</label>
                                <input type="text" class="form-control" value="0.00" id="devuelta" name="devuelta" readonly>
                            </div>
                        </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger shadow-none" style="border: none;" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success shadow-none" id="enviarFactura" style="border: none;" disabled><i class="fa-solid fa-floppy-disk"></i> Procesar</button>
                </div>
            </div>
        </div>
    </div>
    
    </form>

    <script>

        $('#formaPagoModal').on('shown.bs.modal', function (e) {
            if($('#codcli').val() == '' || $('#codpro').val() == ''){
                $('#formaPagoModal').modal('hide');
                Swal.fire({
                    icon: 'error',
                    iconColor: '#d62828',
                    title: 'Campos requeridos',
                    text: 'Por favor llene los campos correctamente',
                    confirmButtonColor: '#1976D2',
                    buttonsStyling: false,
                    confirmButtonText: "OK!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })
            }
        })

        document.getElementById('condicion').addEventListener('click', actualizarCobrar);
        document.getElementById('form_pag').addEventListener('click', Transferencia);
        document.getElementById('monto').addEventListener('keyup', validarFormPag);
        document.getElementById('cuenta_cliente').addEventListener('keyup', validarFormPag);
        document.getElementById('monto').addEventListener('blur', formatoMonto);
        document.getElementById('monto').addEventListener('click', deformatMonto);
        document.getElementById('banco').addEventListener('click', cuentaEmpresa);

        function validarFormPag(e){
            var monto = accounting.unformat(document.getElementById('monto').value, ".");
            var cobrar = accounting.unformat(document.getElementById('cobrar').value, ".");
            var cuentaLength = (document.getElementById('cuenta_cliente').value).length;
            var form_pag = document.getElementById('form_pag').value;
            if(form_pag == 'Transferencia'){
                if(parseFloat(monto) < parseFloat(cobrar) || cuentaLength <= 0){
                    document.getElementById('monto').style.borderColor = "crimson";
                    document.getElementById('cuenta_cliente').style.borderColor = "crimson";
                    document.getElementById('enviarFactura').disabled = true;
                    document.getElementById('devuelta').value = formatter.format(0);
                    document.getElementById('recibido').value = formatter.format(0);
                }else{
                    document.getElementById('monto').style.borderColor = "#208b3a";
                    document.getElementById('cuenta_cliente').style.borderColor = "#208b3a";
                    document.getElementById('enviarFactura').disabled = false;
                    document.getElementById('devuelta').value = formatter.format(parseFloat(monto)-parseFloat(cobrar));
                    document.getElementById('recibido').value = formatter.format(parseFloat(monto));
                }
            }else{
                if(parseFloat(monto) < parseFloat(cobrar)){
                    document.getElementById('monto').style.borderColor = "crimson";
                    document.getElementById('enviarFactura').disabled = true;
                    document.getElementById('devuelta').value = formatter.format(0);
                    document.getElementById('recibido').value = formatter.format(0);
                }else{
                    document.getElementById('monto').style.borderColor = "#208b3a";
                    document.getElementById('enviarFactura').disabled = false;
                    document.getElementById('devuelta').value = formatter.format(parseFloat(monto)-parseFloat(cobrar));
                    document.getElementById('recibido').value = formatter.format(parseFloat(monto));
                }
            }
        }

        function limpiarFormaPago(){
            document.getElementById('cuenta_cliente').value = '';
            document.getElementById('monto').value = '';
            document.getElementById('devuelta').value = formatter.format(0);
            docuement.getElementById('monto').removeAttribute('style');
            docuement.getElementById('cuenta_cliente').removeAttribute('style');
        }

        function Transferencia(e) {
            if(document.getElementById('form_pag').value == 'Transferencia'){
                document.getElementById('banco').readOnly = false;
                document.getElementById('cuenta_cliente').readOnly = false;
                document.getElementById('enviarFactura').disabled = true;
            }else{
                document.getElementById('banco').readOnly = true;
                document.getElementById('cuenta_cliente').readOnly = true;
                document.getElementById('enviarFactura').disabled = true;
            }   
            limpiarFormaPago();
        }

        function deformatMonto(e) { 
            document.getElementById('monto').value = accounting.unformat(document.getElementById('monto').value, ".");
        }

        function formatoMonto(e) { 
            document.getElementById('monto').value = formatter.format(document.getElementById('monto').value);
        }

        function cuentaEmpresa(e) {
            document.getElementById('cuenta_empresa').value = document.getElementById('banco').value;
        }
        
        function actualizarCobrar(e){
            llenarForm(concepto, precio, itbis, subtotal, total);
        }
    </script>

    {{-- <div class="row">
        <div class="button-group" style="text-align: right;">
            <button id="agregar" class="btn btn-primary shadow-none" style="background: #208b3a;"><i class="fa-solid fa-circle-plus"></i> Agregar</button>
        </div>
    </div> --}}

    <script type="text/javascript">

        function limpiarTabla(){
            table.clear().draw();
        }

        var formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
        });

        /* function verificarPropiedad(){
            var data = table.rows().data();
            for(var i=0 ; data.length>i;i++){
                var n = data[i].length;
                for(var j = 0 ; data.length>j;j++){ 
                    if($('#codpro').val() == data[i][j]){
                        Swal.fire({
                            icon: 'error',
                            iconColor: '#d62828',
                            title: 'Ya seleccionaste esta propiedad',
                            text: 'Intenta con otra',
                            confirmButtonColor: '#1976D2',
                            buttonsStyling: false,
                            confirmButtonText: "OK!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                        limpiarPropiedad();
                    }  
                }
            }
        } */

        function llenarForm(concepto, precio, itbis, subtotal, total){
            if(concepto == 'Venta'){ 
                document.getElementById('cantidad').readOnly = true; 
                document.getElementById('cantidad').value = cantidad;  
            }
            else{ document.getElementById('cantidad').readOnly = false; }
            document.getElementById('precio').value = formatter.format(precio);
            document.getElementById('subtot').value = formatter.format(subtotal);
            document.getElementById('itbis').value = formatter.format(itbis); 
            document.getElementById('total').value = formatter.format(total);
            if(document.getElementById('condicion').value == 'Al Contado'){
                document.getElementById('cobrar').value = formatter.format(total);
            }else if(document.getElementById('condicion').value == 'Financiamiento'){
                var cobrar = total*parseFloat(0.20);
                document.getElementById('cobrar').value = formatter.format(cobrar);
            }  
            document.getElementById('enviarFactura').disabled = true; 
        }
    </script>

    <table class="table table-striped table-hover table-borderless align-middle" id="detalleFactura">
        <thead>
            <tr>
                <th>Propiedad</th>
                <th>Cliente</th>
                <th>Concepto</th>
                <th>Fecha de pago/vencimiento estimada</th>
                <th>Subtotal</th>
                <th>Itbis</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="body">
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" style="text-align:right">Totales:</th>
                <td rowspan="1" colspan="1" style="text-align:right"></td>
                <td rowspan="1" colspan="1" style="text-align:right"></td>
                <td rowspan="1" colspan="1" style="text-align:right"></td>
            </tr>
        </tfoot>
    </table>

    <script type="text/javascript">
         var table = $('#detalleFactura').DataTable({
            "bPaginate": false,
            "bFilter": false,
            "bInfo": true, 
            footerCallback: function (row, data, start, end, display) {
                var api = this.api();
    
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };
    
                // Total over this page
                subtotal = api.column(4, { page: 'current' }).data().reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                itbis = api.column(5, { page: 'current' }).data().reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                total = api.column(6, { page: 'current' }).data().reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
    
                // Update footer
                $(api.column(4).footer()).html(formatter.format(subtotal));
                $(api.column(5).footer()).html(formatter.format(itbis));
                $(api.column(6).footer()).html(formatter.format(total));
            },
        })

        /* var counter = 1;
        $("#agregar").click(function (e){ 
            e.preventDefault();
            
            if($('#codcli').val() == '' || $('#codpro').val() == ''){
                Swal.fire({
                    icon: 'error',
                    iconColor: '#d62828',
                    title: 'Intentelo de nuevo...',
                    text: 'Seleccione un Cliente y una Propiedad',
                    confirmButtonColor: '#1976D2',
                    buttonsStyling: false,
                    confirmButtonText: "OK!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                })
            }else{             
                document.getElementById('buscar-cli').disabled = true;
                document.getElementById('nuevo-cli').disabled = true;
                table.row.add([$('#codpro').val(),$('#codcli').val(),$('#concepto').val(), 
                    $('#condicion').val(),$('#cantidad').val(), '<textarea readonly cols="40" rows="3">' + $('#observaciones').val() + '</textarea>', 
                    $('#subtot').val(), $('#itbis').val(), $('#total').val(), '<button id="eliminarDetalle" class="btn btn-danger btn-xs"><i class="fa-solid fa-xmark"></i></button>']).draw(false);
 
                counter++;
                limpiarPropiedad();
            }

        });

        $('#detalleFactura tbody').on('click','#eliminarDetalle',function () {
            table.row($(this).parents('tr')).remove().draw();
            if(!table.data().count()){
                document.getElementById('buscar-cli').disabled = false;
                document.getElementById('nuevo-cli').disabled = false;
            }
        }); */
    </script>

    <div class="modal fade" id="buscarClienteModal" role="dialog" tabindex="-1" aria-labelledby="Seleccionar cliente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Seleccionando Cliente</h3>
                    <button type="button" class="btn btn-primary" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('layouts.modals.seleccionarCliente')
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
            table.clear().draw();
            document.getElementById('codcli').value = codcli;
            document.getElementById('nomcli').value = nomcli + ' ' + apecli;
            document.getElementById('tecli1').value = tecli1;
            document.getElementById('cedrnc').value = cedrnc;
            if((document.getElementById('codpro').value).length != 0 && concepto == 'Alquiler') {
                actualizarTabla()
            }
            else if((document.getElementById('codpro').value).length != 0 && concepto == 'Venta'){
                var date = moment().add(30, 'days');
                table.row.add([$('#codpro').val(),$('#codcli').val(),$('#concepto').val(), moment(date, "DD/MM/YYYY").format("DD/MM/YYYY"),
                    formatter.format(precio), formatter.format(parseFloat(precio)*parseFloat(itbis_fijo)), 
                    formatter.format((parseFloat(precio))+(parseFloat(precio)*parseFloat(itbis_fijo)))]).draw(false);
            };
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
                    <button type="button" class="btn btn-primary" class="btn btn-primary" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                    }
                });
            });
        });
    </script>

    <div class="modal fade" id="buscarPropiedadModal" tabindex="-1" role="dialog" aria-labelledby="Seleccionar Propiedad" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle1">Seleccionando Propiedad</h3>
                    <button type="button" class="btn btn-primary" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('layouts.modals.seleccionarPropiedad')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        const cantidad = 1;
        let pventa, prenta, precio, itbis, itbis_fijo, subtotal, total = 0;
        var concepto;
        const cero = parseFloat(0).toFixed(2);

        document.getElementById('cantidad').addEventListener('blur', actualizarTabla);
        document.getElementById('cantidad').addEventListener('click', updateValue);
        document.getElementById('concepto').addEventListener('click', conceptoChange);
        let dias = 0;

        function updateValue(e){
            subtotal = parseFloat(precio)*parseInt(document.getElementById('cantidad').value);
            itbis = parseFloat(subtotal)*parseFloat(itbis_fijo); 
            total = parseFloat(subtotal)+parseFloat(itbis);
            llenarForm(concepto, precio, itbis, subtotal, total);
        }

        function actualizarTabla(e){
            table.clear().draw();
            c = parseInt(document.getElementById('cantidad').value);
            dias = parseInt(30);
            for (let i = 0; i < c; i++) {
                var date = moment().add(parseInt(dias), 'days');
                table.row.add([$('#codpro').val(),$('#codcli').val(),$('#concepto').val(), moment(date, "DD/MM/YYYY").format("DD/MM/YYYY"),
                    formatter.format(precio), formatter.format(parseFloat(precio)*parseFloat(itbis_fijo)), 
                    formatter.format((parseFloat(precio))+(parseFloat(precio)*parseFloat(itbis_fijo)))]).draw(false);
                dias = parseInt(dias) + 30;
            }
        }

        function conceptoChange(e){
            table.clear().draw();
            concepto = document.getElementById('concepto').value;
            if(concepto == 'Venta'){
                precio = parseFloat(pventa);  
            }else{
                precio = parseFloat(prenta);
            }
            subtotal = parseFloat(precio)*parseInt(cantidad);
            itbis = parseFloat(subtotal)*parseFloat(itbis_fijo); 
            total = parseFloat(subtotal)+parseFloat(itbis);
            llenarForm(concepto, precio, itbis, subtotal, total);
            if(concepto == 'Alquiler') {actualizarTabla()}else{
                var date = moment().add(30, 'days');
                table.row.add([$('#codpro').val(),$('#codcli').val(),$('#concepto').val(), moment(date, "DD/MM/YYYY").format("DD/MM/YYYY"),
                    formatter.format(precio), formatter.format(parseFloat(precio)*parseFloat(itbis_fijo)), 
                    formatter.format((parseFloat(precio))+(parseFloat(precio)*parseFloat(itbis_fijo)))]).draw(false);
            };
        }

        function selectPropiedad(codpro, titulo, preven, preren, itbis){
            table.clear().draw();
            document.getElementById('codpro').value = codpro;
            document.getElementById('titulo').value = titulo;
            pventa = accounting.unformat(preven, ",");
            prenta = accounting.unformat(preren, ",");
            itbis_fijo = itbis;
            concepto = document.getElementById('concepto').value;
            if(concepto == 'Venta'){
                precio = parseFloat(accounting.unformat(preven, ","));   
            }else{
                precio = parseFloat(accounting.unformat(preren, ","));
            }
            subtotal = parseFloat(precio)*parseInt(cantidad);
            itbis = parseFloat(subtotal)*parseFloat(itbis); 
            total = parseFloat(subtotal)+parseFloat(itbis);
            document.getElementById('cantidad').value = 1;
            llenarForm(concepto, precio, itbis, subtotal, total);
            if(concepto == 'Alquiler') {actualizarTabla()}else{
                var date = moment().add(30, 'days');
                table.row.add([$('#codpro').val(),$('#codcli').val(),$('#concepto').val(), moment(date, "DD/MM/YYYY").format("DD/MM/YYYY"),
                    formatter.format(precio), formatter.format(parseFloat(precio)*parseFloat(itbis_fijo)), 
                    formatter.format((parseFloat(precio))+(parseFloat(precio)*parseFloat(itbis_fijo)))]).draw(false);
            };
            //verificarPropiedad();
        }

    </script>

    <div class="modal fade" id="importarCot" tabindex="-1" role="dialog" aria-labelledby="Seleccionar Cotizacion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle1">Seleccionando Cotizacion</h3>
                    <button type="button" class="btn btn-primary" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @php 
                    use App\Models\clientes;
                    use App\Models\propiedades;
                    use App\Models\detalle_cotizacion;
                @endphp
                <div class="modal-body">
                    <div class="row">
                        <table class="table table-responsive" id="dataTable5">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Propiedad</th>
                                    <th scope="col">Concepto</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Total(precio+itbis)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cotizaciones as $cotizacion)
                                    @php
                                        $cliente = clientes::where('codcli', $cotizacion->codcli)->where('estcli', 'activo')->first();
                                        $detalle = detalle_cotizacion::where('numcot', $cotizacion->numcot)->first();
                                        $propiedad = propiedades::join('itbis', 'propiedades.citbis', '=', 'itbis.citbis')
                                            ->select('itbis.itbis', 'propiedades.codpro', 'propiedades.titulo', 'propiedades.preven', 'propiedades.preren')
                                            ->where('propiedades.codpro', $detalle->codpro)->where('propiedades.estpro', 'activo')->first();
                                        date_default_timezone_set('America/Santo_Domingo');
                                        $time = time();
                                    @endphp
                                    @if(!is_null($cliente) && !is_null($propiedad) && $time < strtotime($cotizacion->fecvenc))        
                                        <tr>
                                            <td scope="row">{{$cotizacion->numcot}}</td>
                                            <td>{{$cliente->codcli. '-' . $cliente->nomcli. ' '.$cliente->apecli}}</td>
                                            <td>{{$propiedad->codpro. '-' . $propiedad->titulo}}</td>
                                            <td>{{$detalle->concepto}}</td>
                                            <td>{{'$'.$money_number = number_format($cotizacion->subtot,2,'.',',')}}</td>
                                            <td>{{'$'.$money_number = number_format($cotizacion->total,2,'.',',')}}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectConcepto_Condicion('{{ $cotizacion->numcot }}','{{ $detalle->concepto }}', '{{ $cotizacion->condicion }}'), selectCliente('{{$cliente->codcli}}', '{{$cliente->nomcli}}', '{{$cliente->apecli}}', '{{$cliente->tecli1}}', '{{$cliente->cedrnc}}'), selectPropiedad('{{$propiedad->codpro}}', '{{$propiedad->titulo}}','{{$propiedad->preven}}', '{{$propiedad->preren}}','{{$propiedad->itbis}}')">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    
                        <script>
                            function selectConcepto_Condicion(numcot,concepto, condicion){
                                document.getElementById('concepto').value = concepto;
                                document.getElementById('condicion').value = condicion;
                                document.getElementById('numcot').value = numcot;
                            }

                            $(document).ready(function() {
                                $('#dataTable5').DataTable();
                            });
                        </script>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        window.onload = function(e) {
            $("#formulario")[0].reset();
        }
    </script>
    
@endsection