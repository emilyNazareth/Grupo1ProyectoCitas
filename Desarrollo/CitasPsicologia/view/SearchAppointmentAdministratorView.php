<?php
include 'public/header.php';
?>

<center>
    <h3 class="titles">Citas</h3>
    <p class="titles"> Seleccione el tipo de b&uacutesqueda</p>
</center>

<div class="container text-left">
    <div class="row">
        <div class="col-sm-6" style="margin-top: 50px">
            <!--FECHA INICIAL-->
            <div class="form-group row scheduleDatesFilter">
                <label class="col-sm-4 control-label small offset-sm-2" style="color: black" for="initialDate">Fecha inicial</label>
                <input type="date" class="col-sm-4 form-control form-control-sm" id="initialDate" name="initialDate" onchange='alertInputInicialDate()' />
            </div>
            
            <!--IDENTIFICACION-->
            <div class="form-group row scheduleDatesFilter">
                <label class="col-sm-4 control-label small offset-sm-2" style="color: black" for="identification">C&eacutedula</label>
                <input onkeypress="return onlyNumbers(event)" type="text" class="col-sm-4 form-control form-control-sm"  id="identification" name="identification" maxlength="9" />
            </div>
            
            <!--SEXO-->
            <div class="form-group row scheduleDatesFilter">
                <label class="col-sm-4 control-label small offset-sm-2" style="color: black" for="gender">Sexo</label>
                <select class="col-sm-4 custom-select custom-select-sm"  id="gender" name="gender">
                    <option value="">Seleccione una opción</option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                </select>
            </div> 
        </div>
        
        
        <div class="col-sm-6" style="margin-top: 50px">
            
            <!--FECHA FINAL-->
            <div class="form-group row scheduleDatesFilter">

                <label class="col-sm-4 control-label small offset-sm-1" style="color: black" for="finalDate">Fecha Final</label>
                <input type="date" class="col-sm-4 form-control form-control-sm" id="finalDate" name="finalDate" disabled="true" onchange='alertInputFinalDate()' />
            </div>
            
            <!--PROFESIONAL-->
            <div class="form-group row scheduleDatesFilter">
                <label class="col-sm-4 control-label small offset-sm-1" style="color: black" for="professional">Profesional</label>
                <select  class="col-sm-4 custom-select custom-select-sm" name= "professional" id="professional">
                    <option value="">Seleccione una opción</option>
                    <?php
                    foreach ($vars['professionals'] as $res) {
                        ?>
                        <option value="<?php echo $res['cedula']; ?>"><?php echo $res['nombre']; ?></option> 
                        <?php
                    }
                    ?>
                </select>  
            </div>
            
            <!--CONSECUTIVO-->
            <div class="form-group row scheduleDatesFilter">
                <label class="col-sm-4 control-label small offset-sm-1" style="color: black" for="consecutive">Consecutivo</label>
                <input type="number" class="col-sm-4 form-control form-control-sm" id="consecutive" name="consecutive" />
            </div>
            
        </div>
        
    </div>

</div>

<div class="row">  

    <div class="col-sm " style="margin-top: 2em">
        
        <!--BT BUSCAR-->
        <input type="button" onclick="searchAppointmentByFilter($('#identification').val(), $('#consecutive').val(),
            $('#initialDate').val(), $('#finalDate').val(), $('#professional').val(), $('#gender').val())" class="btn btn-success btn-sm" id="btn-accept" value="Buscar"/>       
    
        <!--BT CANCELAR-->
        <button type="button" onclick="cleanFormConsultAppointment()" class="btn btn-success btn-sm" id="btn-cancel">Cancelar</button>

    </div>

</div>

<div class="row d-flex justify-content-center">
    <table id="tableID" class="table table-bordered table-striped table-hover table-sm table-responsive-md" style="margin: 2em">
    <thead>
        <tr>
            <th scope="col">Consecutivo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Primer Apellido</th>
            <th scope="col">Segundo Apellido</th>
            <th scope="col">Cédula</th>
            <th scope="col">Psicólogo</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Ver Detalle</th>           
            <th scope="col">Modificar</th>            
            <th scope="col">Cancelar</th>
        </tr>
    </thead>
    <tbody id="tbody">
        <?php
        foreach ($vars['searchedAppointments'] as $item) {
            ?>
            <tr>
                <td><?php echo $item['pk_id_cita']; ?></td>
                <td><?php echo $item['tc_nombre']; ?></td>
                <td><?php echo $item['tc_primer_apellido']; ?></td>
                <td><?php echo $item['tc_segundo_apellido']; ?></td>
                <td><?php echo $item['pk_cedula_usuario']; ?></td>
                <td><?php echo $item['fk_id_profesional']; ?></td>
                <td><?php echo $item['tf_fecha']; ?></td>
                <td><?php echo $item['tc_hora']; ?></td>  
                <td><a class=" btn btn-success btn-sm" onclick="modifyProfessionalUrl(<?php echo $item['pk_id_cita']; ?>)">Ver Detalle</a></td>
                <td><a class=" btn btn-success btn-sm" onclick="modifyProfessionalUrl(<?php echo $item['pk_id_cita']; ?>)">Modificar</a></td>
                <td>
                    <button onclick="deleteProfessional(<?php echo $item['pk_id_cita']; ?>)" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelModal">
                        Eliminar
                    </button>
                </td>         
            </tr>

            <?php
        }
        ?>
    </tbody>
</table>
</div>

<div class="" style="margin-left:50px">
    <span id="result"></span>
</div>

<!--BT ATRAS-->
<div class = "col-sm-6">
    <a class = "btn btn-success btn-sm" href = "?controlador=User&accion=showAdministratorMainView">Atr&aacute;s</a>
</div>

<script src="public/js/Site.js" type="text/javascript"></script>

<?php
include_once 'public/footer.php';
?>