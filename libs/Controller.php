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


              //links generation
              $this->settings['linkRegistrationFirstStepAction'] = LinkRegistrationFirstStepAction;
              $this->settings['linkLoginAction'] = linkLoginAction;
              if($this->bIsAuthentificated()){
                  $this->settings['linkMainPage'] = linkMainAuthentificatedPage;
                  $this->settings['linkUserCompetitions'] = linkUserCompetitions;
                  $this->settings['linkUserGames'] = linkUserGames;
                  $this->settings['linkUserMessages'] = linkUserMessages;
                  $this->settings['linkUserPhotos'] = linkUserPhotos;
                  $this->settings['linkUserSends'] = linkUserSends;
                  $this->settings['linkUserTunes'] = linkUserTunes;

                  $this->settings['linkLogOut'] = linkLogOut;


              }else{
                  $this->settings['linkMainPage'] = linkMainPage;
              }


              
//              $lang_link= ($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : HTTP_SERVER;
//              $redirect_lang =  ($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : HTTP_SERVER;
//              $lang_link.= (stristr($lang_link,'?')) ? '&' : '?';
//              $lang_link.= LANG.'=';
              
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
              if($this->bIsAuthentificated()){
                  $this->vSetExtendedTpl('user/tpl/userProfile.tpl');
              }else{
                  $this->vSetExtendedTpl('common/tpl/mainTpl.tpl');
              }
             /* /* language inductor */
             /* if($_GET[LA $this->vSetExtendedTpl('user/tpl/userProfile.tpl');NG]){
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
             
        public function modelLoad($model){
             require 'model/'.$model.'.php';
             $model = explode('/',$model);
             $class = end($model);
             $class = $class;
             $this->modeltitle = $class;
             $this->model = new $class;
          
        }

      /**
       * @param $route
       * @return string
       */
      public  function makeUrlToController($route){
            return HTTP_SERVER.$route;
      }

        



      /**
       * @param $route
       */
        public function redirect($route){
           header("Location: ".$route);
        }

          /**
           * @param $controller
           */
        public function redirectToController($controller){
            $this->redirect(HTTP_SERVER.$controller);
        }
        
        
        
     
        
        
      public function setOutput($tpl){
           $this->setData($this->settings);
           $this->render->assign('tab_active',$this->tab_active);
           $this->render->assign('pagination',$this->pagination);
           $this->render->assign('cur_lang',$this->cur_lang);
           $this->render->assign('designNavbarType',$this->designNavbarTop());
           $this->render->display('view/'.$tpl);
      }

      /**
       * @param $route
       */
      public function vSetExtendedTpl($route){
          $this->render->assign('EXTENDER_TPL','view/'.$route);
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


      /**
       * @param $sParameterName
       * @param $sParaeterValue
       */
      public function setSessionParameters($sParameterName,$sParaeterValue){
          $_SESSION[$sParameterName] = $sParaeterValue;
      }

      /**
       * @param $sParameterName
       * @return mixed
       */
      public function getSessionParameters($sParameterName){
          return isset($_SESSION[$sParameterName]) ? $_SESSION[$sParameterName] : false;
      }

      /**
       * @param $sParameterName
       */
      public function deleteSessionParameters($sParameterName){
          unset($_SESSION[$sParameterName]);
      }


      /**
       * @return string
       */
    public function tokenGenerate(){
      $token="";
      $values="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    
      for($i=0;$i<10;$i++)
      {
        $token.=$values[rand(0,61)];
      }
        $this->setSessionParameters('token',md5($token));
        return $token;
    }

      /**
       * @param $tokenValue
       * @return bool
       */
    public function tokenCheck($tokenValue){
      return ($this->getSessionParameters('token') == md5($tokenValue)) ? true : false;
    }

      /**
       * @param $objectWithNoMethods
       * @return string
       */
      public function serealizeObject($objectWithNoMethods){
          $sSerealized = '';
          foreach ($objectWithNoMethods as $k => $v){
              $sSerealized = $k.'='.$v.'&';
          }
          return $sSerealized;
      }


      /**
       * @param $routeTpl
       * @param $data
       * @return mixed
       */
      public function getMailTemplate($routeTpl,$data){
          if( $curl = curl_init() ) {
              curl_setopt($curl, CURLOPT_URL, mailTemplateLink.$routeTpl);
              curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
              curl_setopt($curl, CURLOPT_POST, true);
              curl_setopt($curl, CURLOPT_POSTFIELDS,$this->serealizeObject($data));
              $tplBody = curl_exec($curl);
              curl_close($curl);
              return $tplBody;
          }
      }

      /**
       * @return bool
       */
      public function bEmptyPostData(){
        return (empty($_POST)) ? true : false;
      }

      /**
       * @param $path
       * set script for special code part
       */
      public function setScriptUser($path){
            $this->settings['ScriptUser'][] = $path;
      }

      /**
       * @param $path
       */
      public function setCSSUser($path){
          $this->settings['CssUser'][] = $path;
      }

      /**
       * @return mixed
       */
      public function getFlashMessage(){
          if($this->getSessionParameters('flashMessage')){
              $message = $this->getSessionParameters('flashMessage');
              $this->deleteSessionParameters('flashMessage');
              return $message;
          }
      }

      /**
       * @param $message
       */
      public function setFlashMessage($message){
          $this->setSessionParameters('flashMessage',$message);
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
          return ($_SESSION['idUser']) ? true : false;
      }

      /**
       * @param $idUser
       * this function authentificate user
       */
      public function vAuthentificateUser($idUser){
          $this->setSessionParameters('idUser',$idUser);
      }

      /**
       *
       */
      public function vLogOutUser(){
          $this->deleteSessionParameters('idUser');
      }




      /**
       * @return object
       * convert request to object
       */
      public function oGetRequestObject(){
          $object = (object) $_REQUEST;
          return $object;
      }
      
      
      
      
      
      
      
  }
?>