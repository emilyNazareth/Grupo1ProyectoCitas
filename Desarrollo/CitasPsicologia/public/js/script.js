function saludoArchivo() {
    alert("Saludo desde arvhivo js");
}

function parametros(nombre, asunto) {
    alert("Nombre: " + nombre + " Asunto: " + asunto);
}

function leerValores() {
    var nombre = document.getElementById('nombre');
    nombre.value = "otra cosa";
    alert(nombre.value);

}
//LOGIN USER
function userLogin(identification, password) {
    if (identification == "" || password == "") {
        $("#messageSpanId").html("Campos vacíos");
    } else {
        var parametros = { "identification": identification, "password": password };

        $.ajax({
            data: parametros,
            url: '?controlador=User&accion=logIn',
            type: 'post',
            beforeSend: function() {
                $("#messageSpanId").html("Procesando, espere por favor ...");
            },
            success: function(response) {
                if (response == 1) {
                    $("#messageSpanId").html("Administrador");
                    window.location.replace("?controlador=User&accion=showAdministratorMainView");
                } else {
                    if (response == 2) {
                        $("#messageSpanId").html("Profesional");
                        //*******poner la vista del profesional******
                        window.location.replace("?controlador=User&accion=showAdministratorMainView");
                    } else {
                        $("#messageSpanId").html("Usuario o contraseña incorrectos, compruebelos");

                    }
                }
            }
        });
    }



}; //userlogin

