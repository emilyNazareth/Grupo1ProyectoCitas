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

    public function registerAppointment() {
        require 'model/AppointmentModel.php';
        $functionary = AppointmentModel::singleton();
        $functionary->register_functionary(
                $_SESSION['functionary']['identification'], $_SESSION['functionary']['name'], $_SESSION['functionary']['firstLastName'], $_SESSION['functionary']['secondLastName'], $_SESSION['functionary']['personalPhone'], $_SESSION['functionary']['roomPhone'], $_SESSION['functionary']['birthday'], $_SESSION['functionary']['gender'], $_SESSION['functionary']['scholarship'], $_SESSION['functionary']['province'], $_SESSION['functionary']['canton'], $_SESSION['functionary']['district'], $_SESSION['functionary']['civilStatus'], $_SESSION['functionary']['address'], $_SESSION['functionary']['officePhone'], $_SESSION['functionary']['email'], $_SESSION['functionary']['idPlaca'], $_SESSION['functionary']['portingExpirationDate'], $_SESSION['functionary']['place'], $_SESSION['functionary']['area'], $_SESSION['functionary']['office'], $_SESSION['functionary']['dateAdmission']
        );
        //$functionary = AppointmentModel::singleton();
        $functionary->register_appointment(
                /* $_SESSION['functionary']['identification'], 
                  $_POST['date'],
                  $_POST['hour'],
                  $_POST['idProfessional'],
                  $_SESSION['functionary']['name'],
                  $_POST['status'],
                  $_POST['observation'],
                  $_POST['justification'] */
                $_SESSION['functionary']['identification'], "2021-12-06", "9:30pm", "300000888", $_SESSION['functionary']['name'], "pendiente", "test BE emi", "test BE emi"
        );
        echo ('Cita registrada');
    }

    public function showConsultAppointmentAdministratorView() {
        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();
        $appointments['professionals'] = $appointment->get_all_professionals();
        $this->view->show("SearchAppointmentAdministratorView.php", $appointments);
    }

    public function searchAppointment() {
        $resultado = "";
        $resultConsult = $this->getAppointmentsByFilter(
                $_POST['identification'], $_POST['consecutive'], $_POST['initialDate'], $_POST['finalDate'], $_POST['professional'], $_POST['gender']);
        if (empty($resultConsult)) {
            $resultado = '0';
        } else {
            $resultado = $this->createTableAppointments($resultConsult);
        }
        echo $resultado;
    }

    public function getAppointments() {
        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();
        $appointments = $appointment->get_appointments();
        return $appointments;
    }

    public function getAppointmentsByFilter($initialDate, $finalDate, $professional, $consecutive, $identification, $gender) {
        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();
        $appointments = $appointment->get_appointments_by_filter($initialDate, $finalDate, $professional, $consecutive, $identification, $gender);
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

    public function showReportsView() {
        $this->view->show("ReportsView.php", null);
    }

    public function loadDataInGraphReportsView() {
        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();
        $appointmentsQuantity = $appointment->get_appointments_quantity();
        if (empty($appointmentsQuantity[0][0])) {
            $enero = 0;
        } else {
            $enero = $appointmentsQuantity[0][0];
        }
        if (empty($appointmentsQuantity[1][0])) {
            $febrero = 0;
        } else {
            $febrero = $appointmentsQuantity[1][0];
        }
        if (empty($appointmentsQuantity[2][0])) {
            $marzo = 0;
        } else {
            $marzo = $appointmentsQuantity[2][0];
        }
        if (empty($appointmentsQuantity[3][0])) {
            $abril = 0;
        } else {
            $abril = $appointmentsQuantity[3][0];
        }
        if (empty($appointmentsQuantity[4][0])) {
            $mayo = 0;
        } else {
            $mayo = $appointmentsQuantity[4][0];
        }
        if (empty($appointmentsQuantity[5][0])) {
            $junio = 0;
        } else {
            $junio = $appointmentsQuantity[5][0];
        }

        $msj = array(
            'enero' => $appointmentsQuantity[0][0],
            'febrero' => $appointmentsQuantity[1][0],
            'marzo' => $appointmentsQuantity[2][0],
            'abril' => $appointmentsQuantity[3][0],
            'mayo' => $appointmentsQuantity[4][0],
            'junio' => $junio
        );
        echo json_encode($msj);
    }

}
