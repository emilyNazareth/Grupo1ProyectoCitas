<div class="modal fade" id="cancelAppointmentModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
          <h5 class="modal-title w-100 text-danger" id="cancelAppointmentModal"><strong>Cancelar cita</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--BODY-->
      <div class="modal-body">
        <form>
            <input type="hidden" id="id" name="id" value="appointment-id">
          <div class="form-group">
            <label id="justificationModal" for="justification" class="col-form-label w-100 text-left font-weight-bold">Justificación:</label>
            <textarea class="form-control" id="justification"></textarea>
          </div>
        </form>
          <label class="alert alert-danger" id="messageModal" style="display: none" role="alert">Debe justificar el porqué está cancelando su cita</label>
      </div>
      <div class="modal-footer">
          <button id="btn-confirmar-modal" type="button" class="btn btn-danger" onclick="validateModal()">Confirmar</button>
      </div>
    </div>
  </div>
</div>

<script>
function validateModal(){
    if($("#justification").val() == ""){
        $("#messageModal").css("display", "inline-block");
    }else{
        var parametros = { "id": $("#id").val(), "justification" :$("#justification").val() };
        $.ajax({
        data: parametros,
        url: '?controlador=Appointment&accion=cancelAppointment',
        type: 'post',
        beforeSend: function() {
            $("#cancelAppointmentModal").modal("hide");
        },
        success: function(response) {
            $("#resultado").html("<div class='alert alert-success'>" + response + "</div>");
            $("#btn-accept").click(); 
        },
        error: function(e) {
            $("#message").html("<div class='alert alert-danger'>" + e + "</div>");
        }
        });
    }
}
</script>