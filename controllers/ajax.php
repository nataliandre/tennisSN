<?php
  class Ajax extends Controller{
   public function __construct() {
	parent::__construct();
   }
   
   
   
   
   public function download(){
	   if(md5($_GET['token'])==$_POST['token']){
			$this->tables['subscribers'] = new ODB('bm_subscribers');
			$mail = $_POST['mail'];
			
			$condition['mail'] = $mail;
			$this->tables['subscribers']->insertInto($condition);
			
			$data = array($_POST['email']);
            $fp = fopen('drupal/files/mail.csv', 'a');
            fputcsv($fp, $data);
            fclose($fp);
	   }
   }
   
   
   
   
  
  
   
   
  }
?>