<?php
  class Products extends Controller{
   public function __construct() {
	parent::__construct();
   }
   
   
   public function catalog(){
        $this->load_model('products/loadProducts');
        $this->settings['products'] = $this->model->loadProductsFromBase();
        $this->setOutput('products/main.tpl');
   }


   public function item($tid){
       $this->load_model('products/loadProducts');
       $this->settings['product'] = $this->model->loadProductFromBase($tid);
       $this->settings['products'] = $this->model->loadRandomProductsFromBase(2);
       $this->settings['actionForm'] = ROUTE_MAKE_ORDER;
       $this->setOutput('products/item.tpl');
   }

  }
?>