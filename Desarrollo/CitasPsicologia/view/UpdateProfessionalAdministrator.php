<?php
include 'public/header.php';
?>

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
<?php
if (empty($vars['professional'])) {
?>

    <?php
} else {
    foreach ($vars['professional'] as $item) {
    ?>
        <form id="form-professional-update">
            <div class="container text-left">
                <div class="row align-items-start">
                    <div class="col-sm-6" style="margin-top: 50px">
                        <p class="text-success">Datos Personales del Profesional</p>
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="Cedula">Numero de identificación:</label>
                            <input readonly class="col-sm-4 form-control form-control-sm" type="text" id="Cedula" name="Cedula" value="<?php echo $item['pk_cedula_usuario']; ?>">

                        </div>
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="name">Nombre:</label>
                            <input onkeypress="return onlyLetters(event)" required class="col-sm-4 form-control form-control-sm" type="text" id="name" name="name" value="<?php echo strval($item['tc_nombre']); ?>">
                        </div>
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="pass">Contraseña:</label>
                            <input required class="col-sm-4 form-control form-control-sm" type="password" id="pass" name="pass" value="<?php echo $item['tc_contrasena']; ?>">
                        </div>
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="firstLastName">Primer Apellido:</label>
                            <input onkeypress="return onlyLetters(event)" class="col-sm-4 form-control form-control-sm" type="text" id="firstLastName" name="firstLastName" value="<?php echo $item['tc_primer_apellido']; ?>">
                        </div>
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="secondLastName">Segundo Apellido:</label>
                            <input onkeypress="return onlyLetters(event)" class="col-sm-4 form-control form-control-sm" type="text" id="secondLastName" name="secondLastName" value="<?php echo $item['tc_segundo_apellido']; ?>">
                        </div>
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="personalPhone">Teléfono Personal:</label>
                            <input onkeypress="return onlyNumbers(event)" minlength="8" maxlength="8" class="col-sm-4 form-control form-control-sm" type="text" id="personalPhone" name="personalPhone" value="<?php echo $item['tc_telefono_personal']; ?>">
                        </div>
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="RoomPhone">Teléfono de habitación:</label>
                            <input onkeypress="return onlyNumbers(event)" minlength="8" maxlength="8" class="col-sm-4 form-control form-control-sm" type="text" id="RoomPhone" name="RoomPhone" value="<?php echo $item['tc_telefono_habitacion']; ?>">
                        </div>

                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="civilStatus">Estado civil:</label>
                            <select class="col-sm-4 custom-select custom-select-sm" id="civilStatus" name="civilStatus">
                                <option value="Divorsiado(a)" <?php if ($item['tc_estado_civil'] == 'Divorsiado(a)') : ?> selected="selected" <?php endif;  ?>>Divorsiado(a)</option>
                                <option value="Casado(a)" <?php if ($item['tc_estado_civil'] == 'Casado(a)') : ?> selected="selected" <?php endif;  ?>>Casado(a)</option>
                                <option value="Viudo(a)" <?php if ($item['tc_estado_civil'] == 'Viudo(a)') : ?> selected="selected" <?php endif;  ?>>Viudo(a)</option>
                                <option value="Soltero(a)" <?php if ($item['tc_estado_civil'] == 'Soltero(a)') : ?> selected="selected" <?php endif;  ?>>Soltero(a)</option>
                            </select>
                        </div>
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="Cedula">Número de plaza:</label>
                            <input readonly class="col-sm-4 form-control form-control-sm" type="text" id="num" name="num" value="<?php echo $item['tn_numero_plaza']; ?>">

                        </div>
                        <?php
                        if ($item['tn_estado'] == 0) {
                        ?>
                            <div class="row professional-register" id="state">
                                <label class="col-sm-6 control-label small" for="statusLbl">Estado:</label>
                                <br />
                                <input id="active" type="radio" for="status" name="status" checked value="Active">Activo

                                <br />
                                <input id="inactive" type="radio" for="status" name="status" value="Inactive">Inactivo
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if ($item['tn_estado'] == 1) {
                        ?>
                            <div class="row professional-register" id="state">
                                <label class="col-sm-6 control-label small" for="statusLbl">Estado:</label>
                                <br />
                                <input id="active" type="radio" for="status" name="status" value="Active">Activo

                                <br />
                                <input id="inactive" type="radio" for="status" name="status" checked value="Inactive">Inactivo
                            </div>
                        <?php
                        }
                        ?>

                    </div>

                    <div class="col-sm-6" style="margin-top: 50px">
                        <br />
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="EmergencyContact">Nombre contacto en caso de emergencia:</label>
                            <input onkeypress="return onlyLetters(event)" class="col-sm-4 form-control form-control-sm" type="text" id="EmergencyContact" name="EmergencyContact" value="<?php echo $item['tc_contacto_emergencia']; ?>">
                        </div>
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="EmergencyContactNumber">Número del contacto:</label>
                            <input onkeypress="return onlyNumbers(event)" minlength="8" maxlength="8" class="col-sm-4 form-control form-control-sm" type="text" id="EmergencyContactNumber" name="EmergencyContactNumber" value="<?php echo $item['tn_contacto_emergencia']; ?>">
                        </div>
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="scholarship">Escolaridad:</label>
                            <select class="col-sm-4 custom-select custom-select-sm" id="scholarship" name="scholarship">

                                <option value="Tecnico" <?php if ($item['tc_escolaridad'] == 'Tecnico') : ?> selected="selected" <?php endif;  ?>>T&eacutecnico</option>
                                <option value="Bachillerato" <?php if ($item['tc_escolaridad'] == 'Bachillerato') : ?> selected="selected" <?php endif;  ?>>Bachillerato</option>
                                <option value="Licenciatura" <?php if ($item['tc_escolaridad'] == 'Licenciatura') : ?> selected="selected" <?php endif;  ?>>Licenciatura</option>
                                <option value="Maestria" <?php if ($item['tc_escolaridad'] == 'Maestria') : ?> selected="selected" <?php endif;  ?>>Maestr&iacutea</option>
                                <option value="Doctorado" <?php if ($item['tc_escolaridad'] == 'Doctorado') : ?> selected="selected" <?php endif;  ?>>Doctorado</option>

                            </select>
                        </div>
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="specialty">Especialidad:</label>
                            <input onkeypress="return onlyLetters(event)" class="col-sm-4 form-control form-control-sm" type="text" id="specialty" name="specialty" value="<?php echo $item['tc_especialidad']; ?>">
                        </div>
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="province">Provincia:</label>
                            <input onkeypress="return onlyLetters(event)" class="col-sm-4 form-control form-control-sm" type="text" id="province" name="province" value="<?php echo $item['tc_provincia']; ?>">
                        </div>
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="canton">Cantón:</label>
                            <input onkeypress="return onlyLetters(event)" class="col-sm-4 form-control form-control-sm" type="text" id="canton" name="canton" value="<?php echo $item['tc_canton']; ?>">
                        </div>
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="district">Distrito:</label>
                            <input onkeypress="return onlyLetters(event)" class="col-sm-4 form-control form-control-sm" type="text" id="district" name="district" value="<?php echo $item['tc_distrito']; ?>">
                        </div>
                        <div class="row professional-register">
                            <label class="col-sm-6 control-label small" for="address">Dirección:</label>
                            <textarea class="col-sm-4 form-control form-control-sm" id="address" name="address" rows="1"><?php echo $item['tc_direccion']; ?></textarea>
                        </div>
                        <div class="alert-danger">
                            <span id="result" style="color:black;"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col justify-content-lg-start">


                        <a href="?controlador=Index&accion=showSearchProfessionalAdministrator" class="btn btn-success btn-sm" style="margin-left: 100px;">Atrás</a>
                    </div>
                    <div class="col justify-content-end">
                        <a onclick="modifyInformationProfessional()" class="btn btn-success btn-sm" style="margin-left: 100px;">Aceptar</a>

                    </div>
                </div>
            </div>
        </form>

<?php
    }
}
?>




<script src="~/Scripts/Site.js"></script>