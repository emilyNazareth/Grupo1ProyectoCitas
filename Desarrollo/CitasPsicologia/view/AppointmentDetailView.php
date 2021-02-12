<?php
include 'public/headerWithoutLogin.php';
?>


<?php
foreach ($vars['appointment'] as $res) {
    
}
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
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" value="<?php echo $res['pk_id_cita']; ?>" disabled="true" />
                </div>

                <!--NOMBRE-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Nombre:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" value="<?php echo $res['tc_nombre']; ?>" disabled />
                </div>

                <!--PRIMER APELLIDO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Primer apellido:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" value="<?php echo $res['tc_primer_apellido']; ?>"disabled />
                </div>

                <!--SEGUNDO APELLIDO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Segundo apellido:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" value="<?php echo $res['tc_segundo_apellido']; ?>" disabled />
                </div>

                <!--IDENTIFICACION-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">C&eacute;dula:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id=""  value="<?php echo $res['pk_cedula_usuario']; ?>"  disabled />
                </div>

                <!--SEXO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Sexo:</label>
                    <select class="col-sm-6 custom-select custom-select-sm appointment-detail-select" id="" value="<?php echo $res['tc_sexo']; ?>"   disabled />
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    </select>
                </div>

                <!--PUESTO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Puesto:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" value="<?php echo $res['tc_puesto']; ?>" disabled />
                </div>



            </div>

            <div class="col-sm-6" style="margin-top: 20px">
                <!--ÁREA-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">&Aacute;rea:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" value="<?php echo $res['tc_area']; ?>" disabled />
                </div>

                <!--OFICINA-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Oficina:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" value="<?php echo $res['tc_oficina']; ?>" disabled />
                </div>
                <!--TELEFONO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Tel&eacute;fono:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" value="<?php echo $res['tc_telefono_personal']; ?>" disabled />
                </div>

                <!--CORREO ELECTRONICO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Correo electr&oacute;nico:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="" value="<?php echo $res['tc_correo_electronico']; ?>" disabled />
                </div>



                <!--FECHA-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small" style="color: black" for="date">Fecha inicial:</label>
                    <input type="date" class="col-sm-6 form-control form-control-sm appointment-detail-input" id="date" value="<?php echo $res['tf_fecha']; ?>"  disabled />
                </div>



                <!--HORA-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Hora:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="hour" name="hour"  value="<?php echo $res['tc_hora']; ?>"disabled />
                </div>



                <!--PSICOLOGO ASIGNADO-->
                <div class="row appointment-detail">
                    <label class="col-sm-4 control-label small">Identificación del Psic&oacute;logo asignado:</label>
                    <input class="col-sm-6 form-control form-control-sm appointment-detail-input" id="id_professional" value="<?php echo $res['fk_id_profesional']; ?>" disabled />
                </div>          

            </div>


            <div class="col-sm-12 buttons-appointment-ditail">
                <div class="row">
                    <!--BT ATRAS-->
                    <div class="col-sm-6">
                        <a class="btn btn-success btn-sm" href="?controlador=Appointment&accion=showCheckHistory">Atr&aacute;s</a>
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