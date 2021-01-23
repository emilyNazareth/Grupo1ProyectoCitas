<?php

/**
 * 
 */
class UserController {

    public function __construct() {
        $this->view = new View();
    }


    public function showLoginView() {
        $this->view->show("loginView.php", null);
    }

    public function showIndexView() {
        $this->view->show("indexView.php", null);
    }

    public function logIn() {
        require 'model/UserModel.php';

        $identification = $_POST['identification'];
        $password = $_POST['password'];

        if (empty($identification) || empty($password)) {
            echo 'error';
        } else {
            $user = UserModel::singleton();
            $result = $user->loginCheck($identification, $password);
            if ($result != null) {


                if ($result == 1) {//admi      
                    $_SESSION['user'][0] = $identification;
                    echo  '1';
                } elseif ($result == 2) {//profesional
                    echo '2';
                    $_SESSION['user'][0] = $identification;
                } else {
                    echo '3';
                }
            } else {
                echo 'error';
            }
        }
    }

    public function showAdministratorMainView() {
        $this->view->show("AdministratorMainView.php", null);
    }

    public function showSearchProfessionalAdministrator() {
        require 'model/UserModel.php';
        $professional = UserModel::singleton();
        $data['professional'] =  $professional->getProfessionals();
        $this->view->show("SearchProfessionalAdministrator.php", $data);
    }

    
    public function registerProfessional() {
        require 'model/UserModel.php';
        $professional = UserModel::singleton();
        
        $professional->register_professional($_POST['identification'], 
            $_POST['password'], $_POST['name'], $_POST['firstLastName'], 
            $_POST['secondLastName'], $_POST['personalPhone'],
            $_POST['roomPhone'], $_POST['birthday'], $_POST['gender'], 
            $_POST['civilStatus'], $_POST['placeNumber'],               
            $_POST['status'], $_POST['emergencyContactName'], 
            $_POST['emergencyContactNumber'], $_POST['scholarship'], 
            $_POST['specialty'],  $_POST['schoolCode'], 
            $_POST['province'], $_POST['canton'], $_POST['district'],
            $_POST['address']);
        echo('Profesional Registrado');
    }

    public function searchProfessional() {
        require 'model/UserModel.php';
        $identification = $_POST['cedula'];
        $name = $_POST['nombre'];
        $lastName = $_POST['apellido'];
        $user = UserModel::singleton();
        $data['users'] = $user->searchProfessional($identification, $name, $lastName);
        
         //echo json_encode($data);  probar
        $resultado = "";
        foreach ($data['users'] as $value) {
            $resultado .= "<tr>";
            $resultado .= '<td style="display:none;">' . $value[0] . '</td>';
            $resultado .= '<td>' . $value[1] . '</td>';
            $resultado .= '<td>' . $value[2] . '</td>';
            $resultado .= '<td>' . $value[3] . '</td>';
            $resultado .= '<td><a class=" btn btn-success btn-sm" onclick="modifyProffesional()">Modificar</a></td>';
            $resultado .= '<td><button onclick="deleteProffesional()" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelModal">Eliminar</button ></td>'; 
            $resultado .= "</tr>";
        }
        echo $resultado;
    }
    
       

}
