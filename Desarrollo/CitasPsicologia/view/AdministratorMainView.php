<?php

include_once 'public/header.php';
?>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<nav class="navbar navbar-expand-lg small" style="margin-left: 80px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">                      
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrar Profesional
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <a class="dropdown-item" href="?controlador=Index&accion=showInfo">Registrar Profesional</a>
                    <!--@Html.ActionLink("Registrar Profesional", "MainProfessionalRegisterAdministrator", "User", null, new { @class = "dropdown-item" })-->
                    <!--@Html.ActionLink("Buscar Profesional", "SearchProfessionalAdministrator", "User", null, new { @class = "dropdown-item" })-->
                    <a class="dropdown-item" href="?controlador=Index&accion=showSearchProfessionalAdministrator">Buscar Profesional</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrar Cita
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <!--@Html.ActionLink("Asignar cita", "MainFunctionaryRegisterAdministrator", "Appointment", null, new { @class = "dropdown-item" })-->
                    <a class="dropdown-item" href="?controlador=Index&accion=showInfo">Asignar cita</a>
                    <!--@Html.ActionLink("Buscar cita", "ConsultDateAdministrator", "User", null, new { @class = "dropdown-item" })-->
                    <a class="dropdown-item" href="?controlador=Index&accion=showInfo">Buscar cita</a>

                </div>
            </li>            
            <li class="nav-item">
                <!--@Html.ActionLink("Cerrar Sesión", "LogOut", "User", null, new { @class = "nav-link" })-->
                 <a class="nav-link" href="?controlador=User&accion=showIndexView">Cerrar Sesión</a>
            </li>
        </ul>
    </div>
</nav>
<?php

include_once 'public/footer.php';
?>