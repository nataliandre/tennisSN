<?php
  class Index extends Controller{
   public function __construct() {
		parent::__construct();
  		$this->settings['designNavbarType'] = $this->designNavbarTop();


	   
       	$this->setOutput('common/home.tpl');

   }

  }
