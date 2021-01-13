<?php

include 'public/header.php';
?>

<center>
    <h3 class="titles">Citas</h3>
    <p class="titles">Seleccione el tipo de b&uacutesqueda</p>
</center>

<center>
    <form id="search-form" action="/User/SearchAppointmentFunctionary" method="post">
        <div class="form-group row">
            <label for="_FunctionaryId" class="col-sm-4 col-form-label-sm" style="color: black">Cedula</label>
            <input type="text" name="_FunctionaryId" id="_FunctionaryId" class="col-sm-3 form-control form-control-sm" required placeholder="Cédula">
        </div>
        <div class="form-group row">
            <label for="_IdAppointment" class="col-sm-4 col-form-label-sm" style="color: black">Consecutivo</label>
            <input type="text" name="_IdAppointment" id="_IdAppointment" class="col-sm-3 form-control form-control-sm" required placeholder="Consecutivo">
        </div>
        <div>
            <button class="btn btn-success btn-sm" type="submit">
                Consultar
            </button>
        </div>
    </form>
</center>
<br />
<div class="row condultFunctionaryTable">
    <table class="table table-bordered table-striped table-hover table-sm table-responsive-md">
        <thead>
            <tr>
                <th scope="col">Consecutivo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Segundo Apellido</th>
                <th scope="col">Cédula</th>
                <th scope="col">Psicologo</th>            
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Ver Detalle</th>
                <th scope="col">Cancelar</th>
            </tr>
        </thead>

    </table>

    <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelModalLabel">Cancelar Cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="justificationInput">Justificaci&oacuten:</label>
                        <textarea class="form-control" id="justification"  required name="justification" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Atr&aacutes</button>
                    <button type="button" class="btn btn-danger" onclick="deleteApppointment()">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <a class="btn btn-success" href="?controlador=User&accion=showIndexView">Atrás</a>
    </div>
</div>

<?php

include_once 'public/footer.php';
?>