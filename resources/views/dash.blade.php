@extends('layouts.lay')

@section('content')
<div class="card mb-4 wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <div class="justify-content-between">
            <h4 class="mb-2  mb-sm-0 pt-1">
                <a href="/resumen" target="_blank">Administrador</a>
            </h4>
        </div>
        <div class="justify-content-right text-secondary">
            <h6 class="mb-2 text-secondary mr-4 float-right mb-sm-0 pt-1">
                <a href="/usuarios" class="text-secondary" target="_blank">Usuarios </a>
            </h6>
            <h6 class="mb-2 text-secondary mr-4 float-right text-secondary  mb-sm-0 pt-1">
                <a href="/tipos" class="text-secondary" target="_blank">Cortes </a>
            </h6>
            <h6 class="mb-2 text-secondary mr-4 float-right text-secondary mb-sm-0 pt-1">
                <a href="/ventas" class="text-secondary" target="_blank">Ventas </a>
            </h6>
        </div>
    </div>
</div>
<div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-md-5">

        <!--Card-->
        <div class="card">

            <h4 class="text-center blue-text mt-4">Ventas semanales</h4>
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

            </div>
        </div>

        <!--/.Card-->

    </div>
    <div class="col-md-7 mt-4">
        <!--Card-->
        <div class="card">
            <h4 class="text-center blue-text mt-4">Hora pico de ventas</h4>

            <!--Card content-->
            <div class="card-body">

                <canvas id="Horas" style="height:7rem"></canvas>

            </div>

        </div>
        <!--/.Card-->

    </div>
    <div class="col-md-5" style="margin-top:-7rem">
        <!--Card-->
        <div class="card">
            <h4 class="text-center blue-text mt-4">Ganancias</h4>

            <!--Card content-->
            <div class="card-body">

                <ul class="list-group">
                    <li class="list-group-item border list-group-item-info">Dinero generado este día :&nbsp&nbsp ${{$totals[0]}}</li>
                    <li class="list-group-item"> Dinero generado en el mes : ${{$totals[1]}}</li>
                    <li class="list-group-item list-group-item-info"> Dinero generado en el año : ${{$totals[2]}}</li>

                </ul>

            </div>

        </div>
        <!--/.Card-->

    </div>
    <div class="mt-4" style="width:100%">
        <nav class="navbar navbar-expand-lg navbar-dark stylish-color-dark">

            <!-- Navbar brand -->
            <a class="navbar-brand" style="margin-right:10rem" href="#">Gráficas adicionales</a>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="basicExampleNav">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" onclick="graphs(0)">Ventas por tipo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="graphs(1)">Dinero esta semana</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="graphs(2)">Ventas semanales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="graphs(3)">Ventas mensuales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="graphs(4)">Ventas por trabajador</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="graphs(5)">Hora pico</a>
                    </li>


                </ul>
                <!-- Links -->


            </div>
            <!-- Collapsible content -->

        </nav>
        <!--/.Navbar-->
        <!--Card-->
        <div class="card">
            <h4 class="text-center blue-text mt-4" id="titleG">Ventas por tipo en los últimos 30 días</h4>

            <!--Card content-->
            <div class="card-body" id="canva">

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
    graphs(0);

    function graphs(xg) {
        var title = document.getElementById("titleG");
        document.getElementById("canva").innerHTML = "";
        document.getElementById("canva").innerHTML = '<canvas id="VentasTipo"><canvas>';
        var ctx = document.getElementById("VentasTipo").getContext('2d');
        if (xg == 0) {
            title.innerHTML = "Ventas por tipo en los últimos 30 días";
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {
                        !!json_encode($periodName, JSON_HEX_TAG) !!
                    },
                    datasets: [{
                        label: 'Ventas últimos 30 días',
                        data: {
                            !!json_encode($periodCount, JSON_HEX_TAG) !!
                        },
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
        } else if (xg == 1) {
            title.innerHTML = "Dinero obtenido esta semana";
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
                    datasets: [{
                        label: 'Ganancia por semana',
                        data: {
                            !!json_encode($moneyByWeek, JSON_HEX_TAG) !!
                        },
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
        } else if (xg == 2) {
            // Line
            title.innerHTML = "Ventas realizadas esta semana";
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
                    datasets: [{
                        label: 'Ventas semanales',
                        data: {
                            !!json_encode($sales, JSON_HEX_TAG) !!
                        },
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
        } else if (xg == 3) {
            title.innerHTML = "Ventas por mes";
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                    datasets: [{
                        label: 'Ventas mensuales',
                        data: {
                            !!json_encode($month, JSON_HEX_TAG) !!
                        },
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
        } else if (xg == 4) {
            title.innerHTML = "Ventas por trabajador";
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {
                        !!json_encode($salesworkers, JSON_HEX_TAG) !!
                    },
                    datasets: [{
                        label: 'Ventas semanales',
                        data: {
                            !!json_encode($salescounts, JSON_HEX_TAG) !!
                        },
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
        } else if (xg == 5) {
            title.innerHTML = "Hora pico de ventas";
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: {
                        !!json_encode($hours, JSON_HEX_TAG) !!
                    },
                    datasets: [{
                        data: {
                            !!json_encode($counts, JSON_HEX_TAG) !!
                        },
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
        }
    }
    // Line
    var ctx = document.getElementById("Semanales").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
            datasets: [{
                label: 'Ventas semanales',
                data: {
                    !!json_encode($sales, JSON_HEX_TAG) !!
                },
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
                data: {
                    !!json_encode($month, JSON_HEX_TAG) !!
                },
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
            labels: {
                !!json_encode($salesworkers, JSON_HEX_TAG) !!
            },
            datasets: [{
                label: 'Ventas semanales',
                data: {
                    !!json_encode($salescounts, JSON_HEX_TAG) !!
                },
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
            labels: {
                !!json_encode($hours, JSON_HEX_TAG) !!
            },
            datasets: [{
                data: {
                    !!json_encode($counts, JSON_HEX_TAG) !!
                },
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
