<?php
include 'public/header.php';
?>


<font color="Black">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
</head>
<center><h3 class="titles">Agenda</h3></center>

<div class="row">


    <div class="col-sm-10">
        <div class="row">


            <div class="col-sm">
                <div class="form-group row scheduleDatesFilter">
                    <label class="col-sm-4 col-form-label-sm" for="professional">Profesional</label>
                    <select onChange=" profesionalSchedule();" class="col-sm-4 custom-select custom-select-sm" id="ProfessionalId" name="ProfessionalId">
                        @foreach (CitasSAPSO.Models.UserModels professional in ViewBag.professional)
                        {
                        <option value="@professional.Cedula">@professional.Name</option>
                        }
                    </select>

                </div>
            </div>





            <div class="col-sm ">
                <div class="form-group row scheduleDatesFilter">
                    <label class="col-sm-4 control-label small" for="date">Fecha: </label>
                    <input type="date" onChange="updateCalendar();" class="col-sm-4 form-control form-control-sm" id="date" />

                </div>
            </div>

            <div class="col-sm ">
                <div class="form-group row scheduleDatesFilter">
                    <label class="col-sm-4 control-label small" for="hour">Hora deseada</label>
                    <input type="time" onChange=" updateCalendar();" class="col-sm-4 form-control form-control-sm" id="Hour" name="Hour" required />
                </div>
            </div>



        </div>




        <input type="number" id="FunctionaryId" name="FunctionaryId" value="@functionary.Cedula" hidden />
        <input type="text" id="Patient" name="Patient" value="paciente" hidden />
        <input type="text" id="State" name="State" value="Apartada" hidden />

        <div class="col-sm-11 scheduleDatesTable">
            <div id='calendar'></div>
        </div>

        <div class="row justify-content-end">
            <button type="button" name="atras" id="atras" href="javascript:;"
                    onclick="goBack();" class="btn btn-success btn-sm " style="margin-left: 15px;">
                Atrás
            </button>

            <button type="button" name="finalizar" id="finalizar" href="javascript:;"
                    onclick="updateAppointment(); return false;"
                    class="btn btn-success btn-sm " style="margin-left: 15px;">
                Finalizar
            </button>
        </div>

    </div>
</div>

<script>
    
       function goBack() {
            window.history.back();
       }


        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek'
        });
        calendar.render();
        var events = [];
        var youAppointment = [];

        function cleanEvents() {
            events = [];
        }
        function profesionalSchedule() {
            var profesinal = $('#ProfessionalId').val();
            var parameters = { "professionalId": profesinal };
            $.ajax(
                {
                    data: parameters,
                    url: '/User/GetProfesionalScheldule',
                    type: 'post',
                    async: false,
                    beforeSend: function () {
                        $("#messageSpanId").html("Procesando, espere por favor ...");
                    },
                    success: function (response) {
                        response = JSON.parse(response)
                        generedEvents(response);
                    }
                }
            );
        }
        profesionalSchedule();


        function generedEvents(data) {
            cleanEvents();
            for (index in data) {

                var date = new Date(data[index].Date);
                date = new Date(date.toDateString() + ' ' + data[index].Hour + ':00');

                events.push({
                    title: 'Ocupado',
                    start: date,
                    color: 'black'
                });

            }
            refreshCalendar();
        }
        function refreshCalendar() {
            events.push(youAppointment);

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: { center: 'timeGridWeek,dayGridMonth' },
                initialView: 'timeGridWeek',
                eventClick: function (info) {
                    console.log(info);
                },
                events: events,

            });
            calendar.render();
        }

        function updateCalendar() {
            var date = $('#date').val();
            var hour = $('#Hour').val();

            date = new Date(date);
            date = new Date(date.toDateString() + ' ' + hour + ':00');

            youAppointment = { title: 'Tu cita', start: date }


            refreshCalendar();
        }



        window.onload = function () {
            loadScheduleDates();
        }

        function updateAppointment() {

            var FunctionaryId = document.getElementById("FunctionaryId").value;
            var fecha = document.getElementById("date").value;
            var Hour = document.getElementById("Hour").value;
            var ProfessionalId = document.getElementById("ProfessionalId").value;
            var Patient = document.getElementById("Patient").value;
            var State = document.getElementById("State").value;
            var SubprocessId = document.getElementById("SubprocessId").value;
            //var Assistance = document.getElementById("Assistance").value;
            //var SubActivityId = document.getElementById("SubActivityId").value;

            if (Hour == "") {
                alert("ingrese la hora por favor");
                return 0;
            }


            if (SubprocessId == -1) {
                alert("no hay subproceso");
                return 0;
            }

            if (ProfessionalId == -1) {
                alert("no hay profesionales");
                return 0;
            }

            var parameters =
            {
                "Functionary": { "Cedula": FunctionaryId },
                "Date": fecha,
                "Hour": Hour,
                "Professional": { "Cedula": ProfessionalId },
                "Patient": Patient,
                "State": State,
                "SubProcess": { "ID": SubprocessId },
                "Assistance": { "ID": 1 },
                "SubActivity": { "ID": 1 }
            };


            $.ajax(
                {
                    data: parameters,
                    url: '/Appointment/UpdateAppointment',
                    type: 'post',
                    success: function (response) {
                        location.href = "/Appointment/DateConfirmationHome";
                    }
                }
            );
        }
    </script>

<?php
include_once 'public/footer.php';
?>
