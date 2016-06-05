<?php
  class Articles extends Controller{
   public function __construct() {
	parent::__construct(); 
   }
   
   public function category($category){
	    if($category=='publikatsii'){
		    $this->settings['category'] = 'Публикации';
	    }else{
		     $this->settings['category'] = 'Новости';
	    }
                $this->settings['title']  = $this->settings['category'];
				$this->settings['description']  =$this->settings['category'];
				$this->settings['keywords']  =  $this->settings['category'];	    

	    if($this->admin()){
		    $this->settings['button__save__media'] = '<a href="'.HTTPS_SERVER.ARTICLE_ADD_LINK.'" class="btn btn-success">Добавить статью</a>';
	    }
	   
	    $this->load_model('articles/load');
		$this->settings['articles'] = $this->model->loadArticlesURL($category);  
        $this->setOutput('articles/category.tpl');
	   
	   
   }
   
   public function view($id){
	   $this->load_model('articles/load');
	   $this->settings['article'] = $this->model->loadArticle($id);
	   
	   $this->settings['title']  =$this->settings['article']['name'];
	   $this->settings['description']  =$this->settings['article']['smContent'];
	   $this->settings['keywords']  =  $this->settings['article']['smContent'];
	   
	   $this->settings['articles'] = $this->model->loadSameArticles($id);
	   $file = $this->settings['article']['content'];
	   	if($this->admin()){
		   	$this->settings['admin'] = true; 
		   	$this->settings['admin_save'] = HTTPS_SERVER.ARTICLE_VIEW_LINK.$id;
	   	}
	   	if($_POST['article'] && $this->admin()){
		   	unset($_POST['article']);
		   	$this->model->saveChanges($_POST,$id,$file);
		   	$this->redirect(HTTPS_SERVER.ARTICLE_VIEW_LINK.$_POST['tid']);
	   	}

	
	    
       $this->setOutput('articles/review.tpl');
   }
   
   
   public function add($id){
	    $this->load_model('articles/load');
	   	if($this->admin()){
		   	$this->settings['admin'] = true; 
		   	
		   	$this->settings['admin_save'] = HTTPS_SERVER.ARTICLE_ADD_LINK;
		   	if($_POST['article'] && $this->admin()){
		     	unset($_POST['article']);
		   	    $this->redirect($this->model->addNew($_POST));
	   	    }
	   	     $this->setOutput('articles/add.tpl');
	   	}
	   	

	
	    
      
   }
   
   
   
   
   
   
   
   
  
  
   
   
  }
?>