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


        private $_requiredFiles;
        
        
        /* if you have other imagination about languages interface remove this*/
        public $pagination = 'view/elements/pagination.tpl';
        
        /* this element for tab active*/
        public $tab_active;
      
        
        public function __construct() {
              
              
              $this->functions                   = new Functions();
              $Config = new Config('config/config.json');


             /**
              *  {include file="{$routeAvatarTpl}" routeUserPage=$routeUserPage class="avatarMainPage" User=$user }
              */
              $this->settings['routeAvatarTpl'] = '../elements/images/avatar.tpl';

             /**
              * {include file="{$routeAvatarClubsTpl}" routeClubPage=$routeClubPage class="avatarMainPage" Club=$Club }
              */
              $this->settings['routeAvatarClubsTpl'] = '../elements/images/avatarClubs.tpl';

            /**
             * {include file="{$routeAvatarTournamentTpl}" routeClubPage=$routeTournamentPage class="avatar80x80" Tournament=$Tournament }
             */
              $this->settings['routeAvatarTournamentTpl'] = '../elements/images/avatarTournament.tpl';


            /**
             * {include file="{$route404tpl}" message="Message"}
             */
            $this->settings['route404tpl'] = '../elements/empty/404.tpl';

            /**
             * main framework language
             */
            $this->settings['LANGUAGE'] = 'ru';





            

              //links generation
              $this->settings['linkRegistrationFirstStepAction'] = LinkRegistrationFirstStepAction;
              $this->settings['linkLoginAction'] = linkLoginAction;
              $this->settings['linkFrogotAction'] = $this->makeUrlToController('forgot/getEmail');
              $this->settings['ajaxController'] = $this->makeUrlToController('ajax/');

            $this->settings['routeTournamentPage'] = $this->makeUrlToController('tournament/view/');
            $this->settings['routeUserPage'] = $this->makeUrlToController('person/view/');

              $this->settings['fIsAuthentificatedUser'] = $this->bIsAuthentificated();
              if($this->settings['fIsAuthentificatedUser']){

                  $this->settings['linkUserCompetitions'] = linkUserCompetitions;
                  $this->settings['linkUserGames'] = $this->makeUrlToController('games/incomingRequests');
                  $this->settings['linkUserMessages'] = linkUserMessages;
                  $this->settings['linkUserPhotos'] = linkUserPhotos;
                  $this->settings['linkUserSends'] = linkUserSends;
                  $this->settings['linkUserTunes'] = linkUserTunes;
                  $this->settings['linkUserPage'] = $this->makeUrlToController('user/page');
                  $this->settings['linkEventsPage'] = $this->makeUrlToController('events/view');
                  $this->settings['linkUserClubes'] = $this->makeUrlToController('user/club/');
                  
                  $this->settings['routeClubPage'] = $this->makeUrlToController('club/view/');

                  $this->settings['linkLogOut'] = linkLogOut;



                  $this->settings['linkFriendsPage'] = $this->makeUrlToController('users/friends');
                  $this->settings['linkMessagesHistory'] = $this->makeUrlToController('messages/send/');

                  $this->getNewFriendsCount();

              }else{

              }
              $this->settings['linkMainPage'] = linkMainPage;
              $this->settings['linkClubsPage'] = $this->makeUrlToController('club/catalog');
              $this->settings['linkPlayersPage'] = $this->makeUrlToController('players');
              $this->settings['linkTournamentsPage'] = $this->makeUrlToController('tournament/catalog');
              $this->settings['linkAddQuickGame'] = $this->makeUrlToController('quickGame/add/');


              
              $this->tab_active =  $_GET['url'];
              

              require_once('smarty.php');
              $this->render = $smarty;
              $this->render->assign('Config',$Config);


              if($this->bIsAuthentificated()){
                  $this->vSetExtendedTpl('user/tpl/userProfile.tpl');
              }else{
                  $this->vSetExtendedTpl('common/tpl/mainTpl.tpl');
              }


             
              
        }
        



        public function getNewFriendsCount(){
            $FriendsModel  = $this->modelLoadToVar('friends/FriendsModel');
            $this->settings['iCountNewFriends'] = $FriendsModel->getNewFriendsRequests($this->getCurrentUser());
            $MessagesModel = Factory::ModelFactory('messages/MessagesModel');
            $this->settings['iCountNewMessages'] = $MessagesModel->getNewMessagesCount($this->getCurrentUser());
            $GamesModel = Factory::ModelFactory('games/GamesModel');
            $this->settings['iCountNewGames'] = $GamesModel->getCountGameRequests($this->getCurrentUser());
        }

        public function getCurrentUser(){return $this->getSessionParameters('idUser');}

             
        public function modelLoad($model){
             $this->correctRequireClass($model);
             $model = explode('/',$model);
             $class = end($model);
             $this->modeltitle = $class;
             $this->model = new $class;
          
        }

        public function correctRequireClass($filePath){
            $FullFilePath = 'model/'.$filePath.'.php';
            $GLOBALS['REQUIRED']->setREQUIRED($FullFilePath);
        }


        public function modelLoadToVar($model,$params = null){
            $this->correctRequireClass($model);
            $model = explode('/',$model);
            $class = end($model);
            return new $class($params);
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
           $this->render->assign('EXTENDER',$this->extender);
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

      public function getSessionParameterWithDeletingResult($sParameterName)
      {
          $SessionParameter = $this->getSessionParameters($sParameterName);
          $this->deleteSessionParameters($sParameterName);
          return $SessionParameter;
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
        $token = $this->generateRandomStringValue();
        $this->setSessionParameters('token',md5($token));
        return $token;
    }




      /**
       * @return string
       */
      public function generateRandomStringValue(){
          $token="";
          $values="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

          for($i=0;$i<10;$i++)
          {
              $token.=$values[rand(0,61)];
          }
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
       * @param $userId
       */
      public function hashGenerate($userId){
          $hash = $this->generateRandomStringValue();
          $this->setSessionParameters('hashUser',$hash);

          $user = R::load('tbluser',$userId);
          $user->hash = md5($hash);
          R::store($user);
      }

      /**
       * @return bool
       */
      public function checkSessionHash(){

          $userId = $this->getSessionParameters('idUser');
          $user = R::load('tbluser',$userId);
          return (md5($this->getSessionParameters('hashUser'))==$user->hash) ? true : false ;
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
       * set script for special code part
       */
      public function setEndScriptUser($path){
          $this->settings['EndScriptUser'][] = $path;
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
          $this->hashGenerate($idUser);
      }

      /**
       *
       */
      public function vLogOutUser(){
          $this->deleteSessionParameters('idUser');
          $this->deleteSessionParameters('hashUser');
      }




      /**
       * @return object
       * convert request to object
       */
      public function oGetRequestObject(){
          $object = (object) $_REQUEST;
          return $object;
      }

      /**
       * @return object
       * convert Files to object
       */
      public function oGetFilesObject(){
          $object = (object) $_FILES;
          return $object;
      }

      public function getRegistrationValidator(){
          require 'libs/Validators/RegistrationValidator.php';
      }
      
      
      
      
      
      
      
  }
?>