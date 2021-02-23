<?php
include_once __DIR__ . '/Config.php';
$config = Config::singleton();
$config->set('controllerFolder', 'controller/');
$config->set('modelFolder', 'model/');
$config->set('viewFolder', 'view/');

$config->set('dbhost', 'ftp.portalinfofc.com'); 
$config->set('dbname', 'controlcitas');
$config->set('dbuser', 'controlcitas');
$config->set('dbpass', '67ConTrol734!');


?>

