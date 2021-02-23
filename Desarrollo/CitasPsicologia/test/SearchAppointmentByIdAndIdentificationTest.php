<?php

include  'model/AppointmentModel.php';

class SearchAppointmentByIdAndIdentificationTest {

    public function testSearchAppointmentByIdAndIdentificationModel() {       
        $model = AppointmentModel::singleton();
        $resultado =  $model->get_appointment_by_id_and_identification(9, 108490156);            
        print_r($resultado);
    }
}