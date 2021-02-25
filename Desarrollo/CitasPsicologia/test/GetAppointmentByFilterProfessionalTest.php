<?php

include  'model/AppointmentModel.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class GetAppointmentByFilterProfessionalTest {

    public function test_get_appointments_by_filter_professional_Model() {       
        $model = AppointmentModel::singleton();
        $resultado =  $model->get_appointments_by_filter_professional("","","","","","");            
        print_r($resultado);
        //No retorna nada aunque le mande parámetros vacíos
        
        $resultado1 =  $model->get_appointments_by_filter_professional("","","","","305190564","");            
        print_r($resultado1);
        // Se esperan varios resultados
    }
}