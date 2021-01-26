<!DOCTYPE html>
<html lang="es">

<head>
    <title>Citas en linea</title>
    <meta charset="utf-8" />
    <meta name="description" content="Citas de psicologia" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" type="image/x-icon" href="public/img/icon.jpg" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="public/js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--DATEPICKER
    <script type="text/javascript" src="libs\bootstrap-datepicker\js\bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="libs\bootstrap-datepicker\css\bootstrap-datepicker.css">-->

    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
    <script src="public/js/script.js" type="text/javascript"></script>

    <?php
    //Comprobamos si esta definida la sesión 'userAdministrator'.
    if (isset($_SESSION['userAdministrator'])) {
        if ($_SESSION['userAdministrator'] < time()) {
            unset($_SESSION['userAdministrator']);
            echo "<script> alert('Tiempo Agotado - Logearse nuevamente');
                            window.location.replace('?controlador=User&accion=showLoginView');
                            </script>";
        } else {
            $_SESSION['userAdministrator'] = time() + 900;
        }
    }
    
    //Comprobamos si esta definida la sesión 'userProfessional'.
    if (isset($_SESSION['userProfessional'])) {
        if ($_SESSION['userProfessional'] < time()) {
            unset($_SESSION['userProfessional']);
            echo "<script> alert('Tiempo Agotado - Logearse nuevamente');
                            window.location.replace('?controlador=User&accion=showLoginView');
                            </script>";
        } else {
            $_SESSION['userProfessional'] = time() + 900;
        }
    }
    ?>
    
    <!-- For validations -->
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script>
        jQuery.extend(jQuery.validator.messages, {
            required: "*",
            remote: "Please fix this field.",
            email: "Please enter a valid email address.",
            url: "Please enter a valid URL.",
            date: "Please enter a valid date.",
            dateISO: "Please enter a valid date (ISO).",
            number: "Please enter a valid number.",
            digits: "Please enter only digits.",
            creditcard: "Please enter a valid credit card number.",
            equalTo: "Please enter the same value again.",
            accept: "Please enter a value with a valid extension.",
            maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
            minlength: jQuery.validator.format("Please enter at least {0} characters."),
            rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
            range: jQuery.validator.format("Please enter a value between {0} and {1}."),
            max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
            min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
        });
        
        function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
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
    <div id="resultado"></div>







