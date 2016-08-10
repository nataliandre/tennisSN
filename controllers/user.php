<?
class user extends Controller{
    public function  __construct() {
        parent::__construct();
        if(!$this->bIsAuthentificated()){
            $this->redirectToController('auth/login');
        }
        $this->settings['photosPath'] = $this->makeUrlToController($this->_upload_trumb_dir);

    }

    private $_upload_trumb_dir = 'files/images/gallery/';
    private $_photos_on_main_page = 4;

    public function page(){
        $this->tab_active = 'linkMainPage';
        $idUser = $this->getSessionParameters('idUser');
        $this->modelLoad('user/UserModel');
        $this->settings['tunesLink'] = $this->makeUrlToController('user/tunes');

        $this->settings['user'] = $this->model->getUserFromId($idUser);
        $PhotosUserModel = Factory::ModelFactory('photos/PhotosUserModel');
        $this->settings['userPhotos'] = $PhotosUserModel->getUserPhotos($this->getCurrentUser(),$this->_photos_on_main_page);
        $this->settings['userChangeAvatarRoute'] = $this->makeUrlToController('photos/add?type=userAvatar');

        $this->_getUserPlan();

        $this->setOutput('user/page.tpl');
    }





    
    
    
    public function competition(){
        $this->settings['addNewCompetition'] = $this->makeUrlToController('tournament/add');
        $this->tab_active = 'linkUserCompetitions';
        $this->settings['searchAction'] = $this->makeUrlToController('tournament/search');
        $TournamentModel = Factory::ModelFactory('tournament/TournamentModel');
        $this->settings['userTournamentsAdministrate'] = $TournamentModel->getUserTournamentsAdministrate($this->getCurrentUser());
        $this->setOutput('user/competition.tpl');
    }


    public function tunes(){
        $this->setScriptUser('setters/tunesSetter.js');
        $UserModel = Factory::ModelFactory('user/UserModel');
        $this->settings['user'] = $UserModel->getUserFromId($this->getCurrentUser());
        $this->settings['birthDateDataPicker'] = $this->_generateDatapicker($this->settings['user']);
        $this->settings['sessionHash'] = $this->getSessionParameters('hashUser');
        $this->_setTunesLinks();
        $this->_setRangePickers();

        $RatingLinkModel = Factory::ModelFactory('link/RatingLinkModel');
        $RatingLinks = $RatingLinkModel->getRatingLinksForUser($this->getCurrentUser());
        $this->settings['RatingLinks'] = $RatingLinks;
        
        $this->settings['activeCollapse'] = $this->getSessionParameterWithDeletingResult('activeCollapse');
        $this->settings['FlashMessage'] = $this->getFlashMessage();
        
        $this->_setOptionsArrays();
        $this->setOutput('user/tunes.tpl');
    }



    public function messages(){
        $this->tab_active = 'linkUserMessages';
        $MessagesModel = Factory::ModelFactory('messages/MessagesModel');
        $this->settings['userMessages'] = $MessagesModel->getMessagesCurrentUser($this->getCurrentUser());

        $UserModel =  Factory::ModelFactory('user/UserModel');

        $this->settings['currentUser'] = $UserModel->getUserFromId($this->getCurrentUser());
        $this->settings['currentDate'] = date("Y-m-d");
        $this->settings['messageSendLink'] = $this->makeUrlToController('messages/send/');
        $this->setOutput('user/messages.tpl');
    }
    public function photos(){
        $this->tab_active = 'linkUserPhotos';
        $PhotosUserModel = Factory::ModelFactory('photos/PhotosUserModel');
        $this->settings['userPhotos'] = $PhotosUserModel->getUserPhotos($this->getCurrentUser());

        $this->settings['addNewPhotoLink'] = $this->makeUrlToController('photos/add');


        $this->setOutput('user/photos.tpl');
    }
    public function sends(){
        $this->tab_active = 'linkUserSends';
        $this->setOutput('user/sends.tpl');
    }

    public function request(){
        $this->setOutput('user/request.tpl');
    }

    public function club(){

        $this->settings['addNewClubLink'] = $this->makeUrlToController('club/add');
        $ClubModel = Factory::ModelFactory('club/ClubModel');
        $this->tab_active = 'linkUserClubes';
        $this->settings['creatorClubs'] = $ClubModel->getUserCreatorClubs($this->getCurrentUser());
        $ClubRelModel = Factory::ModelFactory('club/ClubRelationModel');
        $this->settings['Clubs'] = $ClubRelModel->getUserClubs($this->getCurrentUser());

        $this->settings['searchAction'] = $this->makeUrlToController('club/search');

        $this->setOutput('user/club.tpl');
    }


    private function _setTunesLinks()
    {
        $this->settings['actionSaveBirthDateLink'] = $this->makeUrlToController('tunesService/saveBirthDateAction');
        $this->settings['actionSaveContactsInfoLink'] = $this->makeUrlToController('tunesService/saveContactsInfoAction');
        $this->settings['actionSaveParametrsLink'] = $this->makeUrlToController('tunesService/saveParamsAction');
        $this->settings['actionSavePlayerInfoLink'] = $this->makeUrlToController('tunesService/savePlayersInfoAction');
        $this->settings['actionSavePlayingTimeLink'] = $this->makeUrlToController('tunesService/savePlaingTimeAction');
        $this->settings['actionSavePasswordLink'] = $this->makeUrlToController('tunesService/savePasswordAction');
        //for future: $this->settings['actionDeleteAccountLink'] = $this->makeUrlToController('tunesService/deleteAccountLink');
    }


