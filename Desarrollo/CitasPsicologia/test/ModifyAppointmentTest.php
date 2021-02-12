<?php

include  'model/AppointmentModel.php';

class ModifyAppointmentTest
{

    public function testModifyAppointmentModel()
    {
        $model = AppointmentModel::singleton();
        $resultado =  $model->modify_appointment('', '', '', '', '');
        print_r($resultado);
    }
    public function testModifyAppointmentModel2()
    {
        $model = AppointmentModel::singleton();
        $resultado =  $model->modify_appointment(1025, 301230321, "2021-02-10", "22:49", "modificando la cita luis");
        print_r($resultado);
    }
}
