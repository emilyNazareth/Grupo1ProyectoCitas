﻿
<?php
include 'public/header.php';
?>

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>

<font color="Black">
<form asp-controller="Appointment" asp-action="MainFunctionaryRegisterAdministrator" method="post">

    <div class="container text-left">

        <div class="row">

            <div class="col-sm-6" style="margin-top: 50px">
                <p class="titles">Datos Personales</p>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="identification">Numero de identificación:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="text" id="cedula" name="cedula" required pattern="[0-9]+" title="Cédula inválida">
                    <div class="col-sm-2">
                        <a class="btn btn-success btn-sm" id="cleanPlace" name="cleanPlace" value="Completar" onclick="searchFunctionary()"><i class='bx bx-search' ></i></a>

                    </div>

                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="name">Nombre:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="text" id="name" name="name" required pattern="[A-Za-z\u00E0-\u00FC]+" title="Nombre inválido">
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="firstLastName">Primer Apellido:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="text" id="firstLastName" name="firstLastName" required pattern="[A-Za-z\u00E0-\u00FC]+" title="Primer Apellido inválido">
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="secondLastName">Segundo Apellido:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="text" id="secondLastName" name="secondLastName" required pattern="[A-Za-z\u00E0-\u00FC]+" title="Segundo Apellido inválido" >
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="personalPhone">Teléfono Personal:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="text" id="personalPhone" name="personalPhone" required pattern="[0-9]+" title="Número de teléfono inválido">
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="housePhone">Teléfono de habitación:</label>
                    <input class="col-sm-6 form-control form-control-sm" type="text" id="housePhone" name="roomPhone" required pattern="[0-9]+" title="Número de teléfono inválido">
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="birthday">Fecha de nacimineto</label>
                    <input type="date" placeholder="dd-mm-yyyy" class="col-sm-6 form-control form-control-sm" id="birthday" name="birthday" required min="1930-01-01" max="2005-01-01"/>
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="gender">Sexo</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="gender" name="gender">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="scholarship">Escolaridad</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="scholarship" name="scholarship">
                        <option value="Primaria">Primaria</option>
                        <option value="Segundaria">Secundaria</option>
                        <option value="Técnico">T&eacutecnico</option>
                        <option value="Bachillerato">Bachillerato</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Maestría">Maestr&iacutea</option>
                        <option value="Doctorado">Doctorado</option>                  
                    </select>
                </div>
                <!--PROVINCIA-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="province">Provincia:</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="province" name="province" required onchange="activeCanton(); return false;">
                        <option disabled selected value>Seleccione...</option>
                    </select>
                </div>

                <!--CANTON-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="canton">Cant&oacuten:</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="canton" name="canton" required onchange="activeDistrict(); return false;" required></select>
                </div>

                <!--DISTRITO-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="district">Distrito:</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="district" name="district" required></select>
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="civilStatus">Estado civil:</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="civilStatus" name="civilStatus">
                        <option value="Casado(a)">Casado(a)</option>
                        <option value="Divorsiado(a)">Divorsiado(a)</option>
                        <option value="Viudo(a)">Viudo(a)</option>
                        <option value="Soltero(a)">Soltero(a)</option>
                    </select>
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="address">Dirección:</label>
                    <textarea class="col-sm-6 form-control form-control-sm" id="address" name="address" rows="1" required></textarea>
                </div>

            </div>

            <div class="col">
                <p class="titles">Datos Laborales</p>
                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="area">Área</label>
                    <select class="col-sm-5 custom-select custom-select-sm" id="area" name="areaID">
                        <option value="Dirección general">Dirección general</option>
                        <option value="Unidad Regional">Unidad Regional</option>
               
                    </select>
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="office">Oficina</label>

                    <select class="col-sm-5 custom-select custom-select-sm" id="office" name="officeID">
                        <option value="Oficina central">Oficina central</option>
                        <option value="Oficina regional">Oficina regional</option>
                        <option value="Ciencias forenses">Ciencias forenses</option>                
                    </select>

                </div>
                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="place">Puesto</label>

                    <select class="col-sm-5 custom-select custom-select-sm" id="place" name="placeID">
                        <option value="Jefe">Jefe</option>
                        <option value="Coordinador">Coordinador</option>
                        <option value="Técnico">Técnico</option>
                        <option value="Gestor">Gestor</option>              
                    </select>
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="admissionDate">Fecha de ingreso</label>
                    <input type="date" placeholder="dd-mm-yyyy" class="col-sm-4 form-control form-control-sm" id="admissionDate" name="admissionDate" />
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="officePhone">Teléfono Oficina:</label>
                    <input class="col-sm-4 form-control form-control-sm" type="text" id="oficePhone" name="oficePhone" pattern="[0-9]+" title="Número de teléfono inválido">
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="email">Correo electrónico:</label>
                    <input class="col-sm-4 form-control form-control-sm" type="email" id="mail" name="mail" required title="Correo inválido">
                </div>
                <p class="titles">Aplica si el puesto lo amerita</p>
                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="idPlaca">Id placa</label>
                    <input class="col-sm-4 form-control form-control-sm" type="text" id="idPlaca" name="idPlaca" pattern="[0-9]+" title="Codigo de placa inválido">

                </div>
                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="expDate">Fecha de vecimiento portación de armas</label>
                    <input type="date" placeholder="dd-mm-yyyy" class="col-sm-4 form-control form-control-sm" id="PortationExpirationDay" name="PortationExpirationDay" />
                </div>
                <br />

                <div class="row justify-content-end">

                    <input class="btn btn-success btn-sm" type="submit" id="siguiente" name="siguiente" value="Siguiente"  style="margin-left: 5px; " />
                </div>
            </div>
        </div>
    </div>
</form>


<script src="public/js/Site.js" type="text/javascript"></script>
<script>
                        window.onload = function () {
                            $("#canton").prop("disabled", true);
                            $("#district").prop("disabled", true);

                            loadGeographicInfo();
                        }


</script>


<script>


    function searchFunctionary() {
        $.ajax(
            {
                data: { identification: $('#cedula').val() },
                url: '/User/LoadFunctionary',
                type: 'post',
                beforeSend: function () {
                    $("#messageSpanId").html("Procesando, espere por favor ...");
                },
                success: function (response) {
                    data = JSON.parse(response);
                    console.log(data);
                    $('#name').val(data[0].Name);
                    $('#firstLastName').val(data[0].FirstLastName);
                    $('#secondLastName').val(data[0].SecondLastName);
                    $('#personalPhone').val(data[0].PersonalPhone);
                    $('#housePhone').val(data[0].RoomPhone);
                    $('#birthday').val(data[0].Birthday);
                    $('#gender').val(data[0].Gender);
                    $('#scholarship').val(data[0].Scholarship);
                    $('#province').val(data[0].Province);
                    $('#canton').val(data[0].Canton);
                    $('#district').val(data[0].District);
                    $('#civilStatus').val(data[0].CivilStatus);
                    $('#address').val(data[0].Address);
                    $('#assistance').val(data[0].Assistance);
                    $('#area').val(data[0].AreaID);
                    $('#office').val(data[0].OfficeID);
                    $('#place').val(data[0].PlaceID);
                    $('#admissionDate').val(data[0].AdmissionDate);
                    $('#oficePhone').val(data[0].OficePhone);
                    $('#mail').val(data[0].Mail);
                    $('#idPlaca').val(data[0].IdPlaca);
                    $('#PortationExpirationDay').val(data[0].PortationExpirationDay);
                }
            }
        );
    }
</script>

<?php
include_once 'public/footer.php';
?>
