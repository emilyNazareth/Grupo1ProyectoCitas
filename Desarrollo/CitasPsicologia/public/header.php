<!DOCTYPE html>
<html lang="es">

<head>
    <title>Citas en linea</title>
    <meta charset="utf-8" />
    <meta name="description" content="Citas de psicologia" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Jquery  -->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="public/js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->

    <!--DATEPICKER
        <script type="text/javascript" src="libs\bootstrap-datepicker\js\bootstrap-datepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="libs\bootstrap-datepicker\css\bootstrap-datepicker.css">-->

    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
    <script src="public/js/script.js" type="text/javascript"></script>
    <script src="public/js/Site.js" type="text/javascript"></script>

    <?php
    //Comprobamos si esta definida la sesión 'userAdministrator'.

    if (isset($_SESSION['userAdministrator'])) {
        if ($_SESSION['userAdministrator'][1] < time()) {
            unset($_SESSION['userAdministrator']);
            echo "<script> alert('Tiempo Agotado - Logearse nuevamente');
                            window.location.replace('?controlador=User&accion=closeSessionAdministrator');
                            </script>";
        } else {
            $_SESSION['userAdministrator'][1] = time() + 900;
        }
    } else {
        //Comprobamos si esta definida la sesión 'userProfessional'.
        if (isset($_SESSION['userProfessional'])) {
            if ($_SESSION['userProfessional'][1] < time()) {
                unset($_SESSION['userProfessional']);
                echo "<script> alert('Tiempo Agotado - Logearse nuevamente');
                            window.location.replace('?controlador=User&accion=closeSessionAdministrator');
                            </script>";
            } else {
                $_SESSION['userProfessional'][0] = time() + 900;
            }
        } else {
            echo "<script> alert('Debe logearse');
        window.location.replace('?controlador=User&accion=closeSessionAdministrator');
        </script>";
        }
    }
    ?>

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
        function onlyLetters(e) {
            key = e.keyCode || e.which;
            keys = String.fromCharCode(key).toLowerCase();
            letters = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            specials = [];

            specialKey = false
            for (var i in specials) {
                if (key == specials[i]) {
                    specialKey = true;
                    break;
                }
            }

            if (letters.indexOf(keys) == -1 && !specialKey)
                return false;
        }

        function onlyNumbers(e) {
            key = e.keyCode || e.which;
            keys = String.fromCharCode(key).toLowerCase();
            letters = " 0123456789";
            specials = [8, 37, 39, 46];

            specialKey = false
            for (var i in specials) {
                if (key == specials[i]) {
                    specialKey = true;
                    break;
                }
            }

            if (letters.indexOf(keys) == -1 && !specialKey)
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