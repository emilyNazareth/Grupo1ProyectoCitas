function loadGeographicInfo() {
    $.ajax(
            {
                dataType: 'json',
                url: "https://ubicaciones.paginasweb.cr/provincias.json",
                data: {},
                success: function (response) {
                    loadProvinces(response);
                }
            }
    );
}

function activeCanton() {
    $.ajax(
            {
                dataType: 'json',
                url: "https://ubicaciones.paginasweb.cr/provincia/" + $("#province").find(':selected').data('num') + "/cantones.json",
                data: {},
                success: function (response) {
                    loadCantons(response);
                    $("#district").html("");
                    $("#district").prop("disabled", true);
                }
            }
    );
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
    $.ajax(
            {
                dataType: 'json',
                url: "https://ubicaciones.paginasweb.cr/provincia/" + $("#province").find(':selected').data('num') + "/canton/" + $("#canton").find(':selected').data('num') + "/distritos.json",
                data: {},
                success: function (response) {
                    loadDistricts(response);
                }
            }
    );
}

function registerProfessional() {
    
    if($("#form-professional-register").valid()){
       var parametros = {"identification": $("#identification").val(),
        "password": $("#password").val(), "name": $("#name").val(), 
        "firstLastName": $("#firstLastName").val(), "secondLastName": $("#secondLastName").val(), 
        "personalPhone": $("#personalPhone").val(), "roomPhone": $("#roomPhone").val(), 
        "birthday": $("#birthday").val(), "gender": $("#gender").val(), "civilStatus": $("#civilStatus").val(),
        "placeNumber": $("#placeNumber").val(), "status": $("#status").val(),
        "emergencyContactName": $("#emergencyContactName").val(),
        "emergencyContactNumber": $("#emergencyContactNumber").val(),
        "scholarship": $("#scholarship").val(), "specialty": $("#specialty").val(),
        "schoolCode": $("#schoolCode").val(), "province": $("#province").val(),
        "canton": $("#canton").val(), "district": $("#district").val(), "address": $("#address").val()};
    $.ajax(
        {
            data: parametros,
            url: '?controlador=User&accion=registerProfessional',
            type: 'post',

            beforeSend: function () {
                $("#resultado").html("<div class='alert alert-warning'>Procesando, espere por favor ...</div>");
                location.replace("?controlador=Index&accion=showRegisterProfessionalView");
            },
            success: function (response) {
                $("#resultado").html("<div class='alert alert-success'>"+response+"</div>");
            },
            error: function(e){
                 $("#resultado").html("<div class='alert alert-danger'>"+e+"</div>");
            }
        }
    );
    }else{
        $("#resultado").html("<div class='alert alert-danger'>* Algunos campos son requeridos</div>");
    }
}

function cleanFormRegisterProfessional(){
    $("#identification").val(""),
    $("#password").val(""),
    $("#name").val(""), 
    $("#firstLastName").val(""),
    $("#secondLastName").val(""), 
    $("#personalPhone").val(""),
    $("#roomPhone").val(""), 
    $("#birthday").val(""),
    $("#gender").val(""),
    $("#civilStatus").val(""),
    $("#placeNumber").val(""),
    $("#status").val(""),
    $("#emergencyContactName").val(""),
    $("#emergencyContactNumber").val(""),
    $("#scholarship").val(""),
    $("#specialty").val(""),
    $("#schoolCode").val(""),
    $("#province").val(""),
    $("#canton").val(""),
    $("#district").val(""),
    $("#address").val("");
    $("#district").prop("disabled", true);
    $("#canton").prop("disabled", true);
    $("#resultado").html("");
}

