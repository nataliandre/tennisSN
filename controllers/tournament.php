<?php
class tournament extends Controller{
    public function  __construct() {
        parent::__construct();
        /*Links{ */
            $TournamentLinks['linkToTournamentView'] = $this->makeUrlToController('tournament/view/');
            $TournamentLinks['linkToTournamentPhotos'] = $this->makeUrlToController('tournament/photos/');
            $TournamentLinks['linkToTournamentTable'] = $this->makeUrlToController('tournament/table/');
            $TournamentLinks['linkToTournamentTunes'] = $this->makeUrlToController('tournament/tunes/');
            $TournamentLinks['linkAddNewPhoto'] = $this->makeUrlToController('photos/add?type=tournamentPhotos&entityId=');
            $TournamentLinks['linkAddAvatarPhoto'] = $this->makeUrlToController('photos/add?type=tournamentPhotoAvatar&entityId=');
            $this->settings['TournamentLinks'] = (object) $TournamentLinks;
            $this->settings['currentUser'] = $this->getCurrentUser();
            $this->settings['photosPath'] = $this->makeUrlToController($this->_upload_trumb_dir);
        /* } */
    }

    private $_upload_trumb_dir = 'files/images/gallery/';
    private $_photos_on_main_page = 4;

    public function add(){
        $CityModel = Factory::ModelFactory('city/CityModel');
        $this->settings['cities'] = $CityModel->getAllCities();
        $this->settings['userId'] = $this->getCurrentUser();
        $this->settings['startDateDatapicker'] = $this->_generateStartDateDatepicker();
        $this->settings['endDateDatapicker'] = $this->_generateEndDateDatepicker();
        $this->settings['FlashMessage'] = $this->getFlashMessage();
        $this->settings['actionNextStep'] = $this->makeUrlToController('tournament/doAddAction');
        $this->setOutput('tournament/add.tpl');
    }




    public function doAddAction(){
        $data = $this->oGetRequestObject();
        $FormAddValidator = Factory::ValidatorsFactory('FormAddValidator');
        $validationResult = $FormAddValidator::validateTournamentAddForm($data);
        if($validationResult){
            $this->setFlashMessage($validationResult);
            $this->redirectToController('tournament/add');
            die;
        }
        $ClubModel = Factory::ModelFactory('tournament/TournamentModel');
        $tournamentId = $ClubModel->addTournament($data);
        $this->redirect($this->makeUrlToController('tournament/view/').$tournamentId);
    }


    public function photos($tournamentId){
        $TournamentModel = Factory::ModelFactory('tournament/TournamentModel');
        $TournamentInfo = $TournamentModel->getTournamentById($tournamentId);
        if($TournamentInfo) {
            $this->settings['tournament'] = $TournamentInfo;
            $this->settings['activeTab'] = 'TournamentPhotos';
            $PhotosTournamentModel = Factory::ModelFactory('photos/PhotosTournamentModel');
            $this->settings['tournamentPhotos'] = $PhotosTournamentModel->getTournamentPhotos($tournamentId);
            $this->setOutput('tournament/photos.tpl');
        }
        else
        {
            $this->setOutput('tournament/404.tpl');
        }
    }




    public function table($tournamentId){
        $TournamentModel = Factory::ModelFactory('tournament/TournamentModel');
        $TournamentInfo = $TournamentModel->getTournamentById($tournamentId);
        if($TournamentInfo) {
            $this->settings['tournament'] = $TournamentInfo;
            $this->settings['activeTab'] = 'TournamentTable';

            $this->setOutput('tournament/tournamentTable.tpl');
        }
        else
        {
            $this->setOutput('tournament/404.tpl');
        }
    }

    public function tunes($tournamentId){
        $this->setScriptUser('setters/tunesTournamentSetter.js');
        $this->settings['sessionHash'] = $this->getSessionParameters('hashUser');
        $TournamentModel = Factory::ModelFactory('tournament/TournamentModel');
        $TournamentInfo = $TournamentModel->getTournamentById($tournamentId);
        if($TournamentInfo) {
            $this->settings['tournamentId'] = $tournamentId;
            $this->settings['tournament'] = $TournamentInfo;
            $this->settings['activeTab'] = 'TournamentTunes';
            $CityModel = Factory::ModelFactory('city/CityModel');
            $this->settings['cities'] = $CityModel->getAllCities();
            $this->setOutput('tournament/tournamentTunes.tpl');
        }
        else
        {
            $this->setOutput('tournament/404.tpl');
        }
    }

    public function catalog()
    {
        $this->settings['headNavActive'] = 'TournamentsHeadNavActive';
        $TournamentsModel = Factory::ModelFactory('tournament/TournamentModel');
        $this->settings['tournaments'] = $TournamentsModel->getAllTournaments();
        $this->setOutput('tournament/indexTournament.tpl');
    }


    public function search(){
        $data = $this->oGetRequestObject();
        $TournamentModel = Factory::ModelFactory('tournament/TournamentModel');
        $this->settings['searchAction'] = $this->makeUrlToController('tournament/search');
        if(empty($data->query)){$this->settings['tournaments'] = $TournamentModel->getAllTournaments();}
        else
        {
            $this->settings['tournaments'] = $TournamentModel->getTournamentsByQuery($data->query);
            $this->settings['QUERY'] = $data->query;
        }
        $this->setOutput('tournament/searchResults.tpl');
    }
    
    
    
    
    public function view($tournamentId){
        $TournamentModel = Factory::ModelFactory('tournament/TournamentModel');
        $TournamentModel->increaseTournamentViews($tournamentId);
        $TournamentInfo = $TournamentModel->getTournamentById($tournamentId);
        if($TournamentInfo) {
            $UserModel = Factory::ModelFactory('user/UserModel');
            $this->settings['tournament'] = $TournamentInfo;
            $this->settings['clubCreator'] = $UserModel->getUserFromId($TournamentInfo->head_id);

            $PhotosTournamentModel = Factory::ModelFactory('photos/PhotosTournamentModel');
            $this->settings['tournamentPhotos'] = $PhotosTournamentModel->getTournamentPhotos($tournamentId,$this->_photos_on_main_page);

            $this->settings['activeTab'] = 'TournamentView';
            if($this->bIsAuthentificated()){$this->settings['buttonTakePart']= true;}
            /* $ClubRelModel  = Factory::ModelFactory('club/ClubRelationModel');
            $this->settings['usersInClub'] = $ClubRelModel->getUsersFromClub($$TournamentInfo->id,6);
            $this->settings['countUsersInClub'] = $ClubRelModel->getCountUsersFromClub($ClubInfo->id);
            $this->settings['isTakePart'] = false;
            if($this->settings['clubCreator']->id == $this->getCurrentUser()){
                $this->settings['isTakePart'] = true;
            }
            if($this->_checkIfAuthUserIsInClub($this->settings['usersInClub'])){$this->settings['isTakePart'] = true;}
            */
            $this->setOutput('tournament/view.tpl');
        }else{
            $this->setOutput('tournament/404.tpl');
        }
    }


    private function _generateStartDateDatepicker(){
        return $this->_generateDatapicker('startDate','startDateDataPicker');
    }

    private function _generateEndDateDatepicker(){
        return $this->_generateDatapicker('endDate','endDateDataPicker');
    }


    private function _generateDatapicker($name,$id){
        $this->setScriptUser('datapicker/datepicker.min.js');
        $this->setCSSUser('datapicker/datepicker.min.css');
        $params['type'] = 'tMDB';
        $params['name'] = $name;
        $params['id'] = $id;
        $params['value'] = date("d.m.Y");
        return HTMLGenerator::datapickerGenerator($params);
    }


    private function _checkIfAuthUserIsTournamentMaker($usersInClub){
        $CurrentUserId = $this->getCurrentUser();
        foreach ($usersInClub as $User){ if($User == $CurrentUserId){return true;}}
        return false;
    }
}
