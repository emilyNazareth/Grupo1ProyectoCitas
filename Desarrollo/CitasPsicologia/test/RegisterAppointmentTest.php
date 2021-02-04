<?php

class RegisterProfessionalTest {

    public function testRegisterProfessionalModel() {
        require 'model/UserModel.php';
        $model = UserModel::singleton();

        // call without parameters
        $resultado = $model->register_professional("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
        echo 'Test: call without parameters -> ';
        print_r($resultado);
//        $resultado1 = $model->register_professional(123400, 123, "Yer", "Leal", "Achí", '25348790', '25678743', '1995-03-30', 'F', 'soltera', 456, 1, 'A', 88888888, 'secundaria', 'psicologa', 'CPH78', 'Cartago', 'Alvarado', 'Pacayas', '800 metros este del BN');
        echo 'Test: call with existing id -> ';
//        print_r($resultado1); // No ingresa usuario con id existente en BD

//      sp_registrar_cita(108490188, '2021-05-01', '10', 304850984, 'test', 'Pendiente', 'ninguna', 'nada');
    }



}
