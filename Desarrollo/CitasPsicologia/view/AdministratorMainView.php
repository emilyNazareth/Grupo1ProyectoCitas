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
                    $_SESSION['userProfessional'][1] = time() + 900;
                }
            } else {
                echo "<script> alert('Debe logearse');
        window.location.replace('?controlador=User&accion=closeSessionAdministrator');
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
            html {
                min-height: 86%;
                position: relative;
            }
            body {
                margin: 0;
                margin-bottom: 40px;
                height: 100%
            }
            footer- {
                background-color: black;
                position: absolute;
                bottom: 0;
                width: 100%;
                height: 40px;
                color: white;
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

            ul {
                padding:0;
                margin:0
            }
            li {
                list-style:none
            }
            a:focus,a:hover {
                text-decoration:none;
                -webkit-transition:.3s ease;
                -o-transition:.3s ease;
                transition:.3s ease
            }
            a:focus {
                outline:0
            }
            img {
                max-width:100%
            }
            p {
                font-size:16px;
                line-height:30px;
                color:#898b96;
                font-weight:300
            }
            h4 {
                font-family:Rubik,sans-serif;
                margin:0;
                font-weight:400;
                padding:0;
                color:#363940
            }
            a {
                color:#5867dd
            }
            .no-padding {
                padding:0!important
            }
            .go_top {
                line-height:40px;
                cursor:pointer;
                width:40px;
                background:#5867dd;
                color:#fff;
                position:fixed;
                -webkit-box-shadow:0 4px 4px rgba(0,0,0,.1);
                box-shadow:0 4px 4px rgba(0,0,0,.1);
                -webkit-border-radius:50%;
                border-radius:50%;
                right:-webkit-calc((100% - 1140px)/ 2);
                right:calc((100% - 1140px)/ 2);
                z-index:111;
                bottom:80px;
                text-align:center
            }
            .go_top span {
                display:inline-block
            }
            .footer-big {
                padding:105px 0 65px 0
            }
            .footer-big .footer-widget {
                margin-bottom:40px
            }
            .footer-menu {
                padding-left:48px
            }
            .footer-menu ul li a {
                font-size:15px;
                line-height:32px;
                -webkit-transition:.3s;
                -o-transition:.3s;
                transition:.3s
            }
            .footer-menu--1 {
                width:100%
            }
            .footer-widget-title {
                line-height:42px;
                margin-bottom:10px;
                font-size:18px
            }
            .widget-about img {
                display:block;
                margin-bottom:30px
            }
            .widget-about p {
                font-weight:400
            }
            .widget-about .contact-details {
                margin:30px 0 0 0
            }
            .widget-about .contact-details li {
                margin-bottom:10px
            }
            .widget-about .contact-details li:last-child {
                margin-bottom:0
            }
            .widget-about .contact-details li span {
                padding-right:12px
            }
            .widget-about .contact-details li a {
                color:#5867dd
            }
            @media (max-width:991px) {
                .footer-menu {
                    padding-left:0
                }
            }

            #headerWithoutLogin {
                color: black;
                background-color: #f47424;
                margin-top: 0px;
                border: #f47424
            }


            .mini-footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                height: 40px;
                color: white;
            }

            .footer-page{
                background:#FCC300;
                border-top-right-radius: 120px;
            }

            .title {
                height: 400px;
                background-image: url("public/img/FondoSAPSOblanco.jpeg");
                background-repeat: no-repeat;
                background-size: cover;
                color: white;
                text-align: center;
            }



        </style>
    </head>

    <div id="headerWithoutLogin" class="card-header">
        <br>
        <br>                
    </div>
    <body class="title">
        <div class="navbar1" >
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
            <a href="?controlador=User&accion=closeSessionAdministrator">Cerrar Sesión</a>
        </div>

        <footer id="contactos" class="text-muted" style="margin-top: 5%;">
            <center>
                <br>
                <div id="nameEmail" class="container">
                    <h5>Citas de psicología</h5>
                    <h6>Emily Meléndez</h6>
                    <h6>Yerlin Leal</h6>
                    <h6>Luis Hidalgo</h6>
                    <h6>Alejandro Quesada  </h6>
                    <p class="copyright">Curso Gestión Proyectos Fines académicos © 2021</p> 

                </div>
            </center>
        </footer> 
    </body>

</html>