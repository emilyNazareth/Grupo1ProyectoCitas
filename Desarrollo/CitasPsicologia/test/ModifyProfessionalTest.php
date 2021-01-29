<?php

class RegisterProfessionalTest {

    public function testModifyProfessionalModel() {
        require 'model/UserModel.php';
        $userModel = UserModel::singleton();

        // call without parameters
        $resultado = $userModel->update_professional("", "", "", "", "", "", "",
                "", "", "", "", "", "", "", "", "", "");
        echo 'Test: call without parameters -> ';
        print_r($resultado); // Don't save data in BD
        
        // call with data  
        $resultado = $userModel->update_professional(301110456, 
                'Emily modify', 'Melendez', 'Castro', '25348790', '25678743', 
                'Divorciada', 1, 'Secundaria', 'Cartago', 'Alvarado', 'Pacayas',
                '800 metros este del BN');
        echo 'Test: call with valid data -> ';
        print_r($resultado); //save in DB      
    }

}
