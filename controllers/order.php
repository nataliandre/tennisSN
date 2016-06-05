<?php
  class Order extends Controller{
   public function __construct() {
	parent::__construct(); 
   }
   
   public function make(){
	   $time = time();
	   $_POST['orderTime'] = date("Y-m-d H:i:s");
	   $_POST['orderStatus'] = "Заказ взят в работу";
	   file_put_contents('orders/order'.$time.'.json',json_encode($_POST));
       $this->settings['orderNum'] = $time;
	   $this->settings['orderLinkFind'] = ROUTE_FIND_ORDER.'/'.$time;

	   $this->load_model('products/loadProducts');
	   $this->settings['products'] = $this->model->loadRandomProductsFromBase(2);

	   $this->setOutput('order/make.tpl');
   }


   public function find($num = false){
	   $this->load_model('products/loadProducts');
	   $this->settings['products'] = $this->model->loadRandomProductsFromBase(2);
	   if($num){
		   $this->settings['order'] = json_decode(file_get_contents('orders/order'.$num.'.json'));
		   $this->settings['orderNum'] = $num;
		   $this->setOutput('order/status.tpl');
	   }else{
		   $this->settings['actionForm'] = ROUTE_FIND_ORDER;
		   $this->setOutput('order/find.tpl');
	   }
   }

  }
