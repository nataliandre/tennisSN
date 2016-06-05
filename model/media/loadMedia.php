<?php
  class LoadMediaModel extends Model{
   public function __construct() {
    parent::__construct();
   }
   
   
   
   public function loadLastMedia($tid){
       $this->tables['media'] = new ODB('bm_video');
       if(!$tid){
	       $a = $this->tables['media']->get(
			   		
			   			'*'
			   		,
			   		[
				   		'limit' => 1,
				   		'ORDER' => [
					   		'by' => 'DESC',
					   		'field' => 'priority'
				   		]
			   		]
	   		);
	       
       }else{
	        $a = $this->tables['media']->get(
			   		
			   			'*'
			   		,
			   		[
				   		
				   		'WHERE' => [
					   		'0' => [
			   					'column' => 'tid',
			   					'oper' => '=',
			   					'value' => $tid
			   		        ]					   		
				   		]
			   		]
	   		);

	       
       }
	   
	   
	   $a[0]['file'] =  $a[0]['source'];
	   $a[0]['source'] =  $this->file_get_content($a[0]['source']);
	   
	   return $a[0];
	   

   }
   
   

  

   public function loadMediaNotLike($id){
	   $this->tables['medias'] = new ODB('bm_video');
	   $a = $this->tables['medias']->get(
	   		'*',
	   		[
		   		'WHERE' => [
			   		'0' => [
			   					'column' => 'id',
			   					'oper' => ' NOT LIKE ',
			   					'value' => $id
			   		        ]
		   		]
	   		]
	   );
	   for($i=0;$i<count($a);$i++){
		   $a[$i]['link'] = HTTP_SERVER.MEDIA_LINK.$a[$i]['tid'];
		    $a[$i]['source'] =  $this->file_get_content($a[$i]['source']);
	   }
	   return $a;

	   
   }
   
   
   
    public function saveChanges($data,$tid,$file){
	  $this->tables['video'] = new ODB('bm_video');
	  $data['source'] = $this->file_set_content($data['source'],$file);
	  
	  $data['source'] = $file;
	  if($data['delete']){
		  //echo 'oo';
		   $this->tables['video']->delete([
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
	 
     $this->tables['video']->save($data,[
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
   
   
   public function addNew($data){
	  $this->tables['video'] = new ODB('bm_video');
	  $data['source'] = $this->file_set_content($data['source'],$data['tid']);
	  $data['source'] = $data['tid'];
	  $this->tables['video']->insertInto($data);
	  $array__return = $this->loadLastMedia();
	  return HTTP_SERVER.MEDIA_LINK.$array__return['tid'];	  
   }
   
   
   public function loadLastTree(){
	   $this->tables['media'] = new ODB('bm_video');
	   $a = $this->tables['media']->get(
			   		
			   			'*'
			   		,
			   		[
				   		'limit' => 3,
				   		'ORDER' => [
					   		'by' => 'DESC',
					   		'field' => 'id'
					   		
				   		]
			   		]
	   		);
	   		  for($i=0;$i<count($a);$i++){
		   $a[$i]['link'] = HTTP_SERVER.MEDIA_LINK.$a[$i]['tid'];
		    $a[$i]['source'] =  $this->file_get_content($a[$i]['source']);
	   }
	   	   return $a;
   }
   

  
  
}
?>