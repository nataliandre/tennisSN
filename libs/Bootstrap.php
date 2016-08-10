<?php
  class Bootstrap {
   public $bootstrap__help;
   public function __construct() {
	   require 'libs/Bootstrap__help.php';
   $REWRITE = new Bootstrap_help();
   if(isset($_GET['url'])){
        
            $url = $_GET['url'];

            $url = rtrim($url, '/');
            $url = explode('/', $url);


            $file = 'controllers/'.$url[0].'.php';
            if(file_exists($file)){
                  require $file;
                 
            }
            else{
                    require 'controllers/error.php';
                    $controller = new Error();
                    $controller->error404();
                    return false;
            }
            
            if($url=='libs'){
	                $MAIN_CONTROLLER = true;
            }
            if($MAIN_CONTROLLER){
	            echo 'dddd';
	          $controller = new $url[0]($MAIN_CONTROLLER);
            }else{
            $controller = new $url[0];
            }
            if(isset($url[2])) {
                  $controller->$url[1]($url[2]);
            }
            else {
                if(isset($url[1])) {
                  $controller->$url[1]();
            }
            
            
            }


    }else{

          require 'controllers/index.php';
          $controller = new Index();

   }


   }
}
?>
