<?php

class DeleteProfessionalTest
{

    public function testDeleteProfessionalModel()
    {
        require 'model/UserModel.php';
        $userModel = UserModel::singleton();

        // call without parameters
        $resultado = $userModel->delete_professional("");
        echo 'Test: call without parameters -> ';
        print_r($resultado); // Don't delete data in BD

        // call with data  
        $resultado = $userModel->delete_professional(308880888);
        echo 'Test: call with valid data -> ';
        print_r($resultado); //delete in DB      
    }
}
