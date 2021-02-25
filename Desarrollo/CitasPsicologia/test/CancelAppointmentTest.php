<?php

include  'model/AppointmentModel.php';

class CancelAppointmentTest {

    public function testCancelAppointmentModel() {      
        $model = AppointmentModel::singleton();

        $resultado =  $model->cancelAppointmentById( 1012, "Estoy bien");            
        print_r($resultado);
    }
}
