<?php
  class Loader extends Controller{
   public function __construct() {
	parent::__construct();
	if($_GET['url'] == 'loader' || $_GET['url'] == 'loader/'){
		if($this->admin()){
			$admin_save = HTTP_SERVER.ADMIN_UPLOAD;
			
			if(!empty($_FILES)){
		
				$this->load_model('loader/loadLoader');
				$result = $this->model->LoadImage();
				if($result){
					$this->settings['result'] = $result;
				}else{
					$this->settings['error']  = true;
				}

				$this->setOutput('loader/file.tpl');
				
			}else{
				$this->setOutput('loader/main.tpl');
			}
		}
		
	}
   }
   
   
   
   public function files(){
	   if($this->admin()){
		    $files_dir = '/home/ovcharov/rhetoric-hall.com.ua/www/files/';
		    $files =  scandir($files_dir);
		  
		    for($i=2;$i<count($files);$i++){
			    $name = $files[$i];
			    
			    $files_s[$i]['link'] = 'http://rhetoric-hall.com.ua/files/'.$name;
			    $files_s[$i]['name'] = $name;
			    $files_s[$i]['i'] = $i-1;
			}
			$max = $i;
			$files_dir = '/home/ovcharov/rhetoric-hall.com.ua/www/drupal/files/';
		    $files =  scandir($files_dir);
			for($i=2;$i<count($files);$i++){
			    $name = $files[$i];
			    
			    $files_s[$max + $i]['link'] = 'http://rhetoric-hall.com.ua/drupal/files/'.$name;
			    $files_s[$max + $i]['name'] = $name;
			    $files_s[$max + $i]['i'] = $max + $i-1;
			}
				
		    $this->settings['files']=$files_s;	  
			$this->setOutput('loader/files.tpl');
		}
	   
	   
	   
   }
   
   
  

   
   
   
  
  
   
   
  }
?>