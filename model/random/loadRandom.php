<?php
  class LoadRandomModel extends Model{
   public function __construct() {
    parent::__construct();
   }
   
   
   
   public function loadReadersNow($article){
	    $today = date("H");
	    if($_SESSION['article'][$article] && $this->visitorsInRange($today)){
		   return $_SESSION['article'][$article]['visitors'];
	    }else{
		   
		   if($today<7){
		   		$readers = rand(30,50);
		   		
		   }elseif($today < 15 && $today >= 7){
			   	$readers = rand(40,60);
		   }elseif($today >= 15){
			    $readers = rand(50,80);
		   }
		   $_SESSION['article'][$article]['visitors'] = $readers;
		   $_SESSION['article'][$article]['hour'] = $today;
		   return  $readers; 
		}
  
   }
   
   
   public function visitorsInRange($hour){
	   
	    if($hour<7 ){
		   		$today = 1;
		}elseif($hour < 15 && $hour >= 7){
			   	$today = 2;
		}elseif($hour >= 15){
			    $today = 3;
		}
		$hour = $_SESSION['article'][$article]['hour'];
		if($hour<7 ){
		   		$tod = 1;
		}elseif($hour < 15 && $hour >= 7){
			   	$tod = 2;
		}elseif($hour >= 15){
			    $tod = 3;
		}
		if($tod == $today){
			return true;
		}else{
			return false;
		}
	   
	   
   }
   
    

  

  
}
?>