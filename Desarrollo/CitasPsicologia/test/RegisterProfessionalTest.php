<?php

include 'controller/UserController.php';
include 'model/UserModel.php';

 class RegisterProfessionalTest{

    public function testRegisterProfessionalModel(){
        $model=UserModel::singleton();

        // call without parameters
        $resultado=$model->register_professional("", "", "", "", "", "", "", "", 
                "", "", "", "", "", "", "", "", "", "", "", "", "");
        echo 'Test: call without parameters -> ';
        print_r($resultado);
    }

 }