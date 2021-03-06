<?php

/**
 * 
 */
//test
class AppointmentController
{
//testNomerge.
    public function __construct()
    {
        $this->view = new View();
    }

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
            $_SESSION['functionary']['identification'],
            $_POST['date'],
            $_POST['hour'],
            $_POST['idProfessional'],
            $_SESSION['functionary']['name'],
            $_POST['observation']
            /* $_SESSION['functionary']['identification'],
                  "2021-12-06",
                  "2:30pm",
                  "300000888",
                  $_SESSION['functionary']['name'],
                  "pendiente",
                  "abc",
                  "jus" */
        );
        //  echo ($_SESSION['functionary']['identification']);
        echo ('Cita registrada');
    }

    public function showConsultAppointmentAdministratorView()
    {
        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();
        $appointments['professionals'] = $appointment->get_all_professionals();
        $this->view->show("SearchAppointmentAdministratorView.php", $appointments);
    }

    public function searchAppointment()
    {
        $resultado = "";
        $resultConsult = $this->getAppointmentsByFilter(
            $_POST['identification'],
            $_POST['consecutive'],
            $_POST['initialDate'],
            $_POST['finalDate'],
            $_POST['professional'],
            $_POST['gender']
        );
        if (empty($resultConsult)) {
            $resultado = '0';
        } else {
            $resultado = $this->createTableAppointments($resultConsult);
        }
        echo $resultado;
    }

    public function getAppointments()
    {
        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();
        $appointments = $appointment->get_appointments();
        return $appointments;
    }

    public function getAppointmentsByFilter($initialDate, $finalDate, $professional, $consecutive, $identification, $gender)
    {
        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();
        $appointments = $appointment->get_appointments_by_filter($initialDate, $finalDate, $professional, $consecutive, $identification, $gender);
        return $appointments;
    }

    public function getAppointmentsByFilterProfessional()
    {
        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();
        $resultado = "";
        $appointments = $appointment->get_appointments_by_filter_professional(
            $_POST['identification'],
            $_POST['consecutive'],
            $_POST['initialDate'],
            $_POST['finalDate'],
            $_SESSION['userProfessional'][0],
            $_POST['gender']
        );
        if (empty($appointments)) {
            $resultado = '0';
        } else {
            $resultado = $this->createTableAppointmentFunctionary($appointments);
        }
        echo $resultado;
    }

    public function createTableAppointments($appointments)
    {
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
            $resultado .= '<td><a class="btn btn-success btn-sm" href = "?controlador=Appointment&accion=showAppointmentDetailView&id_cita=' . $value[0] . '">Ver Detalle</a>';
            $resultado .= '<td><a class=" btn btn-success btn-sm" onclick="modifyAppointment(' . $value[0] . ')">Modificar</a></td>';
            $resultado .= '<td>
                    <button onclick="cancelAppointment(' . $value[0] . ')" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelModal">
                        Cancelar
                    </button></td>';
            $resultado .= "</tr>";
        }
        return $resultado;
    }

    public function showReportsView()
    {
        $this->view->show("ReportsView.php", null);
    }

    public function loadDataInGraphReportsView()
    {

        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();
        $appointmentsQuantity = $appointment->get_appointments_quantity();
        $enero = 0;
        $febrero = 0;
        $marzo = 0;
        $abril = 0;
        $mayo = 0;
        $junio = 0;

        foreach ($appointmentsQuantity as $value) {
            if ($value['mes'] == 'January') {
                $enero =  $value['cantidad'];
            }
            if ($value['mes'] == 'February') {
                $febrero =  $value['cantidad'];
            }
            if ($value['mes'] == 'March') {
                $marzo =  $value['cantidad'];
            }
            if ($value['mes'] == 'April') {
                $abril =  $value['cantidad'];
            }
            if ($value['mes'] == 'May') {
                $mayo =  $value['cantidad'];
            }
            if ($value['mes'] == 'June') {
                $junio =  $value['cantidad'];
            }
        }
        $msj = array(
            'enero' => $enero,
            'febrero' => $febrero,
            'marzo' => $marzo,
            'abril' => $abril,
            'mayo' => $mayo,
            'junio' => $junio
        );
        echo json_encode($msj);
    }

    public function loadDataInGraphReportsViewTwo()
    {
        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();
        $appointmentsQuantity = $appointment->get_appointments_quantity_week();
        $monday = 0;
        $tuesday = 0;
        $wednesday = 0;
        $thursday = 0;
        $friday = 0;
        $saturday = 0;
        foreach ($appointmentsQuantity as $value) {

            if ($value['dia'] == 'Monday') {
                $monday = $value['cantidad'];
            }
            if ($value['dia'] == 'Tuesday') {
                $tuesday = $value['cantidad'];
            }
            if ($value['dia'] == 'Wednesday') {
                $wednesday = $value['cantidad'];
            }
            if ($value['dia'] == 'Thursday') {
                $thursday = $value['cantidad'];
            }
            if ($value['dia'] == 'Friday') {
                $friday = $value['cantidad'];
            }
            if ($value['dia'] == 'Saturday') {
                $saturday = $value['cantidad'];
            }
        }

        $msj = array(
            'lunes' => $monday,
            'martes' => $tuesday,
            'miercoles' => $wednesday,
            'jueves' => $thursday,
            'viernes' => $friday,
            'sabado' => $saturday
        );
        echo json_encode($msj);
    }

    public function showAppointmentDetail()
    {
        $consecutivo = $_GET["consecutivo"];

        $this->view->show("AppointmentDetailView.php", null);
    }

    public function showModifyAppointmentView()
    {
        require 'model/AppointmentModel.php';
        $appointmentModel = AppointmentModel::singleton();
        $consecutivo = $_GET["id_cita"];
        $appointments['appointment'] = $appointmentModel->get_appointments_by_id($consecutivo);
        foreach ($appointments['appointment'] as $res) {
            if (empty($res['tc_observaciones'])) {
                $res['tc_observaciones'] = '';
            }
        }
        $appointments['professionals'] = $appointmentModel->get_all_professionals();
        $this->view->show("ModifyAppointment.php", $appointments);
    }

    public function modifyAppointment()
    {

        require 'model/AppointmentModel.php';
        $appointmentModel = AppointmentModel::singleton();
        $appointment = $appointmentModel->modify_appointment(
            $_POST['id_appointment'],
            $_POST['id_professional'],
            $_POST['date'],
            $_POST['hour'],
            $_POST['observations']
        );
        echo "La cita ha sido modificada";
    }

    public function createTableAppointmentFunctionary($appointments)
    {
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
            $resultado .= '<td><a class="btn btn-success btn-sm" href = "?controlador=Appointment&accion=showAppointmentDetailView&id_cita=' . $value[0] . '">Ver Detalle</a>';
            $resultado .= '<td><a class=" btn btn-success btn-sm" onclick="cancelAppointment(' . $value[0] . ')">Cancelar</a></td>';
            $resultado .= "</tr>";
        }
        $_SESSION['consecutiveDetailView'] = $appointments[0][0];
        return $resultado;
    }

    public function searchAppointmentByIdAndIdentification()
    {
        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();
        $resultado = "";
        $resultConsult = $appointment->get_appointment_by_id_and_identification(
            $_POST['consecutive'],
            $_POST['identification']
        );
        if (empty($resultConsult)) {
            $resultado = '0';
        } else {
            $resultado = $this->createTableAppointmentFunctionary($resultConsult);
        }
        echo $resultado;
    }

    public function showAppointmentDetailView()
    {
        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();
        $consecutivo = $_GET["id_cita"];
        $appointmentDetail['appointment'] = $appointment->get_appointment_detail($consecutivo);
        $this->view->show("AppointmentDetailView.php", $appointmentDetail);
    }

    public function showCancelAppointmentModal()
    {
        $modal = file_get_contents("view/CancelAppointmentModal.php");
        echo str_replace("appointment-id", $_POST["appointment"], $modal);
    }

    public function cancelAppointment()
    {
        require 'model/AppointmentModel.php';
        $appointment = AppointmentModel::singleton();
        $result = $appointment->cancelAppointmentById(
            $_POST["id"],
            $_POST["justification"]
        );
        echo 'Cita cancelada';
    }

    public function registerAppointmentFunctionary()
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
        $functionary->register_appointment(
            $_SESSION['functionary']['identification'],
            $_POST['date'],
            $_POST['hour'],
            $_POST['idProfessional'],
            $_SESSION['functionary']['name'],
            $_POST['observation']
        );
        echo ('Cita registrada');
    }

    public function showMainFunctionaryRegister()
    {
        $this->view->show("MainFunctionaryRegister.php", null);
    }

    public function showDateConfirmationFunctionary()
    {
        $this->view->show("DateConfirmationFunctionary.php", null);
    }
}
