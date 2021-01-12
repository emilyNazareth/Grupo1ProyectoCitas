<?php
include 'public/header.php';
?>



<div class="row">
    <div class="col-4" style="margin-left: 30px">
        <div class="row homeOptions">
            <a class="btn btn-success col-md-5 btn-block" href="?controlador=User&accion=showLoginView">Iniciar Sesión</a>
        </div>
        <div class="row homeOptions">
            <a class="btn btn-success col-md-5 btn-block" href="?controlador=Index&accion=showInfo">Consulta de citas</a>
        </div>
        <div class="row homeOptions">
            <div class="card">
                <div id="instructions" class="card-header">
                    Para obtener su cita usted debe:
                </div>
                <div  id="instruction" class="card-body">
                    <p>Seleccionar la opción "Solicite su cita aquí"</p>
                </div>
                <div id="instructions" class="card-header">
                    Recuerde
                </div>
                <div  id="instruction" class="card-body">
                    Presentarse 15 minutos antes a su cita
                </div>
            </div>
        </div>

    </div>
    <div class="col-7">
        <div class="card dateRequest-card">
            <div id="asignInstruction" class="card-header">
                Asignación de citas por internet
            </div>
            <div class="card-body text-center">
                <br />
                <br />               
                <a class="btn btn-success" href="?controlador=Index&accion=showInfo">Solicite su cita aquí</a>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'public/footer.php';
?>