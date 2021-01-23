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
                    echo '1';
                    //$_SESSION['user'][0] = $identification;
                } elseif ($result == 2) {//profesional
                    echo '2';
                    //$_SESSION['user'][0] = $identification;
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

    public function showStartingMain() {
        require 'model/UserModel.php';
        $product = UserModel::singleton();

        $products['products'] = $product->show_all_products();
        print_r($products);
//        $this->view->show("startingMain.php", null);
    }
    
     public function registerProfessional()
    {
        require 'model/UserModel.php';
        $professional = UserModel::singleton();
        $result = $professional->verify_user_identification($_POST['identification']);
        if ($result[0][0] == 1) {
            echo ('El profesional ya existe en el sistema, digite otro');
        } else {
            $professional->register_professional(
            $_POST['identification'],
            $_POST['password'],
            $_POST['name'],
            $_POST['firstLastName'],
            $_POST['secondLastName'],
            $_POST['personalPhone'],
            $_POST['roomPhone'],
            $_POST['birthday'],
            $_POST['gender'],
            $_POST['civilStatus'],
            $_POST['placeNumber'],
            $_POST['status'],
            $_POST['emergencyContactName'],
            $_POST['emergencyContactNumber'],
            $_POST['scholarship'],
            $_POST['specialty'],
            $_POST['schoolCode'],
            $_POST['province'],
            $_POST['canton'],
            $_POST['district'],
            $_POST['address']
        );
        echo ('Profesional Registrado');
        }
        
    }
       

}
