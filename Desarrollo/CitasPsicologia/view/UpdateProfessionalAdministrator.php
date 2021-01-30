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
        <form asp-controller="Administrator" asp-action="MainProfessionalRegisterAdministrator" method="post">
            <div class="row align-items-start">
                <div class="col">
                    <p class="text-success">Datos Personales del Profesional</p>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="Cedula">Numero de identificacion:</label>
                        <input readonly class="col-sm-4 form-control form-control-sm" type="text" id="Cedula" name="Cedula" value=<?php echo $item['pk_cedula_usuario']; ?>>

                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="name">Nombre:</label>
                        <input onkeypress="return onlyLetters(event)"  required class="col-sm-4 form-control form-control-sm" type="text" id="name" name="name" value=<?php echo $item['tc_nombre']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="pass">Contraseña:</label>
                        <input   required class="col-sm-4 form-control form-control-sm" type="text" id="pass" name="pass" value=<?php echo $item['tc_contrasena']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="firstLastName">Primer Apellido:</label>
                        <input onkeypress="return onlyLetters(event)"  class="col-sm-4 form-control form-control-sm" type="text" id="firstLastName" name="firstLastName" value=<?php echo $item['tc_primer_apellido']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="secondLastName">Segundo Apellido:</label>
                        <input  onkeypress="return onlyLetters(event)"  class="col-sm-4 form-control form-control-sm" type="text" id="secondLastName" name="secondLastName" value=<?php echo $item['tc_segundo_apellido']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="personalPhone">Teléfono Personal:</label>
                        <input onkeypress="return onlyNumbers(event)" minlength="8" maxlength="8" class="col-sm-4 form-control form-control-sm" type="text" id="personalPhone" name="personalPhone" value=<?php echo $item['tc_telefono_personal']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="RoomPhone">Teléfono de habitación:</label>
                        <input onkeypress="return onlyNumbers(event)" minlength="8" maxlength="8"  class="col-sm-4 form-control form-control-sm" type="text" id="RoomPhone" name="RoomPhone" value=<?php echo $item['tc_telefono_habitacion']; ?>>
                    </div>

                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="civilStatus">Estado civil:</label>
                        <select class="col-sm-4 custom-select custom-select-sm" id="civilStatus" name="civilStatus" value=<?php echo $item['tc_estado_civil']; ?>>
                            <option value="Divorsiado(a)">Divorsiado(a)</option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Viudo(a)">Viudo(a)</option>
                            <option value="Soltero(a)">Soltero(a)</option>
                        </select>

                    </div>

                    <?php
                    if ($item['tn_estado'] == 0) {
                        ?>
                        <div class="professional-register" id="state">
                            <label>Estado</label>
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
                        <div class="professional-register" id="state">
                            <label>Estado</label>
                            <br />
                            <input id="active" type="radio" for="status" name="status" value="Active">Activo

                            <br />
                            <input id="inactive" type="radio" for="status" name="status" checked value="Inactive">Inactivo
                        </div>
                        <?php
                    }
                    ?>

                </div>
                <div class="col">
                    <br />
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="EmergencyContact">Nombre contacto en caso de emergencia:</label>
                        <input onkeypress="return onlyLetters(event)" class="col-sm-4 form-control form-control-sm" type="text" id="EmergencyContact" name="EmergencyContact" value=<?php echo $item['tc_contacto_emergencia']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="EmergencyContactNumber">Número del contacto:</label>
                        <input onkeypress="return onlyNumbers(event)" minlength="8" maxlength="8"  class="col-sm-4 form-control form-control-sm" type="text" id="EmergencyContactNumber" name="EmergencyContactNumber" value=<?php echo $item['tn_contacto_emergencia']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="scholarship">Escolaridad:</label>
                        <select class="col-sm-4 custom-select custom-select-sm" id="scholarship" name="scholarship" value="<?php echo $item['tc_escolaridad']; ?>">
                            <option value="T&eacutecnico">T&eacutecnico</option>
                            <option value="Bachillerato">Bachillerato</option>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Maestr&iacutea">Maestr&iacutea</option>
                            <option value="Doctorado">Doctorado</option>
                            <!--option value="Bachillerato"<?//php if($item['tc_escolaridad'] == 'Bachillerato'): ?> selected="selected"<?php // endif;  ?>>Bachillerato</option-->
                        </select>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="specialty">Especialidad:</label>
                        <input onkeypress="return onlyLetters(event)" class="col-sm-4 form-control form-control-sm" type="text" id="specialty" name="specialty" value=<?php echo $item['tc_especialidad']; ?>>
                    </div>                  
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="province">Provincia:</label>
                        <input class="col-sm-4 form-control form-control-sm" type="text" id="province" name="province" value=<?php echo $item['tc_provincia']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="canton">Cantón:</label>
                        <input class="col-sm-4 form-control form-control-sm" type="text" id="canton" name="canton" value=<?php echo $item['tc_canton']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="district">Distrito:</label>
                        <input class="col-sm-4 form-control form-control-sm" type="text" id="district" name="district" value=<?php echo $item['tc_distrito']; ?>>
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
        </form>

        <?php
    }
}
?>




<script src="~/Scripts/Site.js"></script>