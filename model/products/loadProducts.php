<?php
  class LoadProductsModel extends Model{
   public function __construct() {
    parent::__construct();
   }
   
   
   
   public function loadProductsFromBase($limit = false){
       $this->tables['products'] = new ODB('bm_product');
	   $conditions = array();
       if($limit){
	       $conditions['limit'] = $limit;
       }

       
	   $a = $this->tables['products']->get(
	   		'*',$conditions
	   );
	   for($i=0;$i<count($a);$i++){
		   $a[$i]['preview'] = DIR_IMAGE_PRODUCTS.$a[$i]['preview'];
		   $a[$i]['tid'] = HTTP_SERVER.PRODUCT_ITEM_LINK.$a[$i]['tid'];

		}
	   return $a;
   }
   
    
    
    public function loadRandomProductsFromBase($limit){
       $this->tables['products'] = new ODB('bm_product');
	   $ids = $this->tables['products']->getAllId();
       $in = $this->getRandomRange($limit,$ids);
       $in = implode(",",$in); 

	   $a = $this->tables['products']->get(
	   		'*',
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
		   $a[$i]['preview'] = DIR_IMAGE_PRODUCTS.$a[$i]['preview'];
		   $a[$i]['tid'] = HTTP_SERVER.PRODUCT_ITEM_LINK.$a[$i]['tid'];
		}
		
	   return $a;
	   

   }
   
   


   public function loadProductFromBase($id){
	   $this->tables['products'] = new ODB('bm_product');
	   $a = $this->tables['products']->get(
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
	   for($i=0;$i<count($a);$i++){
		   $a[$i]['preview'] = DIR_IMAGE_PRODUCTS.$a[$i]['preview'];
		   $a[$i]['tid'] = HTTP_SERVER.PRODUCT_ITEM_LINK.$a[$i]['tid'];
		   $a[$i]['textfile'] = file_get_contents(HTTP_SERVER.'articles/'.$a[$i]['textfile'].'.txt');
		   $a[$i]['price'] = ' от '.$a[$i]['price'].',- р.';
	   }
	   return $a[0];
   }

}
?>