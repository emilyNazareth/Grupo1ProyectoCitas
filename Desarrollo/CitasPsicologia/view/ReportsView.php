<?php
include 'public/headerWithoutLogin.php';
?>

<div class="row" style="margin-top: 50px">
    <div class="col">
        <canvas id="AppointmentQuantity"></canvas>
    </div>
    <div class="col">
    <h7 style="color: gray;">Citas agendadas esta semana</h7>
        <canvas id="ProcessPercentage"></canvas>
    </div>
</div>


<!--BT ATRAS-->
<div class = "col-sm-6" style="margin-top: 50px">
    <a class = "btn btn-success btn-sm" href = "?controlador=User&accion=showAdministratorMainView">Atr&aacute;s</a>
</div>
<?php
include_once 'public/footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="public/js/script.js" type="text/javascript"></script>
<script>
    appointments = "";
    window.onload = function () {
        $.ajax(
                {

                    url: '?controlador=Appointment&accion=loadDataInGraphReportsView',
                    type: 'post',
                    dataType: 'json',
                    success: function (response) {
                        var appointmentChart = document.getElementById('AppointmentQuantity').getContext('2d');
                        var chart = new Chart(appointmentChart, {

                            type: 'bar',

                            data: {
                                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
                                datasets: [{
                                        label: 'Citas Agendadas en el Primer Semestre',
                                        backgroundColor: [
                                            'rgba( 230, 134, 113, 1)',
                                            'rgba( 230, 207, 113, 1)',
                                            'rgba( 113, 230, 186, 1)',
                                            'rgba( 113, 154, 230, 1)',
                                            'rgba( 33, 199, 108, 1)',
                                            'rgba( 60, 135, 255, 1)'
                                        ],
                                        data: [response.enero, response.febrero,
                                            response.marzo, response.abril,
                                            response.mayo, response.junio]
                                      
                                    }]
                            },

                            // Configuration options go here
                            options: {
                                responsive: true,
                                scales: {
                                    yAxes: [{
                                            ticks: {
                                                min: 0,
                                                max: 10
                                            }
                                        }],
                                    xAxes: [{
                                            ticks: {
                                                min: 0,
                                                max: 20
                                            }
                                        }]

                                }
                            }
                        });
                    }

                }
        );
        $.ajax(
                {
                    url: '?controlador=Appointment&accion=loadDataInGraphReportsViewTwo',
                    type: 'post',
                    dataType: 'json',
                    success: function (response) {          
                        var processChart = document.getElementById('ProcessPercentage').getContext('2d');
                        var myDoughnutChart = new Chart(processChart, {
                            type: 'doughnut',
                            data: {
                                labels: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                                datasets: [{
                                        label:[ 'Citas agendadas esta semana'],
                                        backgroundColor: ['rgba( 230, 207, 113, 1)',
                                            'rgba( 113, 230, 186, 1)',
                                            'rgba( 113, 154, 230, 1)',
                                            'rgba( 33, 199, 108, 1)',
                                            'rgba(  0, 135, 255, 1)'
                                        ],
                                        data: [response.lunes, response.martes,
                                            response.miercoles, response.jueves,
                                            response.viernes, response.sabado]
                                    }]
                            },
                            options: {
                                responsive: true
                            }
                        });

                    }

                }
        );

    };



</script>