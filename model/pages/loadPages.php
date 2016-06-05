<?php
  class LoadPagesModel extends Model{
   public function __construct() {
    parent::__construct();
   }
   
   
   
   public function loadPage($link){
       $this->tables['page'] = new ODB('bm_pages');

	   $a = $this->tables['page']->get(
	   		[ 
	   			'0' => 'page',
	   			'1' => 'url',
	   			'2' => 'title',
	   			'3' => 'description',
	   			'4' => 'meta'
	   		],
	   		[
	   				'WHERE' => [
			   				'0' => [
			   								'column' => 'url',
			   								'oper' => '=',
			   								'value' => $link
			   								]
			   					]
			]
       
	   );
	 
	   return $a[0];

   }
   
   
   public function savePage($data,$link){
	  $this->tables['page'] = new ODB('bm_pages');
	  $this->tables['page']->save($data,[
		  'WHERE' => [
			   				'0' => [
			   								'column' => 'url',
			   								'oper' => '=',
			   								'value' => $link
			   								]
			   					]
		  
	  ]);
	  
	   
	   
   }
   
    
    
      
 
  
  
}
?>