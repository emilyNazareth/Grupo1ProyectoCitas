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
    
       

}
