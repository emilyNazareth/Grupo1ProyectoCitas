<!DOCTYPE html>
<html lang="es">

<head>
    <title>Citas en linea</title>
    <meta charset="utf-8" />
    <meta name="description" content="Citas de psicologia" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" type="image/x-icon" href="public/img/icon.jpg" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="public/js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--DATEPICKER-->
    <script type="text/javascript" src="libs\bootstrap-datepicker\js\bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="libs\bootstrap-datepicker\css\bootstrap-datepicker.css">

    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
    <script src="public/js/script.js" type="text/javascript"></script>

    <script>
        function registerProfessional(identification, password, name,
            firstLastName, secondLastName, personalPhone, roomPhone,
            birthday, gender, civilStatus, placeNumber, status,
            emergencyContactName, emergencyContactNumber, scholarship,
            specialty, schoolCode, province, canton, district, address) {
            var parametros = {
                "identification": identification,
                "password": password,
                "name": name,
                "firstLastName": firstLastName,
                "secondLastName": secondLastName,
                "personalPhone": personalPhone,
                "roomPhone": roomPhone,
                "birthday": birthday,
                "gender": gender,
                "civilStatus": civilStatus,
                "placeNumber": placeNumber,
                "status": status,
                "emergencyContactName": emergencyContactName,
                "emergencyContactNumber": emergencyContactNumber,
                "scholarship": scholarship,
                "specialty": specialty,
                "schoolCode": schoolCode,
                "province": province,
                "canton": canton,
                "district": district,
                "address": address
            };
            $.ajax({
                data: parametros,
                url: '?controlador=User&accion=registerProfessional',
                type: 'post',

                beforeSend: function() {
                    $("#resultado").html("Procesando, espere por favor ...");
                },
                success: function(response) {
                    $("#resultado").html(response);
                }
            });
        }
    </script>

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

</head>

<body class="title">