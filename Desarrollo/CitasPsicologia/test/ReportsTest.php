<?php

include  'model/AppointmentModel.php';

class ReportsTest {

    public function testReportModel() {       
        $model = AppointmentModel::singleton();
        $resultado =  $model->get_appointments_quantity();            
        print_r($resultado);
    }



}
