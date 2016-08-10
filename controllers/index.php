<?php
  class Index extends Controller{
   public function __construct() {
		parent::__construct();

        $UsersModel = Factory::ModelFactory('user/UserModel');
        $this->settings['countPlayers'] = count($UsersModel->getAllUsers('0'));
        $TournamentsModel = Factory::ModelFactory('tournament/TournamentModel');
        $this->settings['countTournaments'] = count($TournamentsModel->getAllTournaments());



       	$this->setOutput('common/home.tpl');
    }
   }
