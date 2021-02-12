<?php

include  'model/AppointmentModel.php';

class AppointmentDetailTest {

    public function testAppointmentDetailModel() {       
        $model = AppointmentModel::singleton();
        $resultado =  $model->get_appointment_detail(1061);            
        print_r($resultado);
    }
}