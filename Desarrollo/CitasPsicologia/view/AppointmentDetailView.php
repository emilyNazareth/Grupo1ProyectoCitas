<?php
include 'public/header.php';
?>

<form id="form-professional-register">

    <center>
        <p class="title-appointment-detail" >Detalles de Cita</p>
    </center>

    <div class="container text-left">

        <div class="row">
            <div class="col-sm-6" style="margin-top: 20px">

                <!--CONSECUTIVO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Código de Cita:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" disabled />
                </div>
                
                <!--NOMBRE-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Nombre:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" disabled />
                </div>
                
                <!--PRIMER APELLIDO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Primer apellido:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" disabled />
                </div>

                <!--SEGUNDO APELLIDO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Segundo apellido:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" disabled />
                </div>
                
                <!--IDENTIFICACION-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">C&eacute;dula:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" disabled />
                </div>
                
                <!--SEXO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Sexo:</label>
                    <select class="col-sm-6 custom-select custom-select-sm appointment-detail-select" id="" disabled />
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    </select>
                </div>
                
                <!--PUESTO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Puesto:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" disabled />
                </div>
                
                <!--ÁREA-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">&Aacute;rea:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" disabled />
                </div>
                
                <!--OFICINA-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Oficina:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" disabled />
                </div>

            </div>

            <div class="col-sm-6" style="margin-top: 20px">
                <!--TELEFONO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Tel&eacute;fono:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" disabled />
                </div>
                
                <!--CORREO ELECTRONICO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Correo electr&oacute;nico:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" disabled />
                </div>
                
                <!--PROCESO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Proceso:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" disabled />
                </div>
                
                <!--FECHA INICIAL-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small" style="color: black" for="initialDate">Fecha inicial:</label>
                    <input type="date" class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" onchange='alertInputInicialDate()' disabled />
                </div>
                
                <!--FECHA FINAL-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small" style="color: black" for="finalDate">Fecha Final:</label>
                    <input type="date" class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" onchange='alertInputFinalDate()' disabled />
                </div>
                
                <!--HORA INICIO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Hora Inicio:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" disabled />
                </div>
                
                <!--HORA FIN-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Hora Fin:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" disabled />
                </div>
                
                
                
                <!--PSICOLOGO ASIGNADO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Psic&oacute;logo asignado:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" disabled />
                </div>
                
                <!--ACTIVIDAD-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Actividad:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" disabled />
                </div>
                
            </div>
            

            <div class="col-sm-12 buttons-appointment-ditail">
                <div class="row">
                    <!--BT ATRAS-->
                    <div class="col-sm-6">
                        <a class="btn btn-success btn-sm" href="?controlador=Appointment&accion=showConsultAppointmentAdministratorView">Atr&aacute;s</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>

</form>

<script src="public/js/Site.js" type="text/javascript"></script>

<?php

include_once 'public/footer.php';
?>