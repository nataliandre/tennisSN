<?php
  class LoadBooksModel extends Model{
   public function __construct() {
    parent::__construct();
   }
   
   
   
   public function loadBooks($limit = false){
       $this->tables['books'] = new ODB('bm_books');
	   if($limit){
		   $conditions['limit'] = $limit;
	   }
	   $a = $this->tables['books']->get(
	   		'*', [	'ORDER' => [
					   		'by' => 'DESC',
					   		'field' => 'priority'
				   		]]
	   );
	   
	   
	   for($i=0;$i<count($a);$i++){
		   $a[$i]['link'] = HTTP_SERVER.BOOKS_LINK_VIEW.$a[$i]['tid'];
		} 
	   return $a;
	   

   }
   
   
      public function loadRandomBooks(){
       $this->tables['books'] = new ODB('bm_books');
	   $ids = $this->tables['books']->getAllId();
       $in = $this->getRandomRange(4,$ids);
       $in = implode(",",$in); 
         
	   $a = $this->tables['books']->get(
	   		[ 
	   			'0' => 'name',
	   			'1' => 'tid',
	   			'2' => 'image',
	   			'3' => 'name',
	   			'4' => 'author',
	   			'5' => 'downloaded'
	   		],
	   		[
		   		'WHERE' => [
			   		'0' => [
			   					'column' => 'id',
			   					'oper' => 'IN',
			   					'value' => $in
			   		        ]
		   		]
	   		]
	   );
	   
	   
	   for($i=0;$i<count($a);$i++){
		   $a[$i]['image'] = DIR_IMAGE_BOOKS.$a[$i]['image'];
		}
	   return $a;
	   

   }
   
   


   public function loadBook($id){
	   $this->tables['books'] = new ODB('bm_books');
	   $a = $this->tables['books']->get(
	   		'*',
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
   
   
   
   
   
   public function saveBook($data,$tid,$file){
	  	   $this->tables['books'] = new ODB('bm_books');
           $data['name'] = htmlspecialchars( $data['name']);
		   $data['smContent'] = htmlspecialchars( $data['smContent']);
		    if($data['delete']){
		  //echo 'oo';
		  $this->tables['books']->delete([
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
		   
     $this->tables['books']->save($data,[
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
	  $this->tables['books'] = new ODB('bm_books');
	  $data['name'] = htmlspecialchars($data['name']);
	  $data['smContent'] = htmlspecialchars($data['smContent']);

	  $this->tables['books']->insertInto($data);
	  $array__return = $this->loadLastBook();
	  return HTTP_SERVER.BOOKS_LINK_VIEW.$array__return['tid'];	  
   }
   
   
   
   
     public function loadSameBooks($id){
	   $this->tables['books'] = new ODB('bm_books');
	   $conditions = [
		   'WHERE' => [
			   '0' => [
				   				'column' => 'tid',
			   					'oper' => '!=',
			   					'value' => $id

			   ]
		   ]
	   ];
	   $ids =$this->tables['books']->getAllId($conditions); 

	   $in = $this->getRandomRange(3,$ids);
       $in = implode(",",$in);
      
       $a = $this->tables['books']->get(
	   		[ 
	   			'*'
	   		],
	   		[
		   		'WHERE' => [
			   		'0' => [
			   					'column' => 'id',
			   					'oper' => 'IN',
			   					'value' => $in
			   		        ]
		   		]
	   		]
	   );
	   
	   for($i=0;$i<count($a);$i++){
		   $a[$i]['link'] = HTTP_SERVER.BOOKS_LINK_VIEW.$a[$i]['tid'];
		} 
	
	   return $a;
	   
   }
   

   
   
   
    public function loadLastBook(){
       $this->tables['books'] = new ODB('bm_books');

       	       $a = $this->tables['books']->get(
			   		
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

  
   
 
  
  
}
?>