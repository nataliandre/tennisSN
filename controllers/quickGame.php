<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 07.08.16
 * Time: 23:39
 */
class quickGame extends Controller
{

    public function  __construct()
    {
        parent::__construct();
    }
    
    public function add($UserId)
    {
        $this->_generateDataPicker();
        $this->_setupUsers($UserId);
        $this->_setupCities();
        $this->_setupLinks();
        

        $this->setOutput('quickGame/quickGame.tpl');
    }


    public function doAddResult()
    {
        $data = $this->oGetRequestObject();
        $GameModel = Factory::ModelFactory('games/GamesModel');
        $NewGameId = $GameModel->setGameRequest($data,$this->getCurrentUser());
        $GameModel->setQuickGame($NewGameId);
        $GameResultsModel = Factory::ModelFactory('games/GamesResultsModel');
        $data = (array)$data;
        $data['gameId'] = $NewGameId;
        $data = (object)$data;
        $GameResultsModel->addGameResult($data);
        $this->redirect($this->makeUrlToController('games/fastGames'));
    }


    
    
    
    
    
    private function _setupUsers($opponentId)
    {
        $userId = $this->getCurrentUser();
        $UserModel = Factory::ModelFactory('user/UserModel');
        $this->settings['User'] = (object)$UserModel->getUserFromId($userId);
        $this->settings['Opponent'] = (object)$UserModel->getUserFromId($opponentId);
    }

    private function _setupCities()
    {
        $CityModel = Factory::ModelFactory('city/CityModel');
        $this->settings['cities'] = $CityModel->getAllCities();
    }

    private function _setupLinks()
    {
        $this->settings['actionNextStep'] = $this->makeUrlToController('quickGame/doAddResult');
    }



    private function _generateDataPicker(){
        $this->setScriptUser('datapicker/datepicker.min.js');
        $this->setCSSUser('datapicker/datepicker.min.css');
        $params['type'] = 'tMDB';
        $params['name'] = 'gameDate';
        $params['id'] = 'gameDate';
        $params['value'] = date("d.m.Y");
        $this->settings['dataPicker'] = HTMLGenerator::datapickerGenerator($params);
    }
}