<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Citas en linea</title>
        <meta charset="utf-8" />
        <meta name="description" content="Citas de psicologia" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" type="image/x-icon" href="public/img/icon.jpg" />

        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <!-- Jquery  -->
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <script src="public/js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



        <link rel="stylesheet" type="text/css" href="public/css/style.css" />
        <script src="public/js/script.js" type="text/javascript"></script>
        <script src="public/js/Site.js" type="text/javascript"></script>



        <!-- For validations -->
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script>
            jQuery.extend(jQuery.validator.messages, {
                required: "*",
                remote: "Por favor introduzca un valor válido",
                email: "Please enter a valid email address.",
                url: "Please enter a valid URL.",
                date: "Por favor introduzca un día válido.",
                dateISO: "Please enter a valid date (ISO).",
                number: "Por favor introduzca un númro válido.",
                digits: "Please enter only digits.",
                creditcard: "Please enter a valid credit card number.",
                equalTo: "Por favor ingrese el mismo valor nuevamente.",
                accept: "Por favor introduzca un nombre valido.",
                maxlength: jQuery.validator.format("Por favor ingrese máximo {0} caracteres"),
                minlength: jQuery.validator.format("Por favor ingrese mínimo {0} caracteres"),
                rangelength: jQuery.validator.format("Por favor ingrese un valor entre {0} y {1} caracteres."),
                range: jQuery.validator.format("Por favor ingrese un valor entre {0} y {1}."),
                max: jQuery.validator.format("Por favor ingrese máximo {0} caracteres"),
                min: jQuery.validator.format("Por favor ingrese mínimo {0} caracteres")
            });

        </script>
        <!-- For validations -->

        <script>
            function soloLetras(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toLowerCase();
                letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
                especiales = [];

                tecla_especial = false
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }

                if (letras.indexOf(tecla) == -1 && !tecla_especial)
                    return false;
            }

            function onlyNumbers(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toLowerCase();
                letras = " 0123456789";
                especiales = [8, 37, 39, 46];

                tecla_especial = false
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }

                if (letras.indexOf(tecla) == -1 && !tecla_especial)
                    return false;
            }

        </script>
        <!-- For validations -->


    </head>

    <body class="title">
        <div id="headerWithoutLogin" class="card-header">
            <br>
            <br>                
        </div>
        <div id="resultado"></div>