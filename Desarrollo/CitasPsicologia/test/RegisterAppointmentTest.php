<?php

include 'controller/UserController.php';
include  'model/AppointmentModel.php';

class RegisterAppointmentTest {

    public function testRegisterAppointmentModel() {       
        $model = AppointmentModel::singleton();

        $resultado =  $model->register_appointment( 302900456, "2021-12-06", 
                "9:30pm", "300000888", 'Test mismo cedu', "pendiente", 
                "test BE emi", "test BE emi");            
        print_r($resultado);
    }

    public function testRegisterFunctionaryModel() {
        $model = AppointmentModel::singleton();
        $resultado = $model->register_functionary(
                302900456, 'Test mismo cedu', "Ramirez", "Alvarado",
                "85858585", "89898989", "1999-12-06", 'M', "Tecnico",
                "Cartago", "Turri", "La Suiza", "Viudo(a)", "absd", "87878787",
                "beto@gmail.com", "321", "2022-12-06", "nada", "robos",
                "central", "2019-12-06");        
        print_r($resultado);
    }

}
