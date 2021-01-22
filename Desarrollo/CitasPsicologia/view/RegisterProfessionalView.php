<?php
include 'public/header.php';
?>

<form>
    
    <div class="container text-left">
        
        <div class="row">
        
            <div class="col-sm-6">
                <p class="title-professional-register">Datos Personales del Profesional</p>

                <!--IDENTIFICACION-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="Cedula">N&uacute;mero de identificaci&oacute;n:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="number" id="Cedula" name="Cedula" required>
                </div>

                <!--CONTRASENA-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="name">Contrase&ntilde;a:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="password" id="Password" name="Password">
                </div>

                <!--NOMBRE-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="name">Nombre:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="text" id="name" name="name">
                </div>

                <!--PRIMER APELLIDO-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="firstLastName">Primer Apellido:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="text" id="firstLastName" name="firstLastName">
                </div>

                <!--SEGUNDO APELLIDO-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="secondLastName">Segundo Apellido:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="text" id="secondLastName" name="secondLastName">
                </div>

                <!--TELEFONO PERSONAL-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="personalPhone">Tel&eacute;fono Personal:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="number" id="personalPhone" name="personalPhone">
                </div>

                <!--TELEFONO DE HABITACION-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="RoomPhone">Tel&eacutefono de habitaci&oacuten:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="number" id="roomPhone" name="roomPhone">
                </div>

                <!--FECHA DE NACIMIENTO-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="birthday">Fecha de nacimiento</label>
                    <input type="date" class="col-sm-6 form-control form-control-sm" id="birthday" name="birthday" />
                </div>

                <!--SEXO-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="gender">Sexo</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="gender" name="gender">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>

                <!--ESTADO CIVIL-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="civilStatus">Estado civil:</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="civilStatus" name="civilStatus">
                        <option value="Casado(a)">Casado(a)</option>
                        <option value="Divorsiado(a)">Divorciado(a)</option>
                        <option value="Viudo(a)">Viudo(a)</option>
                        <option value="Soltero(a)">Soltero(a)</option>
                    </select>
                </div>

                <!--NUMERO DE PLAZA-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="placeNumber">N&uacutemero de plaza</label>
                    <input class="col-sm-6 form-control form-control-sm" type="number" id="placeNumber" name="placeNumber">
                </div>

            </div>

            <div class="col-sm-6">

                <!--ESTADO-->
                <div class="row professional-register" id="state">
                    <label class="col-sm-4 control-label small" for="state">Estado</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="state" name="state">
                        <option id="active" value="M">Activo</option>
                        <option id="inactive" value="F">Inactivo</option>
                    </select>
                </div>

                <!--CONTACTO EMERGENCIA-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="EmergencyContact">Contacto en caso de emergencia:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="text" id="EmergencyContact" name="EmergencyContact">
                </div>

                <!--NUM CONTACTO EMERGENCIA-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="EmergencyContactNumber">N&uacutemero del contacto:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="number" id="EmergencyContactNumber" name="EmergencyContactNumber">
                </div>

                <!--ESCOLARIDAD-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="scholarship">Escolaridad:</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="scholarship" name="scholarship">
                        <option value="T&eacutecnico">T&eacutecnico</option>
                        <option value="Bachillerato">Bachillerato</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Maestr&iacutea">Maestr&iacutea</option>
                        <option value="Doctorado">Doctorado</option>
                    </select>
                </div>

                <!--ESPECIALIDAD-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="specialty">Especialidad:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="text" id="specialty" name="specialty">
                </div>

                <!--CODIGO COLEGIO-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="schoolCode">C&oacutedigo de colegio:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="number" id="schoolCode" name="schoolCode">
                </div>

                <!--PROVINCIA-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="province">Provincia</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="province" name="province" onchange="activeCanton(); return false;">
                        <option selected>Seleccione...</option>
                    </select>
                </div>

                <!--CANTON-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="canton">Cant&oacuten</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="canton" name="canton" onchange="activeDistrict(); return false;"></select>
                </div>

                <!--DISTRITO-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="district">Distrito</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="district" name="district"></select>
                </div>

                <!--DIRECCION-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="address">Direcci&oacuten:</label>
                    <textarea class="col-sm-6 form-control form-control-sm" id="address" name="address" rows="1"></textarea>
                </div>

            </div>
        
            <div class="col-sm-12 buttons-professional-register">
                <div class="row">
                    <!--BT ATRAS-->
                    <div class="col-sm-6">
                        <a onclick="registerProfessional()" class="btn btn-success btn-sm">Atr&aacute;s</a>
                    </div>

                    <!--BT ACEPTAR-->
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">a</div>
                        
                            <div class="col-sm-6 btn-action">
                                <a onclick="registerProfessional()" class="btn btn-success btn-sm">Aceptar</a>

                            <!--BT CANCELAR-->
                            <a onclick="registerProfessional()" class="btn btn-success btn-sm" id="btn-cancel">Cancelar</a>
                        </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>

</form>

<script src="public\js\Site.js"></script>

<script>
    window.onload = function () {
        $("#canton").prop("disabled", true);
        $("#district").prop("disabled", true);
        
        loadGeographicInfo();
    }
</script>