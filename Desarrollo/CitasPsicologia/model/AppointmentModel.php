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

    //PROVIDER ONE
    public function register_product($name, $price, $description, $quantity, $image) {
        $consulta = $this->db->prepare("call sp_insert_product('" . $name . "', " . $price . ", '" . $description . "'," . $this->providerID . "," . $quantity . ",'" . $image . "')");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function show_all_products() {
        $consulta = $this->db->prepare("call  sp_get_products(" . $this->providerID . ")");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function search_products($name) {
        $consulta = $this->db->prepare("call  sp_search_products_by_name('" . $name . "'," . $this->providerID . ")");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function search_product_by_id($id) {
        $consulta = $this->db->prepare("call sp_search_product_by_id(" . $id . "," . $this->providerID . ")");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function delete_product($id) {
        $consulta = $this->db->prepare("call sp_delete_product_by_id(" . $id . "," . $this->providerID . ")");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function updateProduct($id, $name, $price, $description, $quantity) {
        $consulta = $this->db->prepare("call sp_update_product(" . $id . ", '" . $name . "'," . $price . ", '" . $description . "'," . $quantity . "," . $this->providerID . ")");
        $consulta->execute();
    }

}
?>

