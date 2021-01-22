<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 */
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

}
