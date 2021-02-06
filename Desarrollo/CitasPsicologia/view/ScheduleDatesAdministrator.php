<?php
include 'public/header.php';
?>


<!-- echo "valor recibido ".$_POST['name']; -->
<!-- echo "valor recibido ".$_POST['cedula']; -->


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
                            <option value="<?php echo $res['cedula']; ?>"><?php echo $res['nombre']; ?></option> 
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
            <!-- <a class="btn btn-success" id="finalizar" name="finalizar" onclick="updateAppointment()"><i class='bx bx-search' ></i></a> -->

            <a class="btn btn-success btn-sm" onclick="updateAppointment()">Finalizar</a>
        </div>

    </div>
</div>


<!-- <input type="number" id="FunctionaryId" name="FunctionaryId" value="@functionary.Cedula" hidden /> -->
<input type="number" id="FunctionaryId" name="FunctionaryId"  hidden /> 
 <input type="text" id="Patient" name="Patient"  hidden /> 



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
            headerToolbar: {center: 'timeGridWeek,dayGridMonth'},
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

        youAppointment = {title: 'Tu cita', start: date}


        refreshCalendar();
    }



    window.onload = function () {
        loadScheduleDates();
    }

    function updateAppointment() {
      /*   alert(document.getElementById("FunctionaryId").value); //--> no loa trae --> Esta muestra la del cliente
         alert(document.getElementById("date").value);
         alert(document.getElementById("Hour").value);
         alert(document.getElementById("professionals").value); //--> no loa trae
         alert(document.getElementById("Patient").value); //--> no loa trae
         alert(document.getElementById("observations").value);*/
         /// print_r("holaaa2")
        var FunctionaryId = document.getElementById("FunctionaryId").value;
        var fecha = document.getElementById("date").value;
        var Hour2 = document.getElementById("Hour").value;
        var ProfessionalId = document.getElementById("professionals").value;
        var Patient = document.getElementById("Patient").value;
        var Observation = document.getElementById("observations").value;
        // );   // faltan dos y subPro no va


        if (Hour2 == "") {
            alert("ingrese la hora por favor");
            return 0;
        }

        if (ProfessionalId == -1) {
            alert("no hay profesionales");
            return 0;
        }
          // alert(fecha);
         //  alert(Hour2);
         //  alert(ProfessionalId);
         //  alert(Observation);
        var parameters =
                {
                    
                    "date": fecha,
                    "hour": Hour2,
                    "idProfessional": ProfessionalId,
                 
                    "observation": Observation
                };

       //  alert (parameters);
        $.ajax(
                {
                    data: parameters,
                    url: '?controlador=Appointment&accion=registerAppointment',
                    type: 'post',
                    success: function (response) {
                        alert(response);

                        location.href = "?controlador=Index&accion=showDateConfirmationHome";
                    }
                }
        );
    }
</script>


<?php
include_once 'public/footer.php';
?>

