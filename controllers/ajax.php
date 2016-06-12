<?php
  class Ajax extends Controller{
   public function __construct() {
	   parent::__construct();
       if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
           echo 'Permission denied';
           die;
       }
   }

      /**
       * @return bool
       */
      public function activationCodeCheck(){
          $data = $this->oGetRequestObject();
          $isEquals = ($this->getSessionParameters('token') == md5($data->activationCode));
          if($isEquals){
              $informer = new Informer('Email подтверждено');
              echo $informer->getSuccessMessage();
          }else{
              $informer = new Informer('Код активации не верний');
              echo $informer->getErrorMessage();
          }
      }



   
   
   
   

   
   
   
   
  
  
   
   
  }
?>