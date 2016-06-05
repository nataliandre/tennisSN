<?php
  class Bootstrap {
   public $bootstrap__help;
   public function __construct() {
	   require 'libs/Bootstrap__help.php';
   $REWRITE = new Bootstrap_help();
   if(isset($_GET['url'])){
        
            $url = $_GET['url'];

            
            
            
            if($url == 'category/materialy-i-publikatsii/luchshie-knigi-po-ritorike-i-oratorskomu-iskusstvu-0'){
	            header('Location: http://rhetoric-hall.com.ua/libs/');
            }
            if(preg_match('/content/',$url)){
	            $url = rtrim($url, '/');
                $url = explode('/', $url);
	            if($REWRITE->match_book($url[1])){
		            //echo $url[1];
	            	$url = 'kniga/'.$url[1];
	            }else{
		            header('Location: http://rhetoric-hall.com.ua/libs/');
	            }
            }
            
         
            //echo $url;
            $test1 = $REWRITE->math_url($url);
            if($test1){
	           	$url = $test1;
	            
            }

            $url = rtrim($url, '/');
            $url = explode('/', $url);
			
            $url_test2 = $url[0];
            $test2 = $REWRITE->math_url($url_test2);
            if($test2){
	            
	            $test2 =  explode('/',$test2);
	            $url[0] = $test2[0];
	            $prom = $url[1];
	            $url[1] = $test2[1];
	            $url[2] = $prom;
            }
            
            unset($test2);
            unset($test1);
            unset($url_test2);
            unset($prom);



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
