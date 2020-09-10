<?php require_once "vistas/parte_superior.php"?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading aqui se puede poner titulo a las graficas-->
          <h1 class="h3 mb-2 text-gray-800"></h1>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-6 col-lg-6">

              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Total Dias</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <div id="chart-container">
                        <canvas id="totalDias"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Sistema Afectado</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <div id="chart-container">
                        <canvas id="sistemaAfectado"></canvas>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">MES</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="mes"></canvas>
                  </div>
                </div>
              </div>
            </div>
             <div class="col-xl-8 col-lg-8">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Empresa Usuaria</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="empresaUsuaria"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->


<?php require_once "vistas/parte_inferior.php"?>
   

    <script>
        $(document).ready(function () {
            totalDias();
            sistemaAfectado();
            mes();
            empresaUsuaria();

        });


        function totalDias()
        {
            {
                $.post("chartData/totalDias.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];
                    for (var i in data) {
                        name.push(data[i].name);
                        marks.push(data[i].total);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Total Dias',
                                backgroundColor: "#4e73df",
                                hoverBackgroundColor: "#2e59d9",
                                borderColor: "#4e73df",
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#totalDias");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        
                    });
                });
            }
        }

    function sistemaAfectado()
        {
            {
                $.post("chartData/sistemaAfectado.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];
                    for (var i in data) {
                        name.push(data[i].name);
                        marks.push(data[i].total);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Sistema Afectado',
                                backgroundColor: "#4e73df",
                                hoverBackgroundColor: "#2e59d9",
                                borderColor: "#4e73df",
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#sistemaAfectado");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata,
                        options: {
                                    scales: {
                                        xAxes: [{
                                            ticks: {
                                                display: false
                                            }
                                        }]
                                    }
                                }
                    });
                });
            }
        }
        function mes()
        {
            {
                $.post("chartData/mes.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];
                    for (var i in data) {
                        name.push(data[i].name);
                        marks.push(data[i].total);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Mes',
                                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#mes");

                    var barGraph = new Chart(graphTarget, {
                        type: 'doughnut',
                        data: chartdata,
                          options: {
                                    maintainAspectRatio: false,
                                    tooltips: {
                                      backgroundColor: "rgb(255,255,255)",
                                      bodyFontColor: "#858796",
                                      borderColor: '#dddfeb',
                                      borderWidth: 1,
                                      xPadding: 15,
                                      yPadding: 15,
                                      displayColors: true,
                                      caretPadding: 10,
                                    },
                                    legend: {
                                      display: true
                                    },
                                    cutoutPercentage: 80,
                                  },
                    });
                });
            }
        }
        function empresaUsuaria()
        {
            {
                $.post("chartData/empresaUsuaria.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];
                    for (var i in data) {
                        name.push(data[i].name);
                        marks.push(data[i].total);
                    }
                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Empresa Usuaria',
                                backgroundColor: "#4e73df",
                                hoverBackgroundColor: "#2e59d9",
                                borderColor: "#4e73df",
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#empresaUsuaria");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata,
                          options: {
                                    maintainAspectRatio: false,
                                    scales: {
                                        xAxes: [{
                                            ticks: {
                                                display: false
                                            }
                                        }]
                                    },
                                    tooltips: {
                                      backgroundColor: "rgb(255,255,255)",
                                      bodyFontColor: "#3b61d0",
                                      borderColor: '#3b61d0',
                                      borderWidth: 1,
                                      xPadding: 15,
                                      yPadding: 15,
                                      displayColors: true,
                                      caretPadding: 10,
                                    },
                                    legend: {
                                      display: false
                                    },
                                    cutoutPercentage: 80,
                                  },

                    });
                });
            }
        }
        </script>