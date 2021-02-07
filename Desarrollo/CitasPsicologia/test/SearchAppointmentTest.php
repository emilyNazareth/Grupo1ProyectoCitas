<?php

include  'model/AppointmentModel.php';

class SearchAppointmentTest {

    public function testSearchAppointmentModel() {       
        $model = AppointmentModel::singleton();
        $resultado =  $model->get_appointments_by_filter(302900101, 1023, 
                "2021-02-22", "2021-02-24", 308880182, "M");            
        print_r($resultado);
    }
    public function testSearchAppointmentModelTwo() {       
        $model = AppointmentModel::singleton();
        $consecutivo = null;
        $resultado =  $model->get_appointments_by_filter(302900101, $consecutivo, 
                "2021-02-22", "2021-02-24", 308880182, "M");            
        print_r($resultado);
    }


}
