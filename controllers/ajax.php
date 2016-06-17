<?php
  class Ajax extends Controller{
      private $_data;

   public function __construct() {
	   parent::__construct();
       if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
           echo 'Permission denied';
           die;
       }
   }

      /**
       * @return bool
       */
      public function activationCodeCheck(){
          $data = $this->oGetRequestObject();
          $isEquals = ($this->getSessionParameters('token') == md5($data->activationCode));
          if($isEquals){
              $informer = new Informer('Email подтверждено');
              echo $informer->getSuccessMessage();
          }else{
              $informer = new Informer('Код активации не верний');
              echo $informer->getErrorMessage();
          }
      }
      
      public function addFriend($secondUser){
          if($secondUser != "" && $this->bIsAuthentificated()) {
              $FriendsModel = $this->_getAddKillAbstract($secondUser);
              if ($FriendsModel) {
                  $FriendsModel->setFriendsRequest($this->_data);
              } else {
                  echo ErrorsDetector::errorCantGetDataFromBase();
              }
          }
      }

      public function killFriendRequest($secondUser){
          if($secondUser != "" && $this->bIsAuthentificated()) {
              $FriendsModel = $this->_getAddKillAbstract($secondUser);
              if ($FriendsModel) {
                  $FriendsModel->killFriendsRequest($this->_data);
              } else {
                  echo ErrorsDetector::errorCantGetDataFromBase();
              }
          }
      }


      private function _getAddKillAbstract($secondUser){
        $data = $this->oGetRequestObject();
        if(md5($data->hash) == md5($this->getSessionParameters('hashUser'))) {
            $data->firstUser = $this->getSessionParameters('idUser');
            $data->secondUser = $secondUser;
            $FriendsModel = $this->modelLoadToVar('friends/FriendsModel');
            $this->_data = $data;
            return $FriendsModel;
        }else{
            return false;
        }
      }

      public function confirmUserAdd($secondUser){
          if($secondUser != "" && $this->bIsAuthentificated()) {
              $FriendsModel = $this->_getAddKillAbstract($secondUser);
              if ($FriendsModel) {
                  $FriendsModel->confirmFriendsRequest($this->_data);
              } else {
                  echo ErrorsDetector::errorCantGetDataFromBase();
              }
          }
      }

      public function deleteFriendRel($secondUser){
          if($secondUser != "" && $this->bIsAuthentificated()) {
              $FriendsModel = $this->_getAddKillAbstract($secondUser);
              if ($FriendsModel) {
                  $FriendsModel->deleteFriendsRequest($this->_data);
              } else {
                  echo ErrorsDetector::errorCantGetDataFromBase();
              }
          }
      }





      public function sendMessage($userId){
          if($userId != "" && $this->bIsAuthentificated()) {
              $data = $this->oGetRequestObject();
              $data->recipientId = $userId;
              $data->senderId = $this->getCurrentUser();
              if(md5($data->hash) == md5($this->getSessionParameters('hashUser'))){
                  $MessagesModel = $this->modelLoadToVar('messages/MessagesModel');
                  $MessagesModel->sendMessage($data);
              }else{
                  echo ErrorsDetector::errorCantGetDataFromBase();
              }
          }
      }



   
   
   
   

   
   
   
   
  
  
   
   
  }
?>