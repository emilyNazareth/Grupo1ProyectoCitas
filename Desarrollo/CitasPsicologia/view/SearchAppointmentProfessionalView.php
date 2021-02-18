<?php
include 'public/headerWithoutLogin.php';
?>

<?php
//Comprobamos si esta definida la sesión 'userAdministrator'.

if (isset($_SESSION['userAdministrator'])) {
    if ($_SESSION['userAdministrator'][1] < time()) {
        unset($_SESSION['userAdministrator']);
        echo "<script> alert('Tiempo Agotado - Logearse nuevamente');
                    window.location.replace('?controlador=User&accion=closeSessionAdministrator');
                    </script>";
    } else {
        $_SESSION['userAdministrator'][1] = time() + 900;
    }
} else {
    //Comprobamos si esta definida la sesión 'userProfessional'.
    if (isset($_SESSION['userProfessional'])) {
        if ($_SESSION['userProfessional'][1] < time()) {
            unset($_SESSION['userProfessional']);
            echo "<script> alert('Tiempo Agotado - Logearse nuevamente');
                    window.location.replace('?controlador=User&accion=closeSessionProfessional');
                    </script>";
        } else {
            $_SESSION['userProfessional'][1] = time() + 900;
        }
    } else {
        echo "<script> alert('Debe logearse');
window.location.replace('?controlador=User&accion=closeSessionAdministrator');
</script>";
    }
}
?>


<!--BT CERRAR SESION-->
<div class = "col-sm-6">
    <a class = "btn btn-success btn-sm float-left mt-2" href = "?controlador=user&accion=closeSessionProfessional">Cerrar Sesi&oacute;n</a>
</div>

<center>
    <h3 class="titles" style="margin-top: 50px;">Citas</h3>
    <p class="titles"> Seleccione el tipo de b&uacutesqueda</p>
</center>

<div class="container text-left">
    <div class="row">
        <div class="col-sm-6" style="margin-top: 50px">
            <!--FECHA INICIAL-->
            <div class="form-group row scheduleDatesFilter">
                <label class="col-sm-4 control-label small offset-sm-2" style="color: black" for="initialDate">Fecha inicial</label>
                <input type="date" class="col-sm-4 form-control form-control-sm" id="initialDate" name="initialDate" onchange='alertInputInicialDate()' />
            </div>

            <!--IDENTIFICACION-->
            <div class="form-group row scheduleDatesFilter">
                <label class="col-sm-4 control-label small offset-sm-2" style="color: black" for="identification">C&eacutedula</label>
                <input onkeypress="return onlyNumbers(event)" type="text" class="col-sm-4 form-control form-control-sm"  id="identification" placeholder="#0###0###" name="identification" maxlength="9" />
            </div>

            <!--SEXO-->
            <div class="form-group row scheduleDatesFilter">
                <label class="col-sm-4 control-label small offset-sm-2" style="color: black" for="gender">Sexo</label>
                <select class="col-sm-4 custom-select custom-select-sm"  id="gender" name="gender">
                    <option value="">Seleccione una opción</option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                </select>
            </div> 
        </div>


        <div class="col-sm-6" style="margin-top: 50px">

            <!--FECHA FINAL-->
            <div class="form-group row scheduleDatesFilter">
                <label class="col-sm-4 control-label small offset-sm-1" style="color: black" for="finalDate">Fecha Final</label>
                <input type="date" class="col-sm-4 form-control form-control-sm" id="finalDate" name="finalDate" onchange='alertInputFinalDate()' />
            </div>

            <!--CONSECUTIVO-->
            <div class="form-group row scheduleDatesFilter">
                <label class="col-sm-4 control-label small offset-sm-1" style="color: black" for="consecutive">Código de Cita</label>
                <input type="number" class="col-sm-4 form-control form-control-sm" id="consecutive" name="consecutive" />
            </div>

        </div>

    </div>

</div>

<div class="row">  

    <div class="col-sm " style="margin-top: 2em">

        <!--BT BUSCAR-->
        <input type="button" onclick="searchAppointmentByFilterProfessional($('#identification').val(), $('#consecutive').val(),
            $('#initialDate').val(), $('#finalDate').val(), $('#gender').val())" class="btn btn-success btn-sm" id="btn-accept" style="margin-inline: 3em" value="Buscar"/>       
    
        <!--BT CANCELAR-->
        <button type="button" onclick="cleanFormConsultAppointment()" class="btn btn-success btn-sm" id="btn-cancel" style="margin-inline: 3em" >Cancelar</button>

    </div>

</div>

<div class="" style="color: black">
    <span id="result"></span>
</div>

<div class="row d-flex justify-content-center">
    <table id="tableID" class="table table-bordered table-striped table-hover table-sm table-responsive-md" style="margin: 2em">
        <thead>
            <tr>
                <th scope="col">Código de Cita</th>
                <th scope="col">Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Segundo Apellido</th>
                <th scope="col">Cédula</th>
                <th scope="col">Psicólogo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Ver Detalle</th>                      
                <th scope="col">Cancelar</th>          
            </tr>
        </thead>
        <tbody id="tbodyP">

        </tbody>
    </table>
</div>

<script src="public/js/Site.js" type="text/javascript"></script>

<?php
include_once 'public/footer.php';
?>
