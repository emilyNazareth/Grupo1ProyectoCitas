<?php

/* 

@*@{
    ViewData["Title"] = "AppointmentDetail";
}*@

@model  CitasSAPSO.Models.AppointmentModels
<h3 class="text-center text-info titles">Detalles de la cita</h3>
                       
<form>
    <div class="row align-items-start">
        @if (ViewBag.appointment != null)
        {
            foreach (CitasSAPSO.Models.AppointmentModels appointment in ViewBag.appointment)
            {
                <div class="col">
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="consecutive">Consecutivo:</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.Id" type="number" readonly id="consecutive" name="consecutive">
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="identification">Numero de identificacion:</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.Functionary.Cedula" type="text" readonly id="cedula" name="cedula">
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="name">Nombre:</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.Functionary.Name" type="text" readonly id="identification" name="name">
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="firstLastName">Primer Apellido:</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.Functionary.FirstLastName" type="text" readonly id="firstLastName" name="firstLastName">
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="secondLastName">Segundo Apellido:</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.Functionary.SecondLastName" type="text" readonly id="secondLastName" name="secondLastName">
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="gender">Sexo</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.Functionary.Gender" type="text" readonly id="gender" name="gender">
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="place">Puesto</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.Functionary.NamePlace" type="text" readonly id="place" name="place">
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="area">Área</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.Functionary.NameArea" type="text" readonly id="area" name="area">
                    </div>

                </div>

                <div class="col">
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="office">Oficina</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.Functionary.NameOffice" type="text" readonly id="office" name="office">
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="phone">Teléfono</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.Functionary.PersonalPhone" type="text" readonly id="phone" name="phone">
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="email">Correo electrónico:</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.Functionary.Mail" type="text" readonly id="mail" name="mail">
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="date">Fecha de cita:</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.Date" type="text" readonly id="date" name="date">
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="hour">Hora:</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.Hour" type="text" readonly id="hour" name="hour">
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="registerDate">Fecha de registro:</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.Date" type="text" readonly id="registerDate" name="registerDate">
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="psychologist">Psicólogo asignado:</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.Professional.Name" type="text" readonly id="psychologist" name="psychologist">
                    </div>
                    <div class="row functionary-register">
                        <label class="col-sm-6 control-label small" for="activity">Actividad:</label>
                        <input class="col-sm-4 form-control form-control-sm" value="@appointment.State" type="text" readonly id="activity" name="activity">
                    </div>
                </div>
            }
        }              
    
    </div>
</form>
<a class="btn btn-success btn-sm" href="javascript:history.back()">Atrás</a>



            

 */