    private function _generateDatapicker($data){
        $this->setScriptUser('datapicker/datepicker.min.js');
        $this->setCSSUser('datapicker/datepicker.min.css');
        $params['type'] = 'tCDB';
        $params['name'] = 'birthDate';
        $params['class'] = 'editableInput input-sm';
        $params['id'] = 'birthDay';
        $params['startDate']    = strtotime($data->birthDate);
        $params['value'] = $data->birthDate;
        return HTMLGenerator::datapickerGenerator($params);
    }

    private function _setOptionsArrays(){
        $GameLevelModel = Factory::ModelFactory('options/GameLevelModel');
        $this->settings['gameLevelArray'] = $GameLevelModel->getAll();
        $HandModel = Factory::ModelFactory('options/HandModel');
        $this->settings['handsArray'] = $HandModel->getAll();
        $ProfessionalSkillsModel = Factory::ModelFactory('options/ProfessionalSkillsModel');
        $this->settings['professionalSkillsArray'] = $ProfessionalSkillsModel->getAll();
        $TShortSizeModel = Factory::ModelFactory('options/TShortSizeModel');
        $this->settings['tshortSizeArray'] = $TShortSizeModel->getAll();
        $CityModel = Factory::ModelFactory('city/CityModel');
        $this->settings['cities'] = $CityModel->getAllCities();
    }


    private function _getUserPlan()
    {
        $UserPlanModel = Factory::ModelFactory('user/UserPlanModel');
        $UserPlan = $UserPlanModel->getUserPlanByUserId($this->getCurrentUser());
       
        Factory::HelpersFactory('UserPlanHelper');
        if($UserPlan)
        {
            $this->settings['UserPlan'] = UserPlanHelper::convertUserPlanToArray($UserPlan);
        }

    }








    private function _setRangePickers()
    {
        $UserPlanModel = Factory::ModelFactory('user/UserPlanModel');
        $UserPlan = $UserPlanModel->getUserPlanByUserId($this->getCurrentUser());
        $startVal = 6;
        $endVal = 18;
        $enabled = true;


        if($UserPlan)
        {
            $startVal = $UserPlan->rangeMondayMin;
            $endVal = $UserPlan->rangeMondayMax;
            if($UserPlan->playInrangeMonday)
            {
                $enabled = false;
            }
        }
        $FormatedData =
            [
              'objectId' => 'rangeMonday',
                'startVal' => $startVal,
                'endVal' => $endVal,
                'enabled' => $enabled
            ];
        $enabled = true;
        $this->settings['rangeMonday'] = HTMLGenerator::rengepickerGenerator((object)$FormatedData);


        if($UserPlan)
        {
            $startVal = $UserPlan->rangeTuesdayMin;
            $endVal = $UserPlan->rangeTuesdayMax;
            if($UserPlan->playInrangeTuesday)
            {
                $enabled = false;
            }
        }

        $FormatedData =
            [
                'objectId' => 'rangeTuesday',
                'startVal' => $startVal,
                'endVal' => $endVal,
                'enabled' =>$enabled
            ];

        $enabled = true;

        $this->settings['rangeTuesday'] = HTMLGenerator::rengepickerGenerator((object)$FormatedData);

        if($UserPlan)
        {
            $startVal = $UserPlan->rangeWednesdayMin;
            $endVal = $UserPlan->rangeWednesdayMax;
            if($UserPlan->playInrangeWednesday)
            {
                $enabled = false;
            }
        }

        $FormatedData =
            [
                'objectId' => 'rangeWednesday',
                'startVal' => $startVal,
                'endVal' => $endVal,
                'enabled' => $enabled
            ];


        $this->settings['rangeWednesday'] = HTMLGenerator::rengepickerGenerator((object)$FormatedData);
        $enabled = true;
        if($UserPlan)
        {
            $startVal = $UserPlan->rangeThursdayMin;
            $endVal = $UserPlan->rangeThursdayMax;
            if($UserPlan->playInrangeThursday)
            {
                $enabled = false;
            }
        }

        $FormatedData =
            [
                'objectId' => 'rangeThursday',
                'startVal' => $startVal,
                'endVal' => $endVal,
                'enabled' => $enabled
            ];
        $enabled = true;
        $this->settings['rangeThursday'] = HTMLGenerator::rengepickerGenerator((object)$FormatedData);

        if($UserPlan)
        {
            $startVal = $UserPlan->rangeFridayMin;
            $endVal = $UserPlan->rangeFridayMax;
            if($UserPlan->playInrangeFriday)
            {
                $enabled = false;
            }
        }

        $FormatedData =
            [
                'objectId' => 'rangeFriday',
                'startVal' => $startVal,
                'endVal' => $endVal,
                'enabled' => $enabled
            ];

        $enabled = true;
        $this->settings['rangeFriday'] = HTMLGenerator::rengepickerGenerator((object)$FormatedData);

        if($UserPlan)
        {
            $startVal = $UserPlan->rangeSaturdayMin;
            $endVal = $UserPlan->rangeSaturdayMax;
            if($UserPlan->playInrangeSaturday)
            {
                $enabled = false;
            }
        }

        $FormatedData =
            [
                'objectId' => 'rangeSaturday',
                'startVal' => $startVal,
                'endVal' => $endVal,
                'enabled' => $enabled
            ];

        $enabled = true;
        $this->settings['rangeSaturday'] = HTMLGenerator::rengepickerGenerator((object)$FormatedData);


        if($UserPlan)
        {
            $startVal = $UserPlan->rangeSundayMin;
            $endVal = $UserPlan->rangeSundayMax;
            if($UserPlan->playInrangeSunday)
            {
                $enabled = false;
            }
        }


        $FormatedData =
            [
                'objectId' => 'rangeSunday',
                'startVal' => $startVal,
                'endVal' => $endVal,
                'enabled' => $enabled
            ];

        $this->settings['rangeSunday'] = HTMLGenerator::rengepickerGenerator((object)$FormatedData);
    }




}
