<?php

/**
 * 
 */
class AppointmentController {

    public function __construct() {
        $this->view = new View();
    }

    //PROVIDER

    public function showCheckHistory() {
        $this->view->show("checkHistory.php", null);
    }

}
