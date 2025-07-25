<div class="row">
    <table class="table table-responsive" id="dataTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Cedula</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td scope="row">{{$cliente->codcli}}</td>
                    <td>{{$cliente->nomcli.' '.$cliente->apecli}}</td>
                    <td>{{$cliente->tecli1}}</td>
                    <td>{{$cliente->cedrnc}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-xs" data-bs-dismiss="modal" onclick="selectCliente('{{$cliente->codcli}}', '{{$cliente->nomcli}}', '{{$cliente->apecli}}', '{{$cliente->tecli1}}', '{{$cliente->cedrnc}}')">
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</div>