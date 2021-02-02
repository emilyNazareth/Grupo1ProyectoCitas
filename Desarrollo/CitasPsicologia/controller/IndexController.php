<?php

class IndexController {

    public function __construct() {
        $this->view = new View();
    }

    public function mostrar() {
        $this->view->show("indexView.php", null);
    }

    public function showSearchProfessionalAdministrator() {

        require 'model/UserModel.php';
        $professional = UserModel::singleton();
        $data['professional'] =  $professional->getProfessionals();
        $this->view->show("SearchProfessionalAdministrator.php", $data);
    }
    
    public function showRegisterProfessionalView() {
        $this->view->show("RegisterProfessionalView.php", null);
    }

        public function showMainFunctionaryRegisterAdministrator() {
        $this->view->show("MainFunctionaryRegisterAdministrator.php", null);
    }
        public function showScheduleDatesAdministrator() {
        $this->view->show("ScheduleDatesAdministrator.php", null);
    }
    
            public function showDateConfirmationHome() {
        $this->view->show("DateConfirmationHome.php", null);
    }

}
