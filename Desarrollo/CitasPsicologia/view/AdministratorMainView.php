<?php 

include_once 'public/header.php';
?>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<nav class="navbar navbar-expand-lg nav-item"  >
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div  class="collapse navbar-collapse"  style="margin-top: -2em">
        <ul class="navbar-nav" style="margin-left: 100px">                      
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrar Profesional
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" >
                    <a class="dropdown-item" href="?controlador=Index&accion=showRegisterProfessionalView">Registrar Profesional</a>
                    <a class="dropdown-item" href="?controlador=Index&accion=showSearchProfessionalAdministrator">Buscar Profesional</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrar Cita
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="?controlador=Index&accion=showInfo">Asignar cita</a>
                    <a class="dropdown-item" href="?controlador=Index&accion=showInfo">Buscar cita</a>

                </div>
            </li>            
            <li class="nav-item">
                 <a class="nav-link" href="?controlador=User&accion=showIndexView">Cerrar Sesión</a>
            </li>
        </ul>
    </div>
</nav>
<?php

include_once 'public/footer.php';
?>