<?php
  class Controller {
        public $model;
        private $modeltitle;
        public $template;
        public $settings= array() ;
        protected $data;
        public $output;
        public $child;
        public $functions;
        public $languages;
        private $model_main;
        public $render;
        public $extender  = 'view/common/body.tpl';
        public $cur_lang;
        
        
        /* if you have other imagination about languages interface remove this*/
        public $pagination = 'view/elements/pagination.tpl';
        
        /* this element for tab active*/
        public $tab_active;
      
        
        public function __construct() {
              
              require('libs/Functions.php');
              $this->functions                   = new Functions();
              $this->settings['SERVER_ROOT'] = HTTPS_SERVER;
              $this->settings['TRANE_LINK'] = HTTPS_SERVER.ROUTE_TRANES;
              $this->settings['INSTITUT__LINK'] = HTTPS_SERVER.INSTITUT__LINK;
              $this->settings['CONTACTS__LINK'] = HTTPS_SERVER.CONTACTS__LINK;
              $this->settings['NOVOSTI_LINK'] = HTTPS_SERVER.ARTICLE_LINK.'novosti';
              $this->settings['PUBLIKACJI_LINK'] = HTTPS_SERVER.ARTICLE_LINK.'publikatsii';
              $this->settings['MEDIA_LINK'] = HTTPS_SERVER.MEDIA_LINK;
              $this->settings['BOOKS_LINK'] = HTTPS_SERVER.BOOKS_LINK;
              $this->settings['ADMIN_UPLOAD'] = HTTPS_SERVER.ADMIN_UPLOAD;
              $this->settings['ADMIN_FILES'] = HTTPS_SERVER.ADMIN_FILES;
              
               $this->settings['BOOKS_LINK_VIEW'] = HTTPS_SERVER.BOOKS_LINK_VIEW;
              
              
              
              
              $lang_link= ($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : HTTP_SERVER;
              $redirect_lang =  ($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : HTTP_SERVER;
              $lang_link.= (stristr($lang_link,'?')) ? '&' : '?';
              $lang_link.= LANG.'=';
              
              $this->tab_active =  $_GET['url'];
              
              /*$languag = explode(',', LANGUAGES);
              for($i=0;$i<count($languag);$i++){
	              $languages[$i]['title'] = $languag[$i];
	              $languages[$i]['link']  =  $lang_link.$languag[$i].'/';
              }
              $this->settings['languages'] = $languages;
              */
              
              
              require_once('smarty.php');
              $this->render = $smarty;
              $this->render->assign('EXTENDER',$this->extender);
              
              
              
              
            

              
              
              
             /* /* language inductor */
             /* if($_GET[LANG]){
	              $_SESSION[LANG] = $_GET[LANG];
	              $this->cur_lang=$_SESSION[LANG];
	              header("Location: ".$redirect_lang);

              }else{
	              $this->cur_lang = trim((!$_SESSION[LANG]) ? DEF_LANGUAGE : $_SESSION[LANG],'/');
	              
              }
              /* end of language inductor*/
              /*require('libs/Language.php');
              $this->languages                   = new Language();*/
              

                     
             
              
        }
        
    /*    public function languageSet($route){
	                       $this->settings = array_merge($this->settings, $this->languages->load($route));
        }
        
        */
             
        public function load_model($model){
             require 'model/'.$model.'.php';
             $model = explode('/',$model);
             $class = end($model);
             $class = $class.'Model';
             $this->modeltitle = $class;
             $this->model = new $class;
          
        }
        
        
        
        
        
        
        

        
        
        public function preRender($element,$array = false ){
	          if($array){
	          			extract($array, EXTR_PREFIX_SAME, "hr");
              }
              ob_start();
        
              require('view/'.$element.'.php');
        
              $varible = ob_get_contents();
  
              ob_end_clean();
	          return $varible;
	        
	        
        }
        
        
      

        
        

             
        
        public function redirect($route){
           header("Location: ".$route);
        }
        
        
        
     
        
        
      public function setOutput($tpl){
           $this->setData($this->settings);
           $this->render->assign('tab_active',$this->tab_active);
           $this->render->assign('pagination',$this->pagination);
           $this->render->assign('cur_lang',$this->cur_lang);
           $this->render->assign('designNavbarType',$this->designNavbarTop());
           $this->render->display('view/'.$tpl);
      }
      
      public function setData($array){
	      foreach($array as $key=>$value){
		      $this->render->assign($key,$value);
	      }
      }
      
 
      
            
      public function unset_model(){
             unset($this->model);
      }
      
       public function setErrorLog(){
          $url        = explode('/',$_GET['url']);
          $str_return = '';
          for($i=0;$i<count($url);$i++){ $str_return.= $url[$i].'-';}
          return $str_return;
          
        }
        
        
        public function admin(){
	        return $_SESSION['admin'];
        }
      
      
       
    public function generateToken(){
      
      $token="";
      $values="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    
      for($i=0;$i<10;$i++)
      {
        $token.=$values[rand(0,61)];
      }
      
      $_SESSION['token'] = md5($token);
      $a['token'] = $token;
      $a['token_md5'] =  md5($token);
      return $a;
    }
    
    
    
   
    
    
    
    public function checkToken($token){
      if($_SESSION['token'] == md5($token)){
        return true;
      }
      else{
        return false;
      }
    }
    
    
    
    
   
     
    
    
    
    public function loadModel($array){
              extract($array, EXTR_PREFIX_SAME, "hr");

              ob_start();
              
              require('view/modal/modal.php');
        
              $this->output = ob_get_contents();
  
              ob_end_clean();
              
              return $this->output; 
      
    }
    
    
    
    public function loadParticle($dir,$array=false){
      if($array){
              extract($array, EXTR_PREFIX_SAME, "hr");
      }

              ob_start();
              
              require('view/modal/'.$dir.'.php');
        
              $this->output = ob_get_contents();
  
              ob_end_clean();
              
              return $this->output; 
    }
    
    
    
    public function returnReloader($location,$timeout = 3000){
	    $str = '<script>';
	    $str.= 'setTimeout(function(){window.location.replace("'.$location.'");},'.$timeout.');';
	    $str.= '</script>';
	    return $str;
    }
    
  public function file_get_content($file){
	  
	  //echo 'view/elementy/'.$file.'.txt';
	  $fp = fopen('view/elementy/'.$file.'.txt', "r");
	 
	  $mytext = '';
      while(!feof($fp)) { 
	    $mytext.= fgets($fp);
	  } 
	  fclose($fp);
	  //echo $mytext; 
	  return $mytext;
  }
  
 public function file_set_content($content,$file){
	  
	  
	  $fp = fopen('view/elementy/'.$file.'.txt',  'w');
	  fwrite($fp,$content);
	  fclose($fp);
	 
  }
    

    
    
    
    
    /* textualize functions */
    
    
    public function makeAroudQuotes($a){
	    return '&#171;'.$a.'&#187;'; 
    }
    
    public function mAQs($a){ return $this->makeAroudQuotes($a);}
    
    
    
    public function prepare($source){
	    return str_replace("\\'","'",$source);  
    }
     public function preparet($source){
	     return str_replace('\\"','"',$source);
     }
    
     
    public function deprepare($source){
	    return str_replace("'","\\'",$source);  
    }
    
     public function depreparet($source){
	     return str_replace('"','\"',$source);
     }

      /**
       * @return string
       * change navbar infuently from access rules
       */
      public function designNavbarTop(){
          return ($this->bIsAuthentificated()) ? '../navbar/navbarIsAuthentificated.tpl' : '../navbar/navbar.tpl';
      }

      /**
       * @return bool
       * this function decides if user is uthentificated
       */
      public function bIsAuthentificated(){
          return ($_SESSION['oUser']) ? true : false;
      }
      
      
      
      
      
      
      
  }
?>