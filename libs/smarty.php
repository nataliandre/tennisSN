<?php // smarty.php

require "Smarty/Smarty.class.php";
$smarty = new Smarty();
$smarty->template_dir = "view"; 
$smarty->compile_dir   = "temp/smarty/templates_c"; 
$smarty->cache_dir = "temp/smarty/cache"; 
$smarty->config_dir    = "temp/smarty/configs";

?>