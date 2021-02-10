<?php
include 'public/header.php';
?>
<script src="public/js/Site.js" type="text/javascript"></script>
<font color="Black">

<center>
    <br>
    <h3 class="titles">Modificar cita</h3>
</center>
<?php
foreach ($vars['appointment'] as $item) {
    
}
?>
<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header" id="instructions">
                Observaciones
            </div>
            <div class="card-body">
                <textarea class="form-control form-control-sm" id="observations" name="observations" rows="4"><?php echo $item['tc_observaciones']; ?></textarea>
            </div>

        </div>
    </div>


    <div class="col-sm-10">
        <div class="row">
            <div class="col-sm">
                <div class="form-group row scheduleDatesFilter">
                    <label class="col-sm-5 control-label small offset-sm-1" style="color: black" for="professionals">Profesional</label>
                    <select  class="col-sm-6 custom-select custom-select-sm" name= "professionals" id="professionals">                       
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
                    <label class="col-sm-6 control-label small" for="date">Fecha: </label>
                    <input type="date" onChange="updateCalendar();" class="col-sm-6 form-control form-control-sm" id="date" name="date" value="<?php echo $item['tf_fecha']; ?>">

                </div>
            </div>

            <div class="col-sm ">
                <div class="form-group row scheduleDatesFilter">
                    <label class="col-sm-6 control-label small" for="hour">Hora deseada</label>
                    <input type="time" onChange=" updateCalendar();" class="col-sm-6 form-control form-control-sm" id="hour" name="hour" required value="<?php echo $item['tc_hora']; ?>">
                </div>
            </div>
        </div>


        <div class="row">  
            <div class="col-sm " style="margin-top: 2em">
                <!--BT ATRAS-->
                <a class = "btn btn-success btn-sm" href="?controlador=Appointment&accion=showConsultAppointmentAdministratorView"  style="margin-inline: 3em" >Atrás</a>

                <!--BT BUSCAR-->
                <input type="button" onclick="modifyDataAppointment(<?php echo $item['pk_id_cita']; ?>, $('#professionals').val(), $('#date').val(), $('#hour').val(), $('#observations').val())" class="btn btn-success btn-sm"  style="margin-inline: 3em" value="Modificar"/>                 
            </div>
        </div>
    </div>
</div>

<script>

    if (Hour2 == "") {

    $("#resultado").html("<div class='alert alert-danger'>* Ingrese la hora por favor</div>");
    return 0;
    }

    if (ProfessionalId == "") {

    $("#resultado").html("<div class='alert alert-danger'>* No hay profesional seleccionado</div>");
    return 0;
    }
    if (fecha == "") {

    $("#resultado").html("<div class='alert alert-danger'>* Ingrese una fecha</div>");
    return 0;
    }

</script>

<?php
include_once 'public/footer.php';
?>

