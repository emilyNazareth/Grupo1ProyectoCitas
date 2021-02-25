<?php

include 'controller/UserController.php';
include 'model/UserModel.php';

class SearchProfessionalTest {

    public function testSearchProfessionalModel() {

        $model = UserModel::singleton();

        $resultado = $model->searchProfessional("-1", "Kevin", "");
        echo 'Test: call without parameters -> \n';
        print_r($resultado);

        //--
        $resultado1 = $model->searchProfessional("87", "", "");
        echo 'Test: call only ID -> \n';
        print_r($resultado1);

        //--
        $resultado2 = $model->searchProfessional("", "ana", "alvarado");
        echo 'Test: first and last name only -> \n ';
        print_r($resultado2);

        //--
        $resultado3 = $model->searchProfessional("304850984", "Emily Profesional", "");
        echo 'Test: ID and name only -> \n';
        print_r($resultado3);

        //--
        $resultado4 = $model->searchProfessional("305240018", "a", "a");
        echo 'Test: all data -> ' ;
        print_r($resultado4);
    }

//end function
}

// end class