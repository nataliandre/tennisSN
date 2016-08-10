<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 14.07.16
 * Time: 17:28
 */
class players extends Controller
{
    public function  __construct() {
        parent::__construct();
        if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {


            $this->settings['headNavActive'] = 'PlayersHeadNavActive';
            $this->setScriptUser('jquery.form.js');
            $UsersModel = Factory::ModelFactory('user/UserModel');
            $this->settings['newGameRequestLink'] = $this->makeUrlToController('games/add/');
            $this->settings['filtersFormAction'] = $this->makeUrlToController('players/getFiltersResults');



            $this->settings['players'] = $UsersModel->getAllUsers(0);
            $this->_setOptions();
            $this->setOutput('players/indexPlayers.tpl');
        }
    }

    private function _setOptions()
    {
        $GameLevelModel = Factory::ModelFactory('options/GameLevelModel');
        $this->settings['gameLevelArray'] = $GameLevelModel->getAll();
        $ProfessionalSkillsModel = Factory::ModelFactory('options/ProfessionalSkillsModel');
        $this->settings['professionalSkillsArray'] = $ProfessionalSkillsModel->getAll();
        $CityModel = Factory::ModelFactory('city/CityModel');
        $this->settings['cities'] = $CityModel->getAllCities();
        Factory::HelpersFactory('UserPlanHelper');
        $this->settings['DaysInWeek'] = UserPlanHelper::getDaysInWeek();
        $this->settings['DaysInWeekRu'] = UserPlanHelper::getDaysInWeekRu();
        $this->settings['CountDaysInWeek'] = count($this->settings['DaysInWeek']) - 1;
    }


    public function getFiltersResults()
    {

        $Output = array();
        $data = $this->oGetRequestObject();

        $UserModel = Factory::ModelFactory('user/UserModel');
        $Users = $UserModel->getUsersWithFilters($data);
        $Output['users'] = $Users;
        
        $Informer = new Informer('Пользователей не найдено');
        if(!$Output['users']){
            $Output['error'] = true;
            $Output['body'] = $Informer->getErrorMessage();
        }
        else{
            $Output['success'] = true;
        }
        echo json_encode($Output);
    }

}