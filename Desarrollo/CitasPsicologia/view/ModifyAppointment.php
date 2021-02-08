<?php
include 'public/header.php';
?>
<font color="Black">

<center>
    <br>
    <h3 class="titles">Modificar cita</h3>
</center>

<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header" id="instructions">
                Observaciones
            </div>
            <div class="card-body">
                <textarea class="form-control form-control-sm" id="observations" rows="4">  <?php echo $item['tc_observaciones']; ?> </textarea>
            </div>

        </div>
    </div>


    <div class="col-sm-10">
        <div class="row">
            <div class="col-sm">
                <div class="form-group row scheduleDatesFilter">
                    <label class="col-sm-5 control-label small offset-sm-1" style="color: black" for="professionals">Profesional</label>
                    <select  class="col-sm-6 custom-select custom-select-sm" name= "professionals" id="professionals">
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
                    <label class="col-sm-6 control-label small" for="date">Fecha: </label>
                    <input type="date" onChange="updateCalendar();" class="col-sm-6 form-control form-control-sm" id="date" value="<?php echo $item['tf_fecha']; ?>">

                </div>
            </div>

            <div class="col-sm ">
                <div class="form-group row scheduleDatesFilter">
                    <label class="col-sm-6 control-label small" for="hour">Hora deseada</label>
                    <input type="time" onChange=" updateCalendar();" class="col-sm-6 form-control form-control-sm" id="Hour" name="Hour" required value="<?php echo $item['tc_hora']; ?>">
                </div>
            </div>
        </div>


        <div class="row">  
            <div class="col-sm " style="margin-top: 2em">
                <!--BT BUSCAR-->
                <button type="button" href = "?controlador=User&accion=showAdministratorMainView" class="btn btn-success btn-sm" id="btn-cancel" style="margin-inline: 3em" >Atrás</button>

                <!--BT CANCELAR-->
                <button type="button" onclick="" class="btn btn-success btn-sm" id="btn-cancel" style="margin-inline: 3em" >Modificar</button>
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

