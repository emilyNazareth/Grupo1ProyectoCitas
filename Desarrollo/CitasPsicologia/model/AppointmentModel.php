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

}
?>

