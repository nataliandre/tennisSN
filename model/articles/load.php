<?php
  class LoadModel extends Model{
   public function __construct() {
    parent::__construct();
   }
   
   
   
   public function loadArticles(){
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
		 
		   if(empty($a[$i]['images'])){
			  $a[$i]['images'] ='custom/img/card/card-example.png';
		   }

		   $a[$i]['topic'] = $this->replyGroup($a[$i]['topic']);
	   }
	   return $a;
	   

   }
   
   
      public function loadArticlesURL($url){
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
		   		
		   		'WHERE' => [
			   				'0' => [
			   								'column' => 'topict',
			   								'oper' => '=',
			   								'value' => $url
			   								]
			   					],
			   					
			   	'ORDER' => [
					   		'by' => 'DESC',
					   		'field' => 'priority'
				   		]

	   		]
	   );
	   
	   
	   for($i=0;$i<count($a);$i++){
		   if(empty($a[$i]['images'])){
			  $a[$i]['images'] ='/custom/img/card/card-example.png';
		   }
		   $a[$i]['link'] = HTTP_SERVER.ARTICLE_VIEW_LINK.$a[$i]['tid'];
	   }
	   return $a;
	   

   }
   
   
   
    public function loadRandomArticles(){
       $this->tables['articles'] = new ODB('bm_articles');
       $ids = $this->tables['articles']->getAllId();
       $in = $this->getRandomRange(6,$ids);
       $in = implode(",",$in);    
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
		   $a[$i]['images'] = '/custom/'.$a[$i]['images'];
		   $a[$i]['topic'] = $this->replyGroup($a[$i]['topic']);
	   }
	   return $a;
	   

   }
   
   
   public function loadArticlesByCategory($category,$limit = false){
       $this->tables['articles'] = new ODB('bm_articles');
       $conditions = [
		   		'WHERE' => [
			   		'0' => [
			   					'column' => 'topict',
			   					'oper' => '=',
			   					'value' => $category
			   		        ]
		   		]
	   		];
	   		
	   	if($limit == 'main'){
		   	$conditions['limit'] = '3';
		   	$conditions['ORDER'] = [
					   		'by' => 'DESC',
					   		'field' => 'id'
					   		
				   		];
	   	}
  
	   $a = $this->tables['articles']->get(
	   		[ 
	   			'0' => 'name',
	   			'1' => 'tid',
	   			'2' => 'images',
	   			'3' => 'topic',
	   			'4' => 'smContent',
	   			'5' => 'date_load'
	   		],$conditions
	   		
	   );
	   
	   
	   for($i=0;$i<count($a);$i++){
		   if(empty($a[$i]['images'])){
			  $a[$i]['images'] ='/custom/img/card/card-example.png';
		   }
		   	$a[$i]['link'] = HTTP_SERVER.ARTICLE_VIEW_LINK.$a[$i]['tid'];
		  
	   }
	   
	   return $a;
	   

   }
   
   

   
   
   
   
   
   
   

  

   public function loadArticle($id){
	   $this->tables['article'] = new ODB('bm_articles');
	   $a = $this->tables['article']->get(
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
	   /*for($i=0;$i<count($a);$i++){
		   $a[$i]['images'] = '/custom/'.$a[$i]['images'];
	   }*/
	   $a[0]['file'] =$a[0]['content'];
	   $a[0]['content'] =$this->file_get_content($a[0]['content']);
	   
	   
	   return $a[0];

	   
   }
   
   
   
   
   
   public function loadSameArticles($id){
	   $this->tables['articles'] = new ODB('bm_articles');
	   $conditions = [
		   'WHERE' => [
			   '0' => [
				   				'column' => 'tid',
			   					'oper' => '!=',
			   					'value' => $id

			   ]
		   ]
	   ];
	   $ids = $this->tables['articles']->getAllId($conditions); 

	   $in = $this->getRandomRange(3,$ids);
       $in = implode(",",$in);
      
       $a = $this->tables['articles']->get(
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
		 
		   if(empty($a[$i]['images'])){
			  $a[$i]['images'] ='/custom/img/card/card-example.png';
		   }
		   for($i=0;$i<count($a);$i++){
		   $a[$i]['link'] = HTTP_SERVER.ARTICLE_VIEW_LINK.$a[$i]['tid'];
		} 

		  
	   }
	   return $a;
	   
   }
   
   
   public function addNew($data){
	  $this->tables['article'] = new ODB('bm_articles');
	  $data['content'] = $this->file_set_content($data['content'],$data['tid']);
	  $data['content'] = $data['tid'];
	  $data['name'] = htmlspecialchars($data['name']);
	  $data['smContent'] = htmlspecialchars( $data['smContent']);
	  if( $data['topict']=='publikatsii'){
		  $data['topic'] = 'Публикации';
	  }else{
		  $data['topic'] = 'Новостии';
	  }
	  $this->tables['article']->insertInto($data);
	  $array__return = $this->loadLastArticle();
	  return HTTP_SERVER.ARTICLE_VIEW_LINK.$array__return['tid'];	  
   }
   
   
    public function loadLastArticle(){
       $this->tables['article'] = new ODB('bm_articles');
       	       $a = $this->tables['article']->get(
			   		
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
	  $this->tables['article'] = new ODB('bm_articles');
	  $data['content'] = $this->file_set_content($data['content'],$data['tid']);
	  $data['content'] = $data['tid'];	  
	  if( $data['topict']=='publikatsii'){
		  $data['topic'] = 'Публикации';
	  }else{
		  $data['topic'] = 'Новостии';
	  }

	  if($data['delete']){
		  //echo 'oo';
		  $this->tables['article']->delete([
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
	     $this->tables['article']->save($data,[
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