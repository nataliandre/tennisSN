<?php
  class LoadTraneModel extends Model{
   public function __construct() {
    parent::__construct();
   }
   
   
   
   public function loadLastFive(){
             $this->tables['trane'] = new ODB('bm_couses');

	   $a = $this->tables['trane']->get(
	   		'*',
	   		[
		   		'limit' => 5,
		   		'ORDER' => [
					   		'by' => 'DESC',
					   		'field' => 'priority'
					   		
				   		]
		   		
	   		]
	   );
	   
	   for($i=0;$i<count($a);$i++){
		   $a[$i]['link'] = HTTP_SERVER.ROUTE_TRANES_VIEW.$a[$i]['tid'];
		   
	   }
	   
   
	   return $a;
	   

   }
   
   public function loadTranes(){
             $this->tables['trane'] = new ODB('bm_couses');

	   $a = $this->tables['trane']->get(
	   		'*',
	   		[  
		   		'ORDER' => [
					   		'by' => 'DESC',
					   		'field' => 'priority'
					   		
				   		]
		   		
	   		]
	   );
	   for($i=0;$i<count($a);$i++){
		   $a[$i]['link'] = HTTP_SERVER.ROUTE_TRANES_VIEW.$a[$i]['tid'];
		   
	   }
	   

	   return $a;
	   

   }
   
   
      public function loadTrane($url){
       $this->tables['trane'] = new ODB('bm_couses');
	   $a = $this->tables['trane']->get(
	   		'*',
	   		[
		   		
		   		'WHERE' => [
			   				'0' => [
			   								'column' => 'tid',
			   								'oper' => '=',
			   								'value' => $url
			   								]
			   					]

	   		]
	   );
	   
	   
	    for($i=0;$i<count($a);$i++){
		   $a[$i]['link'] = HTTP_SERVER.ROUTE_TRANES_VIEW.$a[$i]['tid'];
		   $a[$i]['content'] =$this->file_get_content($a[$i]['content']);
		   
	   }

	   return $a[0];
	   

   }
   
   
   
       
   public function addNew($data){
	 $this->tables['trane'] = new ODB('bm_couses');
	  $data['content'] = $this->file_set_content($data['content'],$data['tid']);
	  $data['content'] = $data['tid'];

      $this->tables['trane']->insertInto($data);
	  $array__return = $this->loadLastTrane();
	  return HTTP_SERVER.ROUTE_TRANES_VIEW.$array__return['tid'];	  
   }
   
   
    public function loadLastTrane(){
      $this->tables['trane'] = new ODB('bm_couses');
       	       $a = $this->tables['trane']->get(
			   		
			   			'*'
			   		,
			   		[
				   		'limit' => 1,
				   		'ORDER' => [
					   		'by' => 'DESC',
					   		'field' => 'id'
					   		
				   		]
			   		]
	   		);
	       
      
	   

	   return $a[0];
	   

   }
   
   
    public function saveChanges($data,$tid,$file){
	  $this->tables['trane'] = new ODB('bm_couses');
	  $data['content'] = $this->file_set_content($data['content'],$data['tid']);
	  $data['content'] = $data['tid'];	 
	  $data['name'] = htmlspecialchars($data['name']);
	  $data['smContent'] = htmlspecialchars($data['smContent']);
	  if($data['delete']){
		  //echo 'oo';
		  $this->tables['trane']->delete([
		   'WHERE' => [
				   				'0' => [
				   								'column' => 'a.tid',
				   								'oper' => '=',
				   								'value' => $tid
				   								]
				   					]
			  
		   ]
		  );
		  
		  
		  
	  }else{
	     $this->tables['trane']->save($data,[
			  'WHERE' => [
				   				'0' => [
				   								'column' => 'tid',
				   								'oper' => '=',
				   								'value' => $tid
				   								]
				   					]
			  
		  ]);
		  
		  
      }
	   
	   
   }


  
   
 
  
  
}
?>