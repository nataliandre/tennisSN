<?php
  class Contacts extends Controller{
   public function __construct() {
		parent::__construct();

	   $this->setOutput('contacts/main.tpl');
   }
   



	  /*
   public function mail__book(){
	   if($_GET['ajax']==1){
		$book = $_POST['book'];  
	    $link = $_POST['link'];
	    $mail =$_POST['mail'];
	    $message = "Здравствуйте!<br/> 
		Ваша книга доступна по <a href=".$link.">ссылке.</a><br/>
		С уважением, Институт риторики им.Д.Кеннеди!";
	    $to = $mail;
	  	$from = "mail@rhetoric-hall.com.ua"; 
	    $subject = "Институт риторики им.Д.Кеннеди";
	    $headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/html; charset=utf-8";
	    mail($to, $subject, $message, $headers);
	    $_SESSION['auth'] = true;
	   }
	 
   }

	  */
   
  
   
  
  
   
   
  }
?>