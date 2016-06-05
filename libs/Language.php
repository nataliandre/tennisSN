<?php
  class Language {
    public $phrases;
     
	  
   public function __construct() {
	   
	   /* load common/home language */
	    $language = (!$_SESSION[LANG]) ? DEF_LANGUAGE : $_SESSION[LANG];
	  
		$file = DOC_ROOT.DIR_LANGUAGE.$language.UILANG.'.php';
	
		
    	if(file_exists($file)){
			$_ = array();
			require($file);
			$this->phrases = $_ ;
					
			
        }else{
	        echo 'no language selected! look at your libs/config.php';
        }

	   
	   
   }
   
   
  public function load($path){
	  $language = (!$_SESSION[LANG]) ? DEF_LANGUAGE : $_SESSION[LANG];	  
		$file = DOC_ROOT.DIR_LANGUAGE.$language.$path.'.php';
    
		if (file_exists($file)) {
			$_ = array();
			require($file);
						return array_merge($this->phrases,$_);
        }else{
	        echo 'no language selected! look at your libs/config.php';
        }

  }
}
?>