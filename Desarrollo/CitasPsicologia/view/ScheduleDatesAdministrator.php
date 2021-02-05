<?php
include 'public/header.php';
?>


<font color="Black">

<center>
    <br>
    <h3 class="titles">Agenda</h3>
</center>

<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header" id="instructions">
                Observaciones
            </div>
            <div class="card-body">
                <textarea class="form-control form-control-sm" id="observations" rows="4"></textarea>
            </div>

        </div>
    </div>



    <div class="col-sm-10">
        <div class="row">


            <div class="col-sm">
                <div class="form-group row scheduleDatesFilter">
                    <label class="col-sm-4 control-label small offset-sm-1" style="color: black" for="professionals">Profesional</label>
                    <select  class="col-sm-4 custom-select custom-select-sm" name= "professionals" id="professionals">
                        <option value="">Seleccione una opción</option>
                        <?php
                    foreach ($vars['professionals'] as $res) {
                        ?>
                        <option value="<?php echo $res['consecutivo']; ?>"><?php echo $res['nombre']; ?></option> 
                        <?php
                    }
                        ?>
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

<table class="table table-bordered table-striped table-hover table-sm table-responsive-xl">
    <thead>
        <tr>
            <th scope="col">Hora</th>
            <th scope="col">Lunes</th>
            <th scope="col">Martes</th>
            <th scope="col">Miercoles</th>
            <th scope="col">Jueves</th>
            <th scope="col">Viernes</th>
            <th scope="col">Sábado</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">8:00</th>
            <td><div id="L8am"></div></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">9:00</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">10:00</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">11:00</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">12:00</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">13:00</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">14:00</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">15:00</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">16:00</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">17:00</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">18:00</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>

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
            var ProfessionalId = document.getElementById("professionals").value;
            var Patient = document.getElementById("Patient").value;
            var State = document.getElementById("State").value;
            var Observation = document.getElementById("observations").value; // faltan dos y subPro no va
            var Justification = document.getElementById("").value;

            if (Hour == "") {
                alert("ingrese la hora por favor");
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
                "State": State
            };


            $.ajax(
                {
                    data: parameters,
                    url: '?controlador=Appointment&accion=registerAppointment',
                    type: 'post',
                    success: function (response) {
                        location.href = "?controlador=Index&accion=showDateConfirmationHome";
                    }
                }
            );
        }
    </script>


<?php
include_once 'public/footer.php';
?>

