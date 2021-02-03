<?php
include 'public/header.php';
?>
<center>
    <h3 class="titles">Confirmación de cita</h3>
    <div class="row" style="text-align:center;">
        Se envió a su correo un formulario que debe presentar el día de la cita
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div id='calendar'></div>
            </div>

    </div>

</center>


<script>
    var appointment = @Html.Raw(Json.Encode(ViewBag.appointment));

    var date = new Date(appointment.Date + ' ' + appointment.Hour + ':00');

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        events: [
            {
                title: appointment.Functionary.Cedula,
                start: date,
            }
        ]

    });
    calendar.render();

</script>

<?php
include_once 'public/footer.php';
?>