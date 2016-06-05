<?php
  class Index extends Controller{
   public function __construct() {
	parent::__construct();
	
		if($this->admin()){
			$this->settings['admin']['trane_edit'] = HTTPS_SERVER.ROUTE_TRANES_EDIT; 
		}

		
//		$this->load_model('articles/load');
//		$this->settings['publikacji'] = $this->model->loadArticlesByCategory('publikatsii','main');
//		$this->settings['novosti'] = $this->model->loadArticlesByCategory('novosti','main');
//		$this->load_model('media/loadMedia');
//		$this->settings['medias'] = $this->model->loadLastTree();
//		$this->unset_model();
//		$this->load_model('trane/loadTrane');
//		$this->settings['tranes'] = $this->model->loadLastFive();
//		$this->unset_model();
		
		$this->load_model('products/loadProducts');
		$this->settings['products'] = $this->model->loadRandomProductsFromBase(4);
		$this->settings['nav_top_active'] = 1;  
       	$this->setOutput('common/home.tpl');
				  
        
        
   }
   
   
   
   
  
  
   
   
  }
?>