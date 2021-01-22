<?php

/**
 * 
 */
class UserModel {

    protected $db;
    private static $instance = null;
    protected $providerID = null;

    // constructor
    private function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public static function singleton() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    //login
    public function loginCheck($identification, $password) {


        $consulta = $this->db->prepare("CALL  `sp_obtener_usuario`('" . $identification . "');");
        $consulta->execute();
        $resultado['users'] = $consulta->fetchAll();
        $consulta->closeCursor();

        $idRol = false;
        foreach ($resultado['users'] as $item) {
            if ($item['tc_contrasena'] == $password) {
                $idRol = $item['pk_id_rol'];
                break;
            }
        }
        return $idRol;
    }

    public function register_professional($identification, $password, $name, $firstLastName, $secondLastName, $personalPhone, $roomPhone, $birthday, $gender, $civilStatus, $placeNumber, $status, $emergencyContactName, $emergencyContactNumber, $scholarship, $specialty, $schoolCode, $province, $canton, $district, $address) {
        $consulta = $this->db->prepare("call sp_registrar_profesional("
                . $identification . "," . $password . ",'" . $name . "','" .
                $firstLastName . "','" . $secondLastName . "','" . $personalPhone .
                "','" . $roomPhone . "','" . $birthday . "','" . $gender . "','" .
                $civilStatus . "'," . $placeNumber . "," . $status . ",'" .
                $emergencyContactName . "'," . $emergencyContactNumber . ",'" .
                $scholarship . "','" . $specialty . "','" . $schoolCode . "','" .
                $province . "','" . $canton . "','" . $district . "','" . $address
                . "')");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function show_all_products() {

        $consulta = $this->db->prepare("call sp_obtener_roles");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

}
?>

