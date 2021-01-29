<?php
include 'public/header.php';
?>

<center>
    <br>
    <h3 class="titles">Profesional</h3>
</center>

<center>

    <font color="Black">

    <form id="login-form">
        <div class="form-group row">
            <label for="identificationInput" class="col-sm-7 col-form-label-sm">C&eacutedula</label>
            <input type="text" onkeypress="return onlyNumbers(event)" minlength="9" maxlength="9" placeholder="#0###0###" pattern="\w\d\w \d\w\d" name="id" id="id" class="col-sm-5 form-control form-control-sm">
        </div>

        <div class="form-group row">
            <label for="nameInput" class="col-sm-7 col-form-label-sm">Nombre</label>
            <input onkeypress="return soloLetras(event)" type="text" name="nameInput" id="name" class="col-sm-5 form-control form-control-sm">
        </div>
        <div class="form-group row">
            <label for="lastnameInput" class="col-sm-7 col-form-label-sm">Apellidos</label>
            <input onkeypress="return soloLetras(event)" type="text" name="lastnameInput" id="lastname" class="col-sm-5 form-control form-control-sm">
        </div>
        <div>
            <a class="btn btn-success btn-sm" id="consultDate" onclick="searchProfessional()" name="consultDate">Buscar</a>
        </div>
        <br>


    </form>
    <div class="alert-danger justify-content-end">
        <span id="message" style="color:black;"></span>
    </div>
</center>
<br />
<div class="row condultFunctionaryTable">
    <span id="messageSpanId"></span>


    <table id="tbl" class="table table-bordered table-striped table-hover table-sm table-responsive-md">
        <thead>
            <tr>
                <th scope="col">C&eacutedula <i class="fas fa-id-card"></i> </th>
                <th scope="col">Nombre <i class="fas fa-id-badge"></i> </th>
                <th scope="col">Apellidos <i class="far fa-id-badge"></i></i></th>
                <th scope="col">Modificar <i class="fas fa-edit"></i> </th>
                <th scope="col">Borrar <i class="fas fa-trash-alt"></i> </th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?php
            if (empty($vars['professional'])) {
                ?>

                <?php
            } else {
                foreach ($vars['professional'] as $item) {
                    ?>
                    <tr>
                        <td><?php echo $item['cedula']; ?></td>
                        <td><?php echo $item['nombre']; ?></td>
                        <td><?php echo $item['apellido']; ?></td>
                        <td><a class=" btn btn-success btn-sm" onclick="modifyProffesional(<?php echo $item['cedula']; ?>)">Modificar</a></td>
                        <td>
                            <button onclick="deleteProfessional(<?php echo $item['cedula']; ?>)" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelModal">
                                Eliminar
                            </button>
                        </td>
                    </tr>

                    <?php
                }
            }
            ?>


        </tbody>
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
<script src="public/js/Site.js" type="text/javascript"></script>
<script>
                        function searchProfessional() {
                            var letters = /^[A-Za-z+À-ú\s]+$/;

                            $("#message").html("");
                            var cedula = $('#id').val();
                            var nombre = $('#name').val()
                            var apellido = $('#lastname').val()
                            if (!nombre) {
                                nombre = "";
                            }
                            if (!cedula) {
                                cedula = -1;
                            }
                            if (!apellido) {
                                apellido = "";
                            }

                            if (nombre == "" && cedula == -1 && apellido == "") {
                                $.ajax({
                                    url: '?controlador=User&accion=showSearchProfessionalAdministrator',
                                    success: function (response) {
                                        var data = response;

                                        if (data == 0) {
                                            $("#message").html("*No se encontraron registros");
                                        } else {
                                            $("#tbody").html(data);
                                        }


                                    }
                                });
                                return;
                            }
                            ;

                            if (nombre != "") {
                                if (nombre.match(letters) == null) {
                                    $("#message").html("*El campo Nombre es inválido");
                                    ;
                                    return;
                                }
                                ;
                            }
                            ;

                            if (apellido != "") {
                                if (apellido.match(letters) == null) {
                                    $("#message").html("*El campo Apellidos es inválido");
                                    return;
                                }
                                ;
                            }
                            ;
                            if (cedula != -1) {
                                var cedulaAux = '';
                                cedulaAux = cedula.toString();
                                if (cedulaAux.length < 9 || cedulaAux.length > 9) {
                                    $("#message").html("*El campo Cédula debe se de nueve caractéres");
                                    return;
                                }
                                ;
                                if (cedula < 0) {
                                    $("#message").html("*El campo Cédula es inválido");
                                    return;
                                }
                                ;
                            }
                            ;

                            var parameters = {
                                "cedula": cedula,
                                "nombre": nombre,
                                "apellido": apellido
                            };
                            console.log(parameters);
                            $.ajax({
                                data: parameters,
                                url: '?controlador=User&accion=searchProfessional',
                                type: 'post',
                                success: function (response) {
                                    var data = response;

                                    if (data == 0) {
                                        $("#message").html("*No se encontraron registros");
                                    } else {
                                        $("#tbody").html(data);
                                    }




                                }
                            });
                        }
</script>

<?php
include_once 'public/footer.php';
?>