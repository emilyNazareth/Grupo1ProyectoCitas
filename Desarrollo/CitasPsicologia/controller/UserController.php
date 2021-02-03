<?php

/**
 * 
 */
class UserController
{

    public function __construct()
    {
        $this->view = new View();
    }

    public function showLoginView()
    {
        $this->view->show("loginView.php", null);
    }

    public function showIndexView()
    {
        session_unset();
        session_destroy();
        $this->view->show("indexView.php", null);
    }

    public function logIn()
    {
        require 'model/UserModel.php';

        $identification = $_POST['identification'];
        $password = $_POST['password'];

        if (empty($identification) || empty($password)) {
            echo 'error';
        } else {
            $user = UserModel::singleton();
            $result = $user->loginCheck($identification, $password);
            if ($result != null) {


                if ($result == 1) { //admi  
                    $_SESSION['userAdministrator'] = time() + 900;
                    echo '1';
                } elseif ($result == 2) { //profesional
                    $_SESSION['userProfessional'] = time() + 900;
                    echo '2';
                } else {
                    echo '3';
                }
            } else {
                echo 'error';
            }
        }
    }

    public function showAdministratorMainView()
    {
        $this->view->show("AdministratorMainView.php", null);
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
                $_POST['addressProfessional']
            );
            echo ('Profesional Registrado');
        }
    }

    public function searchProfessional()
    {
        require 'model/UserModel.php';
        $identification = $_POST['cedula'];
        $name = $_POST['nombre'];
        $lastName = $_POST['apellido'];
        $user = UserModel::singleton();
        $data['users'] = $user->searchProfessional($identification, $name, $lastName);

        $resultado = "";
        if (empty($data['users'])) {
            $resultado = '0';
        } else {
            foreach ($data['users'] as $value) {
                $resultado .= "<tr>";
                $resultado .= '<td style="display:none;">' . $value[0] . '</td>';
                $resultado .= '<td>' . $value[1] . '</td>';
                $resultado .= '<td>' . $value[2] . '</td>';
                $resultado .= '<td>' . $value[3] . '</td>';
                $resultado .= '<td><a class=" btn btn-success btn-sm" onclick="modifyProfessionalUrl(' . $value[1] . ')">Modificar</a></td>';
                $resultado .= '<td><button onclick="deleteProfessional(' . $value[1] . ')" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelModal">Eliminar</button ></td>';
                $resultado .= "</tr>";
            }
        }

        echo $resultado;
    }

    public function showSearchProfessionalAdministrator()
    {
        require 'model/UserModel.php';
        $professional = UserModel::singleton();
        $data['users'] = $professional->getProfessionals();

        $resultado = "";
        if (empty($data['users'])) {
            $resultado = '0';
        } else {
            foreach ($data['users'] as $value) {
                $resultado .= "<tr>";
                $resultado .= '<td style="display:none;">' . $value[0] . '</td>';
                $resultado .= '<td>' . $value[1] . '</td>';
                $resultado .= '<td>' . $value[2] . '</td>';
                $resultado .= '<td>' . $value[3] . '</td>';
                $resultado .= '<td><a class=" btn btn-success btn-sm" onclick="modifyProfessionalUrl(' . $value[1] . ')">Modificar</a></td>';
                $resultado .= '<td><button onclick="deleteProfessional(' . $value[1] . ')" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelModal">Eliminar</button ></td>';
                $resultado .= "</tr>";
            }
        }

        echo $resultado;
    }

    public function deleteProfessional()
    {
        require 'model/UserModel.php';
        $user = UserModel::singleton();
        $result = $user->delete_professional($_POST['identification']);
        if ($result == 1) {
            echo ('El registro ha sido eliminado');
        } else {
            echo ('El registro no existe');
        }
    }


    public function updateProfessional()
    {
        require 'model/UserModel.php';

        $user = UserModel::singleton();
        $result = $user->update_professional(
            $_POST['cedula'],
            $_POST['contrasena'],
            $_POST['nombre'],
            $_POST['primerApellido'],
            $_POST['segundoApellido'],
            $_POST['telPersonal'],
            $_POST['telHabitacion'],
            $_POST['estadoCivil'],
            $_POST['estado'],
            $_POST['contactoEmergancia'],
            $_POST['numeroContactoEmergancia'],
            $_POST['escolaridad'],
            $_POST['especialidad'],
            $_POST['provincia'],
            $_POST['canton'],
            $_POST['distrito'],
            $_POST['direccion']
        );

        if ($result == 1) {
        } else {

            echo ('El registro ha sido actualizado');
        }
    } //end updateProfessional

    public function showUpdateProfessional()
    {

        require 'model/UserModel.php';
        $user = UserModel::singleton();
        $identification = $_GET["Cedula"];
        $result['professional'] = $user->obtain_information_to_modify($identification);
        $this->view->show("UpdateProfessionalAdministrator.php", $result);
    }
    public function getProfessionals()
    {
        require 'model/UserModel.php';
        $professional = UserModel::singleton();
        $data['users'] = $professional->getProfessionals();

        $this->view->show("nose.php", $data);//pasar a la vista de la cita
    }

    public function saveFunctionarySession()
    {
       /* $_SESSION['functionary'] = [
            'identification' => $_POST['identification'],
            'name' => $_POST['name'],
            'firstLastName' => $_POST['firstLastName'],
            'secondLastName' => $_POST['secondLastName'],
            'personalPhone' => $_POST['personalPhone'],
            'roomPhone' => $_POST['roomPhone'],
            'birthday' => $_POST['birthday'],
            'gender' => $_POST['gender'],
            'scholarship' => $_POST['scholarship'],
            'province' => $_POST['province'],
            'canton' => $_POST['canton'],
            'district' => $_POST['district'],
            'civilStatus' => $_POST['civilStatus'],
            'address' => $_POST['address'],
            'officePhone' => $_POST['officePhone'],
            'email' => $_POST['email'],
            'idPlaca' => $_POST['idPlaca'],
            'portingExpirationDate' => $_POST['portingExpirationDate'],
            'place' => $_POST['place'],
            'area' => $_POST['area'],
            'office' => $_POST['office'],
            'dateAdmission' => $_POST['dateAdmission'],
            'assistance' => $_POST['assistance']];*/
            $_SESSION['functionary'] = [
                'identification' => 102340567,
                'name' => 'Erick',
                'firstLastName' => "Ramirez",
                'secondLastName' => "Alvarado",
                'personalPhone' => "85858585",
                'roomPhone' => "89898989",
                'birthday' => "1999-12-06",
                'gender' => 'M',
                'scholarship' => "Tecnico",
                'province' => "Cartago",
                'canton' => "Turri",
                'district' => "La Suiza",
                'civilStatus' => "Viudo(a)",
                'address' => "absd",
                'officePhone' =>"87878787",
                'email' => "beto@gmail.com",
                'idPlaca' => "321",
                'portingExpirationDate' => "2022-12-06",
                'place' => "alguna",
                'area' => "Omicidios",
                'office' => "central",
                'dateAdmission' => "2019-12-06"];
        
        echo ('Funcionario Registrado');
    }

    public function searchFunctionaryByIdentification()
    {
        require 'model/UserModel.php';
        $user = UserModel::singleton();
        $result = $user->search_functionary_by_identification($_POST['identification']);
        json_encode($result);
    }
}
