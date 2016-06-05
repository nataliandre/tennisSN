<?php
  class LoadQuotationModel extends Model{
   public function __construct() {
    parent::__construct();
   }
   
   
   
   public function loadQuotations(){
       $this->tables['articles'] = new ODB('bm_articles');

	   $a = $this->tables['articles']->get(
	   		[ 
	   			'0' => 'name',
	   			'1' => 'tid',
	   			'2' => 'images',
	   			'3' => 'topic',
	   			'4' => 'smContent',
	   			'5' => 'date_load'
	   		],
	   		[
		   		'limit' => 6
	   		]
	   );
	   
	   
	   for($i=0;$i<count($a);$i++){
		   $a[$i]['images'] = '/custom/'.$a[$i]['images'];
		   $a[$i]['topic'] = $this->replyGroup($a[$i]['topic']);
	   }
	   return $a;
	   

   }
   
   

  

   public function loadQuotation($id){
	   $this->tables['article'] = new ODB('bm_articles');
	   $a = $this->tables['article']->get(
	   		[ 
	   			'0' => 'name',
	   			'1' => 'tid',
	   			'2' => 'images',
	   			'3' => 'topic',
	   			'4' => 'smContent',
	   			'5' => 'date_load',
	   			'6' => 'content',
	   			
	   		],
	   		[
		   		'WHERE' => [
			   		'0' => [
			   					'column' => 'tid',
			   					'oper' => '=',
			   					'value' => $id
			   		        ]
		   		]
	   		]
	   );
	   return $a[0];

	   
   }
   
   
    public function loadRandomQuotation(){
	   $this->tables['quotation'] = new ODB('bm_quotation');
	   $i = $this->tables['quotation']->getCount();
	   $i = rand(1, $i);
	   $a = $this->tables['quotation']->get(
	   		[ 
	   			'0' => 'body',
	   			'1' => 'author',
	   			'2' => 'class'
	   			
	   		],
	   		[
		   		'WHERE' => [
			   		'0' => [
			   					'column' => 'turn',
			   					'oper' => '=',
			   					'value' => $i
			   		        ]
		   		]
	   		]
	   );
	   return $a[0];
	   
   }
  
   
 
  
  
}
?>