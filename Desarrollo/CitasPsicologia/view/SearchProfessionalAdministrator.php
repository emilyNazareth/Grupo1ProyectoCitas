<?php

include 'public/header.php';
?>

<center>
    <h3 class="titles">Profesional</h3>

</center>

<center>

<font color="Black">

    <form id="login-form">
        <div class="form-group row">
            <label for="identificationInput" class="col-sm-7 col-form-label-sm">C&eacutedula</label>

            <input type="number" name="id" id="id" class="col-sm-5 form-control form-control-sm">
        </div>
        <div class="form-group row">
            <label for="nameInput" class="col-sm-7 col-form-label-sm" >Nombre</label>
            <input type="text" name="nameInput" id="name" class="col-sm-5 form-control form-control-sm">
        </div>
        <div class="form-group row">
            <label for="lastnameInput" class="col-sm-7 col-form-label-sm">Apellidos</label>
            <input type="text" name="lastnameInput" id="lastname" class="col-sm-5 form-control form-control-sm">
        </div>
        <div>
            <a class="btn btn-success btn-sm" id="consultDate" onclick="searchProfessional()" name="consultDate">Buscar</a>
        </div>
        <div class="alert-danger justify-content-end">
            <span id="resultado"></span>
        </div>
    </form>
</center>
<br />
<div class="row condultFunctionaryTable">
    <span id="messageSpanId"></span>


    <table id="tbl" class="table table-bordered table-striped table-hover table-sm table-responsive-md">
        <thead>
            <tr>
                <th scope="col">C&eacutedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Modificar</th>
                <th scope="col">Borrar</th>
            </tr>
        </thead>

    </table>
    <div class="" style="margin-left:50px">
        <span id="result"></span>
    </div>
    <br />
    <br />
    <div style="padding:50px" class="row justify-content-end">
    
     <!--    <a class="btn btn-success" href="?controlador=User&accion=showIndexView">Atrás</a> -->
       <a class="btn btn-success btn-sm" href="?controlador=User&accion=showAdministratorMainView">Atras</a>
    <!--  <a class="dropdown-item" href="?controlador=Index&accion=showSearchProfessionalAdministrator">Atras</a> -->
    </div>
</div>

<?php

include_once 'public/footer.php';
?>
