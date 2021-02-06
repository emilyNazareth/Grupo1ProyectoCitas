<!DOCTYPE html>
<html>

<head>
    <title>Citas en linea</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="description" content="Citas de psicologia" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    } else {
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
        } else {
            echo "<script> alert('Debe logearse');
        window.location.replace('?controlador=User&accion=showLoginView');
        </script>";
        }
    }


    ?>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar1 {
            overflow: hidden;
            background-color: #f47424;
        }

        .navbar1 a {
            float: left;
            font-size: 15px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;

        }

        .dropdown1 {
            float: left;
            overflow: hidden;
        }

        .dropdown1 .dropbtn1 {
            font-size: 15px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .navbar1 a:hover,
        .dropdown1:hover .dropbtn1 {
            background-color: none;

        }

        .dropdown-content1 {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content1 a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content1 a:hover {
            background-color: #f47424;
        }

        .dropdown1:hover .dropdown-content1 {
            display: block;
        }

        .text-muted {
            color: #777;
        }

        .container1 {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;

        }

        .titleAdminSection {
            margin-top: 5em;
            height: 400px;
            background-image: url("public/img/FondoSAPSO.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
            padding-top: 10em;
            text-align: center;
        }

        abbr[titleAdminSection]
    </style>
</head>

<body class="titleAdminSection">


    <div class="navbar1" style="margin-top: -150px">
        <a href="?controlador=Appointment&accion=showReportsView">Reportes</a>
        <div class="dropdown1">
            <button class="dropbtn1">Administrar Profesional
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content1">
                <a href="?controlador=Index&accion=showRegisterProfessionalView">Registrar Profesional</a>
                <a href="?controlador=Index&accion=showSearchProfessionalAdministrator">Buscar Profesional</a>
            </div>
        </div>
        <div class="dropdown1">
            <button class="dropbtn1">Administrar Cita
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content1">
                <a href="?controlador=Index&accion=showMainFunctionaryRegisterAdministrator">Agendar Cita</a>
                <a href="?controlador=Appointment&accion=showConsultAppointmentAdministratorView">Buscar Cita</a>
            </div>
        </div>
        <a href="?controlador=User&accion=showIndexView">Cerrar Sesión</a>
    </div>




    <footer id="contactos" class="text-muted" style="margin-top: 1%;">
        <center>
            <div id="nameEmail" class="container1" style="font-size: 22px; line-height: 0px;">
                <h5>Citas de psicología</h5>
                <h6>Emily Meléndez</h6>
                <h6>Yerlin Leal</h6>
                <h6>Luis Hidalgo</h6>
                <h6>Alejandro Quesada</h6>
                <h6>Curso Gestión Proyectos Fines académicos</h6>
                <h7>2021</h7>
            </div>
        </center>
    </footer>
</body>

</html>
