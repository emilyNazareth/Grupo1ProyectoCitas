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
        session_unset();
        session_destroy();
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

    public function showAdministratorMainView() {
        $this->view->show("AdministratorMainView.php", null);
    }

    public function registerProfessional() {
        require 'model/UserModel.php';
        $professional = UserModel::singleton();
        $result = $professional->verify_user_identification($_POST['identification']);
        if ($result[0][0] == 1) {
            echo ('El profesional ya existe en el sistema, digite otro');
        } else {
            $professional->register_professional(
                    $_POST['identification'], $_POST['password'], $_POST['name'], $_POST['firstLastName'], $_POST['secondLastName'], $_POST['personalPhone'], $_POST['roomPhone'], $_POST['birthday'], $_POST['gender'], $_POST['civilStatus'], $_POST['placeNumber'], $_POST['status'], $_POST['emergencyContactName'], $_POST['emergencyContactNumber'], $_POST['scholarship'], $_POST['specialty'], $_POST['schoolCode'], $_POST['province'], $_POST['canton'], $_POST['district'], $_POST['addressProfessional']
            );
            echo ('Profesional Registrado');
        }
    }

    public function searchProfessional() {
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
                $resultado .= '<td><a class=" btn btn-success btn-sm" onclick="modifyProffesional()">Modificar</a></td>';
                $resultado .= '<td><button onclick="deleteProfessional(' . $value[1] . ')" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelModal">Eliminar</button ></td>';
                $resultado .= "</tr>";
            }
        }

        echo $resultado;
    }

    public function showSearchProfessionalAdministrator() {
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
                $resultado .= '<td><a class=" btn btn-success btn-sm" onclick="modifyProffesional()">Modificar</a></td>';
                $resultado .= '<td><button onclick="deleteProfessional(' . $value[1] . ')" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelModal">Eliminar</button ></td>';
                $resultado .= "</tr>";
            }
        }

        echo $resultado;
    }

    public function deleteProfessional() {
        require 'model/UserModel.php';
        $user = UserModel::singleton();
        $result = $user->delete_professional($_POST['identification']);
        if ($result == 1) {
            echo ('El registro ha sido eliminado');
        } else {
            echo ('El registro no existe');
        }
    }

    public function updateProfessional() {
        require 'model/UserModel.php';
        $id = $_POST['cedula'];
        $contrasena = $_POST['contrasena'];
        $nombre = $_POST['nombre'];
        $primer_apellido = $_POST['primerApellido'];
        $segundo_apellido = $_POST['segundoApellido'];
        $telefono_personal = $_POST['telPersonal'];
        $telefono_habitacion = $_POST['telHabitacion'];
        $estado_civil = $_POST['estadoCivil'];
        $estado = $_POST['estado'];
        $contacto_emergencia = $_POST['contactoEmergancia'];
        $contacto_emergencia_numero = $_POST['numeroContactoEmergancia'];
        $escolaridad = $_POST['escolaridad'];
        $especialidad = $_POST['especialidad'];
        $provincia = $_POST['provincia'];
        $canton = $_POST['canton'];
        $distrito = $_POST['distrito'];
        $direccion = $_POST['direccion'];
        
        $user = UserModel::singleton();
        $result = $user->update_professional( $id,
            $contrasena,
            $nombre,
            $primer_apellido,
            $segundo_apellido,
            $telefono_personal,
            $telefono_habitacion,
            $estado_civil,
            $estado,
            $contacto_emergencia,
            $contacto_emergencia_numero,
            $escolaridad,
            $especialidad,
            $provincia,
            $canton,
            $distrito,
            $direccion);
        if ($result == 1) {
            echo ('El registro ha sido actualizado');
        } else {
            echo ('El registro no existe');
        }
    }//end updateProfessional

}
