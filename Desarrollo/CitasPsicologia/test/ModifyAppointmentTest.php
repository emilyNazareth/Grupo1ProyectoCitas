<?php

include  'model/AppointmentModel.php';

class ModifyAppointmentTest
{

    public function testModifyAppointmentModel()
    {
        $model = AppointmentModel::singleton();

        // $_POST['id_appointment'], $_POST['id_professional'], $_POST['date'], $_POST['hour'], $_POST['observations']
        $resultado =  $model->modify_appointment('', '', '', '', '');
        print_r($resultado);
    }
    public function testModifyAppointmentModel2()
    {
        $model = AppointmentModel::singleton();
        $resultado =  $model->modify_appointment(1055, 306540789, "2021-02-10", "22:49", "modificando la cita");
        print_r($resultado);
    }
}
