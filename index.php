<?php


session_start();
date_default_timezone_set('Europe/Kiev');


require_once('libs/config.php');
require_once('redBeans/config.php');
  /* REDIRECT_SCRIPT_URL*/
require  'libs/Bootstrap.php';
require  'libs/Controller.php';
require  'libs/Model.php';
require  'redBeans/rb.php';
require  'libs/Mailer.php';
require  'libs/Entity/Informer.php';
require  'libs/ClassImagesUpload/class.upload.php';
require  'libs/Errors/ErrorsDetector.php';
require  'libs/Entity/Generator.php';
require  'libs/Factory/Factory.php';
require  'libs/Factory/RequiredRoutes.php';


$GLOBALS['REQUIRED'] = new RequiredRoutes();


R::setup( 'mysql:host='.DB_HOSTNAME.';dbname='.DB_DATABASE, DB_USERNAME,DB_PASSWORD);
$app = new Bootstrap();

?>
