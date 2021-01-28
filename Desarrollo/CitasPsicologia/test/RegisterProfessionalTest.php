<?php

 class RegisterProfessionalTest{

    public function testRegisterProfessionalModel(){
        require 'model/UserModel.php';
        $model=UserModel::singleton();

        // call without parameters
        $resultado=$model->register_professional("", "", "", "", "", "", "", "", 
                "", "", "", "", "", "", "", "", "", "", "", "", "");
        echo 'Test: call without parameters -> ';
        print_r($resultado); // no ingresa registro vacio en la BD
        
        // call with existing id
        $resultado1=$model->register_professional(123400,
                                                  123, 
                                                  "Yer", 
                                                  "Leal",
                                                  "Achí", 
                                                  '25348790',
                                                  '25678743', '1995-03-30', 'F',
                                                        'soltera', 456,
                                                        1, 'A',
                                                        88888888, 'secundaria',
                                                        'psicologa', 'CPH78',
                                                        'Cartago', 'Alvarado', 'Pacayas',
                                                        '800 metros este del BN');
        echo 'Test: call with existing id -> ';
        print_r($resultado1); // No ingresa usuario con id existente en BD
        
        /* Se realizaron pruebas a nivel de interfaz donde desde el controlador se recibe un mensaje del 
         * estado de la insercion*/
    }
    
    public function testDeleteProfessionalModel() {
        require 'controller/UserController.php';
        $con= new UserController();
        $con->deleteProfessional();
    }

        public function testUpdateProfessionalModel() {
            require 'controller/UserController.php';
        $con= new UserController();
        $con->updateProfessional();

    }

 }