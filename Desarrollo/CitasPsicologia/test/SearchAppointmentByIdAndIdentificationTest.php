<?php

include  'model/AppointmentModel.php';

class SearchAppointmentByIdAndIdentificationTest {

    public function testSearchAppointmentByIdAndIdentificationModel() {       
        $model = AppointmentModel::singleton();
        $resultado =  $model->get_appointment_by_id_and_identification(1061,102360154);            
        print_r($resultado);
    }
}