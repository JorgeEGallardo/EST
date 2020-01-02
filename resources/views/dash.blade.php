@extends('layouts.lay')

@section('content')
<div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-md-5">

      <!--Card-->
      <div class="card">

        <h4 class="text-center blue-text mt-4">Ventas  semanales</h4>
        <!--Card content-->
        <div class="card-body">

          <canvas id="Semanales" style="height:1500px"></canvas>

        </div>

      </div>
      <!--/.Card-->

    </div>
    <div class="col-md-7 mb-4">
        <!--Card-->
        <div class="card">
            <h4 class="text-center blue-text mt-4">Ventas mensuales</h4>

          <!--Card content-->
          <div class="card-body">

            <canvas id="Mes"></canvas>

          </div>

        </div>
        <!--/.Card-->

      </div>

<div class="col-md-5 mb-4" style="margin-top:-5rem">

    <!--Card-->
    <div class="card">
<h4 class="text-center blue-text mt-4">Ventas por trabajador</h4>
      <!--Card content-->
      <div class="card-body">

        <canvas id="Trabajadores"></canvas>

    </div> </div>

    <!--/.Card-->

  </div>
  <div class="col-md-7" >
    <!--Card-->
    <div class="card">
        <h4 class="text-center blue-text mt-4">Hora pico de ventas</h4>

      <!--Card content-->
      <div class="card-body" >

        <canvas id="Horas" style="height:7rem"
            ></canvas>

      </div>

    </div>
    <!--/.Card-->

  </div>
  <div class="col-md-5" style="margin-top:-7rem">
    <!--Card-->
    <div class="card">
        <h4 class="text-center blue-text mt-4">Ganancias</h4>

      <!--Card content-->
      <div class="card-body" >

        <ul class="list-group">
        <li class="list-group-item border list-group-item-info">Dinero generado este día :&nbsp&nbsp ${{$totals[0]}}</li>
        <li class="list-group-item">                            Dinero generado en el mes : ${{$totals[1]}}</li>
            <li class="list-group-item list-group-item-info">   Dinero generado en el año : ${{$totals[2]}}</li>

        </ul>

      </div>

    </div>
    <!--/.Card-->

  </div>
  <div class="mt-4" style="width:100%">
    <!--Card-->
    <div class="card">
        <h4 class="text-center blue-text mt-4">Ventas por tipo en los últimos 30 días</h4>

      <!--Card content-->
      <div class="card-body">

        <canvas id="VentasTipo"></canvas>

      </div>

    </div>
    <!--/.Card-->

  </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<script>
 // Line
 var ctx = document.getElementById("Semanales").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
                datasets: [{
                    label: 'Ventas semanales',
                    data: {!! json_encode($sales, JSON_HEX_TAG) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        // Line
    var ctx = document.getElementById("Mes").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                datasets: [{
                    label: 'Ventas mensuales',
                    data: {!! json_encode($month, JSON_HEX_TAG) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var ctx = document.getElementById("Trabajadores").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels:{!! json_encode($salesworkers, JSON_HEX_TAG) !!},
                datasets: [{
                    label: 'Ventas semanales',
                    data: {!! json_encode($salescounts, JSON_HEX_TAG) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var ctxP = document.getElementById("Horas").getContext('2d');
        var myPieChart = new Chart(ctxP, {
            type: 'pie',
            data: {
                labels: {!! json_encode($hours, JSON_HEX_TAG) !!},
                datasets: [{
                    data: {!! json_encode($counts   , JSON_HEX_TAG) !!},
                    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                    hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                }]
            },
            options: {
    responsive: true,
    legend: {
      position: 'right',
      labels: {
        padding: 20,
        boxWidth: 10
      }
    },
    plugins: {
      datalabels: {
        formatter: (value, ctx) => {
          let sum = 0;
          let dataArr = ctx.chart.data.datasets[0].data;
          dataArr.map(data => {
            sum += data;
          });
          let percentage = (value * 100 / sum).toFixed(2) + "%";
          return percentage;
        },
        color: 'white',
        labels: {
          title: {
            font: {
              size: '16'
            }
          }
        }
      }
    }
  }
        });


        </script>
@endsection
