<?php
include 'public/headerWithoutLogin.php';
?>



<div class="row">
    <div class="col-4" style="margin-left: 30px">
        <div class="row homeOptions">
            <a class="btn btn-success col-md-5 btn-block" href="?controlador=User&accion=showLoginView">Iniciar Sesión</a>
        </div>
        <div class="row homeOptions">
            <a class="btn btn-success col-md-5 btn-block" href="?controlador=Appointment&accion=showCheckHistory">Consulta de citas</a>
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
                <a class="btn btn-success" href="?controlador=User&accion=registerProfessional">Solicite su cita aquí</a>
<!--                <button type="button"  name="userLoginbtn" id="clientLoginbtn" href="javascript:;"
                        onclick="registerProfessional(304850984, 
            123, 'Emily Profesional', 'Melendez', 
            'Castro', '25348790',
            '25678743', '1995-03-30', 'F', 
            'soltera', 456,               
            1, 'Marvin Melendez', 
            88888888, 'secundaria', 
            'psicologa',  'CPH78', 
            'Cartago', 'Alvarado', 'Pacayas',
            '800 metros este del BN');return false;" 
                    class="btn btn-success">Solicite su cita aquí
            </button>-->
            </div>
        </div>
    </div>
</div>
<?php
include_once 'public/footer.php';
?>