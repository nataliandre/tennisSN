<?php
class mailTemplates extends Controller{
    private $_routeMailTplFolder = 'mailTemplates/';
    public function __construct()
    {
        parent::__construct();
        if($this->bEmptyPostData()){
            echo 'Permission denied';
            die;
        }

    }

    public function confirmRegistration()
    {
        $data = $this->oGetRequestObject();
        $this->settings['data'] = $data;
        $this->settings['registrationLink'] = $this->makeUrlToController('registration/confirmMail?confirmCode='.$data->activationCode);
        $this->_setMailTemplate('confirmRegistration');
    }

    public function changePassword()
    {
        $data = $this->oGetRequestObject();
        $this->settings['confirmLink'] = $this->makeUrlToController('forgot/confirmPassword?confirmCode='.$data->confirmCode);
        $this->_setMailTemplate('forgotPassword');
    }

    public function gameResultsConfirmed()
    {
        $data = $this->oGetRequestObject();
        $GameModel = Factory::ModelFactory('games/GamesModel');
        $this->settings['game'] = $GameModel->getGameFromId($data->gameId);
        
        $this->_setMailTemplate('resultsWasConfirmed');
    }

    public function gameRequest()
    {
        $data = $this->oGetRequestObject();
        $this->settings['data'] = $data;
        $GameModel = Factory::ModelFactory('games/GamesModel');
        $this->settings['game'] = $GameModel->getGameFromId($data->gameId);
        $this->settings['confirmGameLink'] = $this->makeUrlToController('gamesService/confirmGameRequest/').$data->gameId;
        $this->settings['cancelGameLink'] = $this->makeUrlToController('gamesService/cancelGameRequest/').$data->gameId;
        $this->settings['profileLink'] = $this->makeUrlToController('person/view/');
        $this->_setMailTemplate('confirmGameRequest');

    }

    public function gameWasConfirmed()
    {
        $data = $this->oGetRequestObject();
        $this->settings['data'] = $data;
        $GameModel = Factory::ModelFactory('games/GamesModel');
        $this->settings['game'] = $GameModel->getGameFromId($data->gameId);
        $this->_setMailTemplate('gameWasConfirmed');
    }

    /**
     * @param $nameMailTemplate string
     */
    private function _setMailTemplate($nameMailTemplate){
        $this->setOutput($this->_routeMailTplFolder.$nameMailTemplate.'.tpl');
    }


}