<?php
  class Admin extends Controller{
   public function __construct() {
	parent::__construct();
	    
	    
	    

	if(!$_SESSION['admin']){    
		if($_POST['login']){
			if($_POST['login'] == 'admin12345' && $_POST['password'] == '12345' ){
			   $_SESSION['admin'] = true;
			   $this->redirect(ROUTE_ADMIN);	
			}
			else{
				$this->settings['error'] = 'Invalid user!';
			}
		}
		$this->settings['admin_route'] = ROUTE_ADMIN;
		$this->setOutput('admin/login.tpl');
    }else{
	   if(!empty($_POST)){
		   if(!isset($_GET['admin_exit'])) {
			   foreach ($_POST as $key => $value) {
				   $this->file_set_content($value, $key);
			   }
		   }else{
			   unset($_SESSION['admin']);
			   $this->redirect(HTTP_SERVER);
		   }
	   }

		if(isset($_GET['admin_exit'])) {
			unset($_SESSION['admin']);
			$this->redirect(HTTP_SERVER);
		}

		$this->settings['admin_exit_link'] =  ROUTE_ADMIN.'?admin_exit=true';
		$this->settings['footer'] = $this->file_get_content('footer');
		$this->settings['otzivi'] = $this->file_get_content('otzivi');
		$this->settings['logo'] = $this->file_get_content('logo');
		$this->settings['hero_image'] = $this->file_get_content('hero_image');

		$this->settings['smi'] = $this->file_get_content('smi');
		$this->settings['title_t'] = $this->file_get_content('title');
		$this->settings['keywords_t'] = $this->file_get_content('keywords');
		$this->settings['description_t'] = $this->file_get_content('description');
		$this->settings['sieti'] = $this->file_get_content('sieti');
	    $this->setOutput('admin/admin.tpl');
    }
   }
   
   
   
   
  
  
   
   
  }
?>