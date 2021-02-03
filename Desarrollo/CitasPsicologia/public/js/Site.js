function loadGeographicInfo() {
    $.ajax({
        dataType: 'json',
        url: "https://ubicaciones.paginasweb.cr/provincias.json",
        data: {},
        success: function (response) {
            loadProvinces(response);
        }
    });
}

function activeCanton() {
    $.ajax({
        dataType: 'json',
        url: "https://ubicaciones.paginasweb.cr/provincia/" + $("#province").find(':selected').data('num') + "/cantones.json",
        data: {},
        success: function (response) {
            loadCantons(response);
            $("#district").html("");
            $("#district").prop("disabled", true);
        }
    });
}

function loadProvinces(provinces) {
    options = "<option disabled selected value= \"" + 'Seleccione..' + "\" data-num=\"" + 0 + "\">" + 'Seleccione..' + "</option>";
    for (key in provinces) {
        options += "<option value= \"" + provinces[key] + "\" data-num=\"" + key + "\">" + provinces[key] + "</option>";
    }
    professionalsSelect = document.getElementById("province");
    professionalsSelect.innerHTML = options;
}

function loadCantons(cantons) {
    options = "<option disabled selected value= \"" + 'Seleccione..' + "\" data-num=\"" + 0 + "\">" + 'Seleccione..' + "</option>";
    for (key in cantons) {
        options += "<option value= \"" + cantons[key] + "\" data-num=\"" + key + "\">" + cantons[key] + "</option>";
    }

    professionalsSelect = document.getElementById("canton");
    professionalsSelect.innerHTML = options;
    $("#canton").prop("disabled", false);
}

function loadDistricts(districts) {
    options = "<option disabled selected value= \"" + 'Seleccione..' + "\" data-num=\"" + 0 + "\">" + 'Seleccione..' + "</option>";
    for (key in districts) {
        options += "<option value= \"" + districts[key] + "\" data-num=\"" + key + "\">" + districts[key] + "</option>";
    }

    professionalsSelect = document.getElementById("district");
    professionalsSelect.innerHTML = options;
    $("#district").prop("disabled", false);
}

function activeDistrict() {
    $.ajax({
        dataType: 'json',
        url: "https://ubicaciones.paginasweb.cr/provincia/" + $("#province").find(':selected').data('num') + "/canton/" + $("#canton").find(':selected').data('num') + "/distritos.json",
        data: {},
        success: function (response) {
            loadDistricts(response);
        }
    });
}


function registerProfessional() {
    if (isFieldEmpty($("#identification").val()) ||
            isFieldEmpty($("#password").val()) ||
            isFieldEmpty($("#name").val()) ||
            isFieldEmpty($("#firstLastName").val()) ||
            isFieldEmpty($("#secondLastName").val()) ||
            isFieldEmpty($("#personalPhone").val()) ||
            isFieldEmpty($("#roomPhone").val()) ||
            isFieldEmpty($("#birthday").val()) ||
            isFieldEmpty($("#gender").val()) ||
            isFieldEmpty($("#civilStatus").val()) ||
            isFieldEmpty($("#placeNumber").val()) ||
            isFieldEmpty($("#status").val()) ||
            isFieldEmpty($("#emergencyContactName").val()) ||
            isFieldEmpty($("#emergencyContactNumber").val()) ||
            isFieldEmpty($("#scholarship").val()) ||
            isFieldEmpty($("#specialty").val()) ||
            isFieldEmpty($("#schoolCode").val()) ||
            isFieldEmpty($("#province").val()) ||
            isFieldEmpty($("#canton").val()) ||
            isFieldEmpty($("#district").val()) ||
            isFieldEmpty($("#addressProfessional").val())) {
        $("#resultado").html("<div class='alert alert-danger'>* Todos los campos son requeridos y no pueden estar vacíos</div>");
    } else {
        $("#resultado").html("");
        if ($("#form-professional-register").valid()) {
            var parametros = {
                "identification": $("#identification").val(),
                "password": $("#password").val(),
                "name": $("#name").val(),
                "firstLastName": $("#firstLastName").val(),
                "secondLastName": $("#secondLastName").val(),
                "personalPhone": $("#personalPhone").val(),
                "roomPhone": $("#roomPhone").val(),
                "birthday": $("#birthday").val(),
                "gender": $("#gender").val(),
                "civilStatus": $("#civilStatus").val(),
                "placeNumber": $("#placeNumber").val(),
                "status": $("#status").val(),
                "emergencyContactName": $("#emergencyContactName").val(),
                "emergencyContactNumber": $("#emergencyContactNumber").val(),
                "scholarship": $("#scholarship").val(),
                "specialty": $("#specialty").val(),
                "schoolCode": $("#schoolCode").val(),
                "province": $("#province").val(),
                "canton": $("#canton").val(),
                "district": $("#district").val(),
                "addressProfessional": $("#addressProfessional").val()
            };

            $.ajax({
                data: parametros,
                url: '?controlador=User&accion=registerProfessional',
                type: 'post',

                beforeSend: function () {
                    $("#resultado").html("<div class='alert alert-warning'>Procesando, espere por favor ...</div>");
                },
                success: function (response) {
                    cleanFormRegisterProfessional();
                    $("#resultado").html("<div class='alert alert-success'>" + response + "</div>");

                },
                error: function (e) {
                    $("#resultado").html("<div class='alert alert-danger'>" + e + "</div>");
                }
            });
        }

    }
}

function cleanFormRegisterProfessional() {
    $("#identification").val("");
    $("#password").val("");
    $("#name").val("");
    $("#firstLastName").val("");
    $("#secondLastName").val("");
    $("#personalPhone").val("");
    $("#roomPhone").val("");
    $("#birthday").val("");
    $("#gender").val("");
    $("#civilStatus").val("");
    $("#placeNumber").val("");
    $("#status").val("");
    $("#emergencyContactName").val("");
    $("#emergencyContactNumber").val("");
    $("#scholarship").val("");
    $("#specialty").val("");
    $("#schoolCode").val("");
    $("#province").val("");
    $("#canton").val("");
    $("#district").val("");
    $("#addressProfessional").val("");
    $("#district").prop("disabled", true);
    $("#canton").prop("disabled", true);
    $("#resultado").html("");
}

function isFieldEmpty(fieldValue) {
    if (fieldValue.trim() === "") {
        return true;
    } else {
        return false;
    }

}

function getCurrentDate() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("birthday").setAttribute("max", today);
}

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function deleteProfessional($identification) {
    var parametros = {"identification": $identification};

    $.ajax({
        data: parametros,
        url: '?controlador=User&accion=deleteProfessional',
        type: 'post',

        beforeSend: function () {
            $("#message").html("<div class='alert alert-warning'>Procesando, espere por favor ...</div>");
        },
        success: function (response) {
            $("#message").html("<div class='alert alert-success'>" + response + "</div>");
            location.href = "?controlador=Index&accion=showSearchProfessionalAdministrator";
        },
        error: function (e) {
            $("#message").html("<div class='alert alert-danger'>" + e + "</div>");
        }
    });



}

function modifyProfessionalUrl($identification) {
    window.location.replace("?controlador=User&accion=showUpdateProfessional&Cedula=" + $identification);
}
;



function modifyInformationProfessional() {
    $("#result").html("");
    var cedula = document.getElementById("Cedula").value;
    var name = document.getElementById("name").value;
    var password = document.getElementById("pass").value;
    var firstLastName = document.getElementById("firstLastName").value;
    var secondLastName = document.getElementById("secondLastName").value;
    var personalPhone = document.getElementById("personalPhone").value;
    var RoomPhone = document.getElementById("RoomPhone").value;
    var civilStatus = document.getElementById("civilStatus").value;
    var EmergencyContact = document.getElementById("EmergencyContact").value;
    var contactNumber = document.getElementById("EmergencyContactNumber").value;
    var scholarship = document.getElementById("scholarship").value;
    var specialty = document.getElementById("specialty").value;
    var province = document.getElementById("province").value;
    var canton = document.getElementById("canton").value;
    var district = document.getElementById("district").value;
    var address = document.getElementById("address").value;

    var stateValue;
    if (document.getElementById('active').checked) {
        stateValue = 0;
    } else {
        stateValue = 1;
    }

    if (cedula == '' || name == '' || firstLastName == '' || secondLastName == '' ||
            personalPhone == '' || RoomPhone == '' || civilStatus == '' ||
            EmergencyContact == '' || contactNumber == '' || scholarship == '' || specialty == '' ||
            province == '' || canton == '' || district == '' || address == '') {
        $("#result").html("*Todos los campos son requeridos");
    } else {
        if ($("#form-professional-update").valid()) {
            var parameters = {
                "cedula": cedula,
                "contrasena": password,
                "nombre": name,
                "primerApellido": firstLastName,
                "segundoApellido": secondLastName,
                "telPersonal": personalPhone,
                "telHabitacion": RoomPhone,
                "estadoCivil": civilStatus,
                "estado": stateValue,
                "contactoEmergancia": EmergencyContact,
                "numeroContactoEmergancia": contactNumber,
                "escolaridad": scholarship,
                "especialidad": specialty,
                "provincia": province,
                "canton": canton,
                "distrito": district,
                "direccion": address

            };

            $.ajax({
                data: parameters,
                url: '?controlador=User&accion=updateProfessional',
                type: 'post',
                beforeSend: function () {
                    $("#result").html("Procesando, espere por favor ...");
                },
                success: function (response) {
                    $("#result").html(response);

                }
            });
        }

    }

}


function searchAppointmentByFilter($identification, $consecutive, $initialDate,
        $finalDate, $professional, $gender) {
    var parameters = {"identification": $identification,
        "consecutive": $consecutive,
        "initialDate": $initialDate,
        "finalDate": $finalDate,
        "professional": $professional,
        "gender": $gender};

    $.ajax({
        data: parameters,
        url: '?controlador=Appointment&accion=searchAppointment',
        type: 'post',
        success: function (response) {
            var data = response;

            console.log(data);
            if (data == 0) {
                $("#result").html("<div class='alert alert-danger'>*No se encontraron registros</div>");
                $("#tbody").html('');
            } else {
                $("#result").html("");
                $("#tbody").html(data);
            }




        }
    });



}

function alertInputInicialDate() {
    if (!$("#finalDate").prop('disabled') && $("#finalDate").val() != "") {
        $("#btn-accept").prop('disabled', false);
    } else {
        $("#btn-accept").prop('disabled', true);
        $("#resultado").html("<div class='alert alert-warning'>Es necesario seleccionar una fecha final para realizar la búsqueda</div>");
    }

    $("#finalDate").prop('min', $("#initialDate").val());
    $("#finalDate").prop('disabled', false);
}

function alertInputFinalDate() {
    $("#resultado").html("<div class='alert alert-warning'>Final</div>");
    $("#btn-accept").prop('disabled', false);
    $("#resultado").html("");
    $("#initialDate").prop('max', $("#finalDate").val());
}

function cleanFormConsultAppointment() {
    $("#identification").val("");
    $("#initialDate").val("");
    $("#gender").val("");
    $("#finalDate").val("");
    $("#professional").val("");
    $("#consecutive").val("");

    $("#resultado").html("");

    $("#btn-accept").prop('disabled', false);
    $("#finalDate").prop('disabled', true);

    $("#finalDate").prop('min', "");
    $("#initialDate").prop('max', "");
}