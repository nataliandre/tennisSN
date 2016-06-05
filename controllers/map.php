<?php
  class Map extends Controller{
   public function __construct()
   {
       parent::__construct();
       $this->setOutput('map/main.tpl');
   }
   
  }
?>