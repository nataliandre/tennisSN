<?php
  class Error extends Controller{
   public function __construct() {
	parent::__construct();
	 
   }
   
   
   public function error404(){
	   
	   
	   
	   $this->setOutput('common/error.tpl');
   }
   
   
   

   
   
   
  
  
   
   
  }
?>