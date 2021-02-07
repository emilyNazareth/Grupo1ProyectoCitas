
<?php
include 'public/header.php';
?>

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>

<font color="Black">
<form asp-controller="Appointment" asp-action="MainFunctionaryRegisterAdministrator" action="ScheduleDatesAdministrator.php" method="post">

    <div class="container text-left">

        <div class="row">

            <div class="col-sm-6" style="margin-top: 50px">
                <p class="titles">Datos Personales</p>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="identification">Número de identificación:</label>
                    <input  onkeypress="return onlyNumbers(event)" minlength="9" maxlength="9" placeholder="#0###0###"class="col-sm-6 form-control form-control-sm" type="text" id="cedula" name="cedula" required>
                    <div class="col-sm-2">
                        <a class="btn btn-success" id="cleanPlace" name="cleanPlace" onclick="searchFunctionary()"><i class='bx bx-search' ></i></a>

                    </div>

                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="name">Nombre:</label>
                    <input onkeypress="return onlyLetters(event)" required class="col-sm-6 form-control form-control-sm" type="text" id="name" name="name" required>
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="firstLastName">Primer Apellido:</label>
                    <input onkeypress="return onlyLetters(event)" required class="col-sm-6 form-control form-control-sm" type="text" id="firstLastName" name="firstLastName" required >
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="secondLastName">Segundo Apellido:</label>
                    <input onkeypress="return onlyLetters(event)" required class="col-sm-6 form-control form-control-sm" type="text" id="secondLastName" name="secondLastName" required>
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="personalPhone">Teléfono Personal:</label>
                    <input onkeypress="return onlyNumbers(event)" minlength="8" maxlength="8" class="col-sm-6 form-control form-control-sm" type="text" id="personalPhone" name="personalPhone" required>
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="housePhone">Teléfono de habitación:</label>
                    <input onkeypress="return onlyNumbers(event)" minlength="8" maxlength="8" class="col-sm-6 form-control form-control-sm" type="text" id="housePhone" name="roomPhone" required>
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="birthday">Fecha de nacimiento:</label>
                    <input type="date" placeholder="dd-mm-yyyy" class="col-sm-6 form-control form-control-sm" id="birthday" name="birthday" required  max="" onclick="getCurrentDate()"/>
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="gender">Sexo:</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="gender" name="gender" required>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-4 control-label small" for="scholarship">Escolaridad:</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="scholarship" name="scholarship" required>
                        <option value="Primaria">Primaria</option>
                        <option value="Secundaria">Secundaria</option>
                        <option value="Tecnico">T&eacutecnico</option>
                        <option value="Bachillerato">Bachillerato</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Maestria">Maestr&iacutea</option>
                        <option value="Doctorado">Doctorado</option>                  
                    </select>
                </div>
                <!--PROVINCIA-->
                <div class="row professional-register">
                    <label class="col-sm-4 control-label small" for="province">Provincia:</label>
                    <select class="col-sm-6 custom-select custom-select-sm" id="province" name="province" required onchange="activeCanton(); return false;" required>
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
                    <textarea class="col-sm-6 form-control form-control-sm" id="address" name="address"></textarea>
                </div>

            </div>

            <div class="col-sm-6" style="margin-top: 50px">
                <p class="titles">Datos Laborales</p>
                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="area">Área:</label>
                    <select class="col-sm-5 custom-select custom-select-sm" id="area" name="areaID" required>
                        <option value="Dirección general">Dirección general</option>
                        <option value="Unidad Regional">Unidad Regional</option>

                    </select>
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="office">Oficina:</label>

                    <select class="col-sm-5 custom-select custom-select-sm" id="office" name="officeID" required>
                        <option value="Oficina central">Oficina central</option>
                        <option value="Oficina regional">Oficina regional</option>
                        <option value="Ciencias forenses">Ciencias forenses</option>                
                    </select>

                </div>
                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="place">Puesto:</label>

                    <select class="col-sm-5 custom-select custom-select-sm" id="place" name="placeID" required>
                        <option value="Jefe">Jefe</option>
                        <option value="Coordinador">Coordinador</option>
                        <option value="Técnico">Técnico</option>
                        <option value="Gestor">Gestor</option>              
                    </select>
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="admissionDate">Fecha de ingreso:</label>
                    <input type="date" placeholder="dd-mm-yyyy" class="col-sm-5 form-control form-control-sm" id="admissionDate" name="admissionDate" required  max="" onclick="getCurrentDate()"/>
                </div>

                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="officePhone">Teléfono Oficina:</label>
                    <input onkeypress="return onlyNumbers(event)" minlength="8" maxlength="8" class="col-sm-5 form-control form-control-sm" type="text" id="oficePhone" name="oficePhone" required>
                </div>
                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="email">Correo electrónico:</label>
                    <input class="col-sm-5 form-control form-control-sm" type="email" id="mail" name="mail" required>
                </div>
                <p class="titles">Aplica si el puesto lo amerita</p>
                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="idPlaca">Id placa:</label>
                    <input class="col-sm-5 form-control form-control-sm" type="text" id="idPlaca" name="idPlaca" required>

                </div>
                <div class="row functionary-register">
                    <label class="col-sm-6 control-label small" for="expDate">Fecha de vencimiento portación de armas:</label>
                    <input type="date" placeholder="dd-mm-yyyy" class="col-sm-5 form-control form-control-sm" id="PortationExpirationDay" name="PortationExpirationDay" required/>
                </div>
                <br />

                <div class="row">  
                    <div class="col-sm " style="margin-top: 2em">
                        <!--BT BUSCAR-->
                        <a class = "btn btn-success btn-sm" href = "?controlador=User&accion=showAdministratorMainView" style="margin-inline: 3em">Atrás</a>

                        <!--BT CANCELAR-->
                        <button type="button" onclick="sendInformation()" class="btn btn-success btn-sm" id="btn-cancel" style="margin-inline: 3em" >Siguiente</button>
                    </div>
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
        // alert($('#cedula').val());
        var parameters = {"identification": $('#cedula').val()};
        $.ajax(
                {
                    //  data: {identification: $('#cedula').val('302900101')}, --> Uncaught RangeError: Maximum call stack size exceeded

                    data: parameters,
                    url: '?controlador=User&accion=searchFunctionaryByIdentification',
                    type: 'post',
                    //dataType: 'json',

                    beforeSend: function () {
                        $("#messageSpanId").html("Procesando, espere por favor ...");
                    },
                    success: function (response) {

                        data = JSON.parse(response);
                        console.log(data);
                        $('#name').val(data[0].tc_nombre);
                        $('#firstLastName').val(data[0].tc_primer_apellido);
                        $('#secondLastName').val(data[0].tc_segundo_apellido);
                        $('#personalPhone').val(data[0].tc_telefono_personal);
                        $('#housePhone').val(data[0].tc_telefono_habitacion);
                        $('#birthday').val(data[0].tf_fecha_nacimiento);
                        $('#gender').val(data[0].tc_sexo);
                        $('#scholarship').val(data[0].tc_escolaridad);
                        $('#province').val(data[0].tc_provincia);
                        $('#canton').val(data[0].tc_canton);
                        $('#district').val(data[0].tc_distrito);
                        $('#civilStatus').val(data[0].tc_estado_civil);
                        $('#address').val(data[0].tc_direccion);
                        $('#area').val(data[0].tc_area);
                        $('#office').val(data[0].tc_oficina);
                        $('#place').val(data[0].tc_puesto);
                        $('#admissionDate').val(data[0].tf_fecha_ingreso);
                        $('#oficePhone').val(data[0].tc_telefono_oficina);
                        $('#mail').val(data[0].tc_correo_electronico);
                        $('#idPlaca').val(data[0].tn_id_placa);
                        $('#PortationExpirationDay').val(data[0].tf_fecha_vencimiento_portacion);
                    }

                }
        );

    }


    function sendInformation() {

        if (isFieldEmpty($("#cedula").val()) ||
                isFieldEmpty($("#name").val()) ||
                isFieldEmpty($("#firstLastName").val()) ||
                isFieldEmpty($("#secondLastName").val()) ||
                isFieldEmpty($("#personalPhone").val()) ||
                isFieldEmpty($("#housePhone").val()) ||
                isFieldEmpty($("#birthday").val()) ||
                isFieldEmpty($("#gender").val()) ||
                isFieldEmpty($("#scholarship").val()) ||
                isFieldEmpty($("#province").val()) ||
                isFieldEmpty($("#canton").val()) ||
                isFieldEmpty($("#district").val()) ||
                isFieldEmpty($("#civilStatus").val()) ||
                isFieldEmpty($("#address").val()) ||
                isFieldEmpty($("#area").val()) ||
                isFieldEmpty($("#office").val()) ||
                isFieldEmpty($("#place").val()) ||
                isFieldEmpty($("#admissionDate").val()) ||
                isFieldEmpty($("#oficePhone").val()) ||
                isFieldEmpty($("#mail").val()) ||
                isFieldEmpty($("#idPlaca").val()) ||
                isFieldEmpty($("#PortationExpirationDay").val())) {
            $("#resultado").html("<div class='alert alert-danger'>* Todos los campos son requeridos y no pueden estar vacíos</div>");
        } else {
            $("#resultado").html("");


            var parametros = {
                "identification": $("#cedula").val(),
                "name": $("#name").val(),
                "firstLastName": $("#firstLastName").val(),
                "secondLastName": $("#secondLastName").val(),
                "personalPhone": $("#personalPhone").val(),
                "roomPhone": $("#housePhone").val(),
                "birthday": $("#birthday").val(),
                "gender": $("#gender").val(),
                "scholarship": $("#scholarship").val(),
                "province": $("#province").val(),
                "canton": $("#canton").val(),
                "district": $("#district").val(),
                "civilStatus": $("#civilStatus").val(),
                "address": $("#address").val(),
                "area": $("#area").val(),
                "office": $("#office").val(),
                "place": $("#place").val(),
                "dateAdmission": $("#admissionDate").val(),
                "officePhone": $("#oficePhone").val(),
                "email": $("#mail").val(),
                "idPlaca": $("#idPlaca").val(),
                "portingExpirationDate": $("#PortationExpirationDay").val()
            };

            $.ajax({
                data: parametros,
                url: '?controlador=User&accion=saveFunctionarySession',
                type: 'post',

                beforeSend: function () {
                    $("#resultado").html("<div class='alert alert-warning'>Procesando, espere por favor ...</div>");
                },
                success: function (response) {
                    //if (response == 1) {
                    $("#messageSpanId").html("Administrador");
                    window.location.replace("?controlador=User&accion=getProfessionals");
                }



            });

        }
    }//end sendInformation

</script>

<?php
include_once 'public/footer.php';
?>