<?php


session_start();
date_default_timezone_set('Europe/Kiev');


require_once('libs/config.php');
require_once('redBeans/config.php');
  /* REDIRECT_SCRIPT_URL*/
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'redBeans/rb.php';
require 'libs/Mailer.php';
require 'libs/Entity/Informer.php';
$app = new Bootstrap();

?>
