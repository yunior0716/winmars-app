@extends('layouts.home-master')

@php
    use App\Models\citas;  
    use App\Models\solicitudes;
    use App\Models\facturas;
    use App\Models\clientes;
@endphp

@auth
@php
    $numeroCitas = citas::where('estcit', 'Pendiente')->count();
    $numeroSolicitudes = solicitudes::where('estsol', 'Pendiente')->count();
    $numeroFacturas = facturas::where('estfac', 'Pendiente')->count();
    $numeroClientes = clientes::join('tipo_clientes','tipo_clientes.codtpcli','=','clientes.codtpcli')
    ->select('tipo_clientes.tipcli')->where('tipo_clientes.tipcli', "Comprador")->count();
    
    $dbData = facturas::select(
        DB::raw('year(created_at) as year'),
        DB::raw('month(created_at) as month'),
        DB::raw('sum(total) as total'),
    )
        ->where(DB::raw('date(created_at)'), '>=', "2022-01-01")
        ->groupBy('year')
        ->groupBy('month')
        ->get();

    $data = [];

    for ($year = date('Y'); $year <= now()->format('Y'); $year++) {
        for ($month = 1; $month <= 12; $month++) {
            $data[] = [
                'year' => $year,
                'month' => $month,
                'total' => optional($dbData->first(fn($row) => $row->month == $month && $row->year == 'year'))->total,
            ];
        }
    }
    $enero = $data[7]['total'];
@endphp


@section('content')
 <script>console.log({{ $enero }})</script>
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <h3>{{ $numeroCitas }}</h3>
              <p>Citas Pendientes</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-calendar-check"></i>
            </div>
            <a href="/consultarCitas" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <h3>{{ $numeroSolicitudes }}</h3>
              <p>Solicitudes</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-code-pull-request"></i>
            </div>
            <a href="/consultarSolicitudes" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <h3>{{ $numeroFacturas }}</h3>
              <p>Facturas Pendientes</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-file-invoice-dollar"></i>
            </div>
            <a href="/consultarFacturas" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <h3>{{ $numeroClientes }}</h3>
              <p>Clientes</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-user"></i></i>
            </div>
            <a href="/consultarClientes" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="card">
        <div class="card-header">
          <label class="card-title" style="margin: 10px; font-size: 18px; font-weight: bold;">Ventas</label>
          <div class="card-tools">
            <!-- Collapse Button -->
            <button type="button" class="btn btn-primary" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="chart" style="height: 350px; width: 100%;"></div> 
          {{-- SCRIPT DEL GRAFICO --}}
          <script>
              var chart = new CanvasJS.Chart("chart", {
                  animationEnabled: true,  
                  backgroundColor: "#E3F2FD",
                  fontFamily: "Nunito Sans",
                  toolTip:{
                    backgroundColor: "#E3F2FD",
                    borderColor: "#1976d2",
                    fontFamily: "Nunito Sans",
                    fontWeight: "bold",
                    cornerRadius:10
                  },
                  title:{
                    text: "Ventas mensuales - "+{{ date('Y') }}+" (USD)",
                    margin: 20,
                    fontSize: 20,
                    fontFamily: "Nunito Sans",
                    fontWeight: "bold",
                  },
                  axisX: {
                    labelFontFamily: "Nunito Sans",
                    labelFontWeight: "bold",
                    valueFormatString: "MMM",
                    fontWeight: "bold",
                  },
                  axisY: {
                    labelFontFamily: "Nunito Sans",
                    labelFontWeight: "bold",
                    prefix: "$"
                  },
                  data: [{
                    yValueFormatString: "$#,###",
                    xValueFormatString: "MMMM",
                    type: "splineArea",
                    color: "#1976d2",
                    dataPoints: [
                      { x: new Date({{ date('Y') }}, 0), y: 30000 },
                      { x: new Date({{ date('Y') }}, 1), y: 27980 },
                      { x: new Date({{ date('Y') }}, 2), y: 33800 },
                      { x: new Date({{ date('Y') }}, 3), y: 18000 },
                      { x: new Date({{ date('Y') }}, 4), y: 40260 },
                      { x: new Date({{ date('Y') }}, 5), y: 33900 },
                      { x: new Date({{ date('Y') }}, 6), y: 48000 },
                      { x: new Date({{ date('Y') }}, 7), y: 31500 },
                      { x: new Date({{ date('Y') }}, 8), y: 32300 },
                      { x: new Date({{ date('Y') }}, 9), y: 42000 },
                      { x: new Date({{ date('Y') }}, 10), y: 52160 },
                      { x: new Date({{ date('Y') }}, 11), y: 49400 }
                    ]
                  }]
              });
              chart.render();
          </script>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    @endauth

    @guest
        <p>Para ver el contenido <a href="/login">inicia sesion</a></p>
    @endguest

@endsection