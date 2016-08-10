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


      public function saveParam(){
          if($this->bIsAuthentificated()) {
              $data = $this->oGetRequestObject();
              $UserModel = Factory::ModelFactory('user/UserModel');
              $UserModel->setParametr($data,$this->getCurrentUser());
          }
      }

      public function saveTournamentParam(){
          if($this->bIsAuthentificated()) {
              $data = $this->oGetRequestObject();
              $tournamentId = $data->tournamentId;
              $TournamentModel = Factory::ModelFactory('tournament/TournamentModel');
              $Tournament  =  $TournamentModel->getTournamentById($tournamentId);
              if($Tournament->head_id == $this->getCurrentUser()){
                  $TournamentModel->setParametr($data,$tournamentId);
              }
          }
      }


      public function saveClubParams()
      {
          if($this->bIsAuthentificated()) {
              $data = $this->oGetRequestObject();
              $ClubId = $data->clubId;
              $ClubModel = Factory::ModelFactory('club/ClubModel');
              $Club  =  $ClubModel->getClubById($ClubId);
              if($Club->userId == $this->getCurrentUser()){
                  $ClubModel->setParametr($data,$ClubId);
              }
          }
      }

      
      
      public function confirmGamesRequest(){
          if($this->bIsAuthentificated()) {
              $data = $this->oGetRequestObject();
              $GamesModel = Factory::ModelFactory('games/GamesModel');
              $GamesModel->vConfirmGameById($data,$this->getCurrentUser());
          }
      }

      public function deleteGamesRequest()
      {
          if($this->bIsAuthentificated()) {
              $data = $this->oGetRequestObject();
              $GamesModel = Factory::ModelFactory('games/GamesModel');
              $GamesModel->vDeleteGameById($data,$this->getCurrentUser());
          }
      }

      public function failureGamesRequest()
      {
          if($this->bIsAuthentificated()) {
              $data = $this->oGetRequestObject();
              $GamesModel = Factory::ModelFactory('games/GamesModel');
              $GamesModel->vFailureGameByIdWithoutVerification($data->gameId);
          }
      }

      public function unconfirmGamesRequest(){
          if($this->bIsAuthentificated()) {
              $data = $this->oGetRequestObject();
              $GamesModel = Factory::ModelFactory('games/GamesModel');
              $GamesModel->vUnConfirmGameById($data,$this->getCurrentUser());
          }
      }

      public function iWantToCancelRequest()
      {
          if($this->bIsAuthentificated()) {
              $data = $this->oGetRequestObject();
              $GamesModel = Factory::ModelFactory('games/GamesModel');
              $GamesModel->forceCancelRequest($data,$this->getCurrentUser());
          }
      }


      public function confirmOpponentGameResults()
      {
          if($this->bIsAuthentificated()) {
              $data = $this->oGetRequestObject();
              $GamesResultsModel = Factory::ModelFactory('games/GamesResultsModel');
              $GamesResults = $GamesResultsModel->getGameResultsById($data->gameResultId);
              $GamesResultsModel->confirmOpponentGameResults($data,$this->getCurrentUser());
              $this->_sendGameResultsConfirmMail(
                  $GamesResults->game_id->user_id->email,
                  $GamesResults->game_id->id
              );
              
          }
      }
      
      public function addUserToClub()
      {
          $data = $this->oGetRequestObject();
          $ClubRelationModel = Factory::ModelFactory('club/ClubRelationModel');
          $ClubRelationModel->addClubRelation($this->getCurrentUser(),$data->clubId);
          $Informer = new Informer("Вы стали участником клуба!");
          echo $Informer->getSuccessMessage();
      }


      public function deleteUserFromClub()
      {
          $data = $this->oGetRequestObject();
          $ClubRelationModel = Factory::ModelFactory('club/ClubRelationModel');
          $ClubRelationModel->deleteClubRelation($this->getCurrentUser(),$data->clubId);
          $Informer = new Informer("Вы вышли из клуба!");
          echo $Informer->getSuccessMessage();
      }

      public function addClubNews()
      {
          $data = $this->oGetRequestObject();
          $ClubsModel = Factory::ModelFactory('club/ClubModel');
          $Club = $ClubsModel->getClubById($data->clubId);
          if($Club->userId == $this->getCurrentUser())
          {
              $ClubNewsModel = Factory::ModelFactory('club/ClubNewsModel');
              $ClubNewsModel->addNews($data);
          }
      }

      private function _sendGameResultsConfirmMail($email,$gameId)
      {
          $MailData['gameId'] =  $gameId;
          $tplBody = $this->getMailTemplate('gameResultsConfirmed', (object)$MailData);
          $mailer = new Mailer($email, 'Результаты игры подтверждены', $tplBody);
          $mailer->send();
      }
   
   
   

   
   
   
   
  
  
   
   
  }
?>