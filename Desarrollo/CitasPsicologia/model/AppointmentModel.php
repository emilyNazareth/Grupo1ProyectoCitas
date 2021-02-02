<?php

/**
 * 
 */
class AppointmentModel {

    protected $db;
    private static $instance = null;
    protected $providerID = null;

    // constructor
    private function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
        $this->providerID = 1;
    }

    public static function singleton() {
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
        $status,
        $observation,
        $justification
    ) {
        $consulta = $this->db->prepare("call sp_registrar_cita("
            . $idFunctionary . ",'" . $date . "','" . $hour . "','" .
            $idProfessional . "','" . $patient . "','" .
            $status . "','" . $observation . "','"  . $justification . "')");
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
        $place . "','" . $area . "','" . $office . "','". $dateAdmission . "')");
    
    $consulta->execute();
    $resultado = $consulta->fetchAll();
    $consulta->closeCursor();
    return $resultado;
}

}
