<?php
include 'public/header.php';
?>

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
<?php
if (empty($vars['professional'])) {
?>
<label class="col-sm-6 control-label small" style="color: black;" for="Cedula">Nada</label>
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
                        <input readonly class="col-sm-4 form-control form-control-sm" type="text" id="Cedula" name="Cedula" value=<?php echo $item['cedula']; ?>>

                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="name">Nombre:</label>
                        <input required class="col-sm-4 form-control form-control-sm" type="text" id="name" name="name" value=<?php echo $item['nombre']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="firstLastName">Primer Apellido:</label>
                        <input class="col-sm-4 form-control form-control-sm" type="text" id="firstLastName" name="firstLastName" value=<?php echo $item['primerApellido']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="secondLastName">Segundo Apellido:</label>
                        <input class="col-sm-4 form-control form-control-sm" type="text" id="secondLastName" name="secondLastName" value=<?php echo $item['segundoApellido']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="personalPhone">Teléfono Personal:</label>
                        <input class="col-sm-4 form-control form-control-sm" type="number" id="personalPhone" name="personalPhone" value=<?php echo $item['telefonoPersonal']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="RoomPhone">Teléfono de habitación:</label>
                        <input class="col-sm-4 form-control form-control-sm" type="number" id="RoomPhone" name="RoomPhone" value=<?php echo $item['telefonoHabitacion']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="birthday">Fecha de nacimiento</label>
                        <input type="datetime" class="col-sm-4 form-control form-control-sm" id="birthday" name="birthday" value=<?php echo $item['fechaNacimiento']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="gender">Sexo</label>
                        <select class="col-sm-5 custom-select custom-select-sm" id="gender" name="gender">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="civilStatus">Estado civil:</label>
                        <select class="col-sm-5 custom-select custom-select-sm" id="civilStatus" name="civilStatus" value=<?php echo $item['estadoCivil']; ?>>
                            <option value="Divorsiado(a)">Divorsiado(a)</option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Viudo(a)">Viudo(a)</option>
                            <option value="Soltero(a)">Soltero(a)</option>
                        </select>

                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="placeNumber">Número de plaza</label>
                        <input class="col-sm-4 form-control form-control-sm" type="number" id="placeNumber" name="placeNumber" value="<?php echo $item['numeroPlaza']; ?>">
                    </div>



                    <?php
                    if ($item['estado'] == 0) {
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
                    if ($item['estado'] == 1) {
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
                        <label class="col-sm-6 control-label small" for="EmergencyContact">Contacto en caso de emergencia:</label>
                        <input class="col-sm-4 form-control form-control-sm" type="text" id="EmergencyContact" name="EmergencyContact" value=<?php echo $item['contactoEmergencia']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="EmergencyContactNumber">Número del contacto:</label>
                        <input class="col-sm-4 form-control form-control-sm" type="number" id="EmergencyContactNumber" name="EmergencyContactNumber" value=<?php echo $item['numeroContactoEmergencia']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="scholarship">Escolaridad:</label>
                        <select class="col-sm-5 custom-select custom-select-sm" id="scholarship" name="scholarship" value=<?php echo $item['escolaridad']; ?>>
                            <option value="T&eacutecnico">T&eacutecnico</option>
                            <option value="Bachillerato">Bachillerato</option>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Maestr&iacutea">Maestr&iacutea</option>
                            <option value="Doctorado">Doctorado</option>
                        </select>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="specialty">Especialidad:</label>
                        <input class="col-sm-4 form-control form-control-sm" type="text" id="specialty" name="specialty" value=<?php echo $item['especialidad']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="schoolCode">Código de colegio:</label>
                        <input class="col-sm-4 form-control form-control-sm" type="number" id="schoolCode" name="schoolCode" value=<?php echo $item['codigoColegio']; ?>>
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="province">Provincia</label>
                        <input class="col-sm-4 form-control form-control-sm" type="text" id="province" name="province" value=<?php echo $item['provincia']; ?>>
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="canton">Cantón</label>
                        <input class="col-sm-4 form-control form-control-sm" type="text" id="canton" name="canton" value=<?php echo $item['canton']; ?>>
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="district">Distrito</label>
                        <input class="col-sm-4 form-control form-control-sm" type="text" id="district" name="district" value=<?php echo $item['distrito']; ?>>
                    </div>
                    <div class="row professional-register">
                        <label class="col-sm-6 control-label small" for="address">Dirección:</label>
                        <textarea class="col-sm-6 form-control form-control-sm" id="address" name="address" rows="1"><?php echo $item['direccion']; ?></textarea>
                    </div>
                    <div class="alert-danger">
                        <span id="resultado"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col justify-content-lg-start">

                   <!-- @Html.ActionLink("Atr\u00E1s", "SearchProfessionalAdministrator", "User", null, new { @class = "btn btn-success btn-sm" })  -->
                    <a onclick="modifyInformationProfessional()" class="btn btn-success btn-sm" style="margin-left: 100px;">Atrás</a>


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