<?php
require 'libs/Config.php';
$config = Config::singleton();
$config->set('controllerFolder', 'controller/');
$config->set('modelFolder', 'model/');
$config->set('viewFolder', 'view/');

$config->set('dbhost', '163.178.107.2'); 
$config->set('dbname', 'citas_psicologia');
$config->set('dbuser', 'labsturrialba');
$config->set('dbpass', 'Saucr.2191');
?>

