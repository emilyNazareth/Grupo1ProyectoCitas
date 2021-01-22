<?php

class IndexController {

    public function __construct() {
        $this->view = new View();
    }

    public function mostrar() {
        $this->view->show("indexView.php", null);
    }

    public function showSearchProfessionalAdministrator() {
        $this->view->show("SearchProfessionalAdministrator.php", null);
    }
    
    public function showRegisterProfessionalView() {
        $this->view->show("RegisterProfessionalView.php", null);
    }

}
