<div class="row">
    <table class="table table-responsive" id="dataTable1">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Precio de venta</th>
                <th scope="col">Precio de renta</th>
                <th scope="col">Itbis</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($propiedades as $propiedad)        
                <tr>
                    <td scope="row">{{$propiedad->codpro}}</td>
                    <td>{{$propiedad->titulo}}</td>
                    <td id="preven1">{{'$'.$money_number = number_format($propiedad->preven,2,'.',',')}}</td>
                    <td id="preren1">{{'$'.$money_number = number_format($propiedad->preren,2,'.',',')}}</td>
                    <td>{{$propiedad->itbis}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectPropiedad('{{$propiedad->codpro}}', '{{$propiedad->titulo}}','{{$propiedad->preven}}', '{{$propiedad->preren}}','{{$propiedad->itbis}}')">
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#dataTable1').DataTable();
        });
    </script>
</div>