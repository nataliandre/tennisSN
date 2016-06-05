<?php
  class LoadLoaderModel extends Model{
   public function __construct() {
    parent::__construct();
   }
   
   
   
public function LoadImage(){
	 $uploaddir = '/home/ovcharov/rhetoric-hall.com.ua/www/drupal/files/';
     $uploadfile = $uploaddir . basename($_FILES['files']['name']);




	if (move_uploaded_file($_FILES['files']['tmp_name'], $uploadfile)) {
	   return 'http://rhetoric-hall.com.ua/drupal/files/'.$_FILES['files']['name'];
	} else {
	   return false;
	}

	
	
}    
    
      
 
  
  
}
?>