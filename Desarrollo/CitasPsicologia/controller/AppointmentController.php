<?php

/**
 * 
 */
class AppointmentController
{

    public function __construct()
    {
        $this->view = new View();
    }

    //PROVIDER

    public function showCheckHistory()
    {
        $this->view->show("checkHistoryView.php", null);
    }
    public function registerAppointment()
    {
        require 'model/AppointmentModel.php';
        $functionary = AppointmentModel::singleton();
        $functionary->register_functionary(
            $_SESSION['functionary']['identification'],
            $_SESSION['functionary']['name'],
            $_SESSION['functionary']['firstLastName'],
            $_SESSION['functionary']['secondLastName'],
            $_SESSION['functionary']['personalPhone'],
            $_SESSION['functionary']['roomPhone'],
            $_SESSION['functionary']['birthday'],
            $_SESSION['functionary']['gender'],
            $_SESSION['functionary']['scholarship'],
            $_SESSION['functionary']['province'],
            $_SESSION['functionary']['canton'],
            $_SESSION['functionary']['district'],
            $_SESSION['functionary']['civilStatus'],
            $_SESSION['functionary']['address'],
            $_SESSION['functionary']['officePhone'],
            $_SESSION['functionary']['email'],
            $_SESSION['functionary']['idPlaca'],
            $_SESSION['functionary']['portingExpirationDate'],
            $_SESSION['functionary']['place'],
            $_SESSION['functionary']['area'],
            $_SESSION['functionary']['office'],
            $_SESSION['functionary']['dateAdmission']
        );

        //$functionary = AppointmentModel::singleton();
        $functionary->register_appointment(
            /*$_SESSION['functionary']['identification'], 
            $_POST['date'],
            $_POST['hour'],
            $_POST['idProfessional'],
            $_SESSION['functionary']['name'],
            $_POST['status'],
            $_POST['observation'],
            $_POST['justification']*/
            $_SESSION['functionary']['identification'],
            "2021-12-06",
            "2:30pm",
            "300000888",
            $_SESSION['functionary']['name'],
            "pendiente",
            "abc",
            "jus"


        );
        echo ('Cita registrada');
    }
}
