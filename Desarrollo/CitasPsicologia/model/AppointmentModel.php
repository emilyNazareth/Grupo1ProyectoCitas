<?php

/**
 * 
 */
class AppointmentModel
{

    protected $db;
    private static $instance = null;

    // constructor
    private function __construct()
    {
        include_once __DIR__ . '/../libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public static function singleton()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function register_appointment(

        $idFunctionary,
        $date,
        $hour,
        $idProfessional,
        $patient,
        $observation

    ) {
        $consulta = $this->db->prepare("call sp_registrar_cita("
            . $idFunctionary . ",'" . $date . "','" . $hour . "'," .
            $idProfessional . ",'" . $patient . "','" .
            $observation . "')");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        print_r($consulta);
        return $resultado;
    }

    public function register_functionary(

        $identification,
        $name,
        $firstLastName,
        $secondLastName,
        $personalPhone,
        $roomPhone,
        $birthday,
        $gender,
        $scholarship,
        $province,
        $canton,
        $district,
        $civilStatus,
        $address,
        $officePhone,
        $email,
        $idPlaca,
        $portingExpirationDate,
        $place,
        $area,
        $office,
        $dateAdmission

    ) {
        $consulta = $this->db->prepare("call sp_registrar_funcionario("
            . $identification . ",'" . $name . "','" . $firstLastName . "','" .
            $secondLastName . "','" . $personalPhone . "','" .
            $roomPhone . "','" . $birthday . "','" . $gender . "','"
            . $scholarship . "','" . $province . "','" . $canton . "','" .
            $district . "','" . $civilStatus . "','" .
            $address . "','" . $officePhone . "','" .
            $email . "','" . $idPlaca . "','" . $portingExpirationDate . "','" .
            $place . "','" . $area . "','" . $office . "','" . $dateAdmission . "')");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function get_appointments()
    {
        $consulta = $this->db->prepare("CALL  `sp_obtener_citas_admi`();");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();

        return $resultado;
    }

    public function get_appointments_by_filter($identification, $consecutive, $initialDate, $finalDate, $professional, $gender)
    {
        $consulta = $this->db->prepare("call "
            . "sp_buscar_cita_para_funcionario_admi('"
            . $identification . "','" . $consecutive . "','" . $initialDate .
            "','" . $finalDate . "','" . $professional . "','" .
            $gender . "')");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();

        return $resultado;
    }
    public function get_appointments_by_filter_professional($identification, $consecutive, $initialDate, $finalDate, $professional, $gender)
    {
        $consulta = $this->db->prepare("call "
            . "sp_buscar_cita_para_profesional('"
            . $identification . "','" . $consecutive . "','" . $initialDate .
            "','" . $finalDate . "','" . $professional . "','" .
            $gender . "')");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();

        return $resultado;
    }
    public function get_all_professionals()
    {
        $consulta = $this->db->prepare("CALL  sp_obtener_todos_los_profesionales()");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function get_appointments_quantity()
    {
        $consulta = $this->db->prepare("CALL  sp_obtener_catidad_de_citas_por_mes()");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function get_appointments_quantity_week()
    {

        $consulta = $this->db->prepare("CALL  sp_obtener_cantidad_de_citas_por_semana()");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }


    public function get_appointments_by_id($id)
    {

        $consulta = $this->db->prepare("CALL  sp_buscar_cita_por_id(" . $id . ")");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function modify_appointment(
        $id_appointment,
        $id_professional,
        $date,
        $hour,
        $observations
    ) {
        $consulta = $this->db->prepare("CALL  sp_modificar_cita("
            . $id_appointment .
            "," . $id_professional . ",'" . $date . "'," .
            "'" . $hour . "','" . $observations . "')");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }


    public function get_appointment_by_id_and_identification($id_apointment,
            $identification) {
        $consulta = $this->db->prepare("CALL  sp_buscar_cita_por_id_cedula(" 
                . $id_apointment . "," . $identification . ")");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
    
     public function get_appointment_detail($id_apointment) {
        $consulta = $this->db->prepare("CALL  sp_obtener_detalle_cita(" 
                . $id_apointment . ")");
            $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }


    public function cancelAppointmentById(
        $id_appointment,
        $justification
    ) {
        $consulta = $this->db->prepare("CALL  sp_cancelar_cita("
            . $id_appointment .
            ",'" . $justification . "')");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

}
