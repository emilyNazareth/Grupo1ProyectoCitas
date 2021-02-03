<?php

/**
 * 
 */
class AppointmentController {

    public function __construct() {
        $this->view = new View();
    }

    public function showCheckHistory() {
        $this->view->show("checkHistoryView.php", null);
    }

    public function showConsultAppointmentAdministratorView() {
        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();       
        $appointments['searchedAppointments'] = $appointment->get_appointments();
        $appointments['professionals'] = $appointment->get_all_professionals();
        $this->view->show("SearchAppointmentAdministratorView.php", $appointments);
    }

    public function searchAppointment() {
        $resultConsult = '';
        $resultado = "";
        if (empty($_POST['initialDate']) and empty($_POST['finalDate']) and
                empty($_POST['professional']) and empty($_POST['consecutive'])
                and empty($_POST['identification']) and empty($_POST['gender'])) {

            $resultConsult = $this->getAppointments();
            $resultado = $this->createTableAppointments($resultConsult);
            echo $resultado;
        } else {
            $resultConsult = $this->getAppointmentsByFilter(
                    $_POST['identification'], $_POST['consecutive'], 
                    $_POST['initialDate'], $_POST['finalDate'], 
                    $_POST['professional'], $_POST['gender']);
            if (empty($resultConsult)) {
                $resultado = '0';
            } else {
                $resultado = $this->createTableAppointments($resultConsult);
                echo $resultado;
            }
        }
    }

    public function getAppointments() {
        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();
        $appointments = $appointment->get_appointments();
        return $appointments;
    }

    public function getAppointmentsByFilter($initialDate, $finalDate, 
            $professional, $consecutive, $identification, $gender) {
        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();
        $appointments = $appointment->get_appointments_by_filter($initialDate, 
                $finalDate, $professional, $consecutive, $identification, 
                $gender);
        return $appointments;
    }

    public function createTableAppointments($appointments) {
        $resultado = '';
        foreach ($appointments as $value) {
            $resultado .= "<tr>";
            $resultado .= '<td>' . $value[0] . '</td>';
            $resultado .= '<td>' . $value[1] . '</td>';
            $resultado .= '<td>' . $value[2] . '</td>';
            $resultado .= '<td>' . $value[3] . '</td>';
            $resultado .= '<td>' . $value[4] . '</td>';
            $resultado .= '<td>' . $value[5] . '</td>';
            $resultado .= '<td>' . $value[6] . '</td>';
            $resultado .= '<td>' . $value[7] . '</td>';
            $resultado .= '<td><a class=" btn btn-success btn-sm" onclick="modifyProfessionalUrl(' . $value[0] . ')">Ver Detalle</a></td>';
            $resultado .= '<td><a class=" btn btn-success btn-sm" onclick="modifyProfessionalUrl(' . $value[0] . ')">Modificar</a></td>';
            $resultado .= '<td>
                    <button onclick="deleteProfessional(' . $value[0] . ')" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelModal">
                        Eliminar
                    </button></td>';
            $resultado .= "</tr>";
        }
        return $resultado;
    }

}
