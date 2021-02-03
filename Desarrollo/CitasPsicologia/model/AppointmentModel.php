<?php

/**
 * 
 */
class AppointmentModel {

    protected $db;
    private static $instance = null;

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

    public function get_appointments() {
        $consulta = $this->db->prepare("CALL  `sp_obtener_citas_admi`();");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();

        return $resultado;
    }

    public function get_appointments_by_filter($identification, $consecutive, $initialDate, $finalDate, $professional, $gender) {
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

    public function get_all_professionals() {
        $consulta = $this->db->prepare("CALL  sp_obtener_todos_los_profesionales()");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

}
?>

