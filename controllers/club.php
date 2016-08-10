<?
class club extends Controller{
    public function  __construct() {
        parent::__construct();
        $this->settings['EXTENDER_CLUB'] = 'view/club/tpl/clubTpl.tpl';
        $ClubLinks['linkToClubView'] = $this->makeUrlToController('club/view/');
        $ClubLinks['linkToClubPhotos'] = $this->makeUrlToController('club/photos/');
        $ClubLinks['linkToClubTunes'] = $this->makeUrlToController('club/tunes/');
        $ClubLinks['linkToChangeAvatarPhoto'] = $this->makeUrlToController('photos/add?type=clubPhotoAvatar&entityId=');
        $ClubLinks['linkAddNewPhoto'] = $this->makeUrlToController('photos/add?type=clubPhotos&entityId=');
        $this->settings['ClubLinks'] = (object)$ClubLinks;
        $this->settings['currentUser'] = $this->getCurrentUser();
        $this->settings['photosPath'] = $this->makeUrlToController($this->_upload_trumb_dir);
    }


    private $_upload_trumb_dir = 'files/images/gallery/';
    private $_photos_on_main_page = 4;

    public function add(){
        $CityModel = Factory::ModelFactory('city/CityModel');
        $this->settings['cities'] = $CityModel->getAllCities();
        $this->settings['userId'] = $this->getCurrentUser();
        $this->settings['actionNextStep'] = $this->makeUrlToController('club/doAddAction');
        $this->settings['FlashMessage'] = $this->getFlashMessage();

        $CortsModel = Factory::ModelFactory('options/CortsModel');
        $this->settings['coorts'] = $CortsModel->getCortsArray();

        $this->setOutput('club/add.tpl');
    }

    public function doAddAction(){
        $data = $this->oGetRequestObject();
        $FormAddValidator = Factory::ValidatorsFactory('FormAddValidator');
        $validationResult = $FormAddValidator::validateClubAddForm($data);
        if($validationResult){
            $this->setFlashMessage($validationResult);
            $this->redirectToController('club/add');
            die;
        }
        $ClubModel = Factory::ModelFactory('club/ClubModel');
        $clubId = $ClubModel->addClub($data);
        $this->redirect($this->makeUrlToController('club/view/').$clubId);
        
        
    }

    public function view($clubId)
    {
        $this->settings['activeTab'] = 'ClubMain';

        $ClubModel = Factory::ModelFactory('club/ClubModel');
        $ClubInfo = $ClubModel->getClubById($clubId);
        $ClubPhotosModel = Factory::ModelFactory('photos/PhotosClubModel');
        $ClubPhotos = $ClubPhotosModel->getClubPhotos($ClubInfo->id,$this->_photos_on_main_page);
        $this->settings['clubPhotos'] = $ClubPhotos;

        $this->settings['takePartInClub'] = $this->makeUrlToController('ajax/addUserToClub');
        $this->settings['leaveClub'] = $this->makeUrlToController('ajax/deleteUserFromClub');
        $this->settings['addClubNews'] = $this->makeUrlToController('ajax/addClubNews');

        if($ClubInfo){

            $UserModel = Factory::ModelFactory('user/UserModel');
            $this->settings['club'] = $ClubInfo;
            $this->settings['clubCreator'] = $UserModel->getUserFromId($ClubInfo->user_id);

            $ClubRelModel  = Factory::ModelFactory('club/ClubRelationModel');
            $this->settings['usersInClub'] = $ClubRelModel->getUsersFromClub($ClubInfo->id,6);

            $this->settings['countUsersInClub'] = $ClubRelModel->getCountUsersFromClub($ClubInfo->id);
            $this->settings['isTakePart'] = false;
            if($this->settings['clubCreator']->id == $this->getCurrentUser()){ $this->settings['isClubAdministrator'] = true; }
            if($this->_checkIfAuthUserIsInClub($this->settings['usersInClub'])){ $this->settings['isTakePart'] = true; }
            
            
            $ClubNewsModel = Factory::ModelFactory('club/ClubNewsModel');
            $this->settings['news'] = $ClubNewsModel->getClubNewsByClubId($ClubInfo->id);
            

            $this->setOutput('club/view.tpl');
        }else{
            $this->setOutput('club/404.tpl');
        }
    }

    private function _checkIfAuthUserIsInClub($usersInClub){
        $CurrentUserId = $this->getCurrentUser();
        foreach ($usersInClub as $User){ if($User->id == $CurrentUserId){return true;}}
        return false;
    }

    public function search(){
        $data = $this->oGetRequestObject();
        $ClubModel = Factory::ModelFactory('club/ClubModel');
        $this->settings['searchAction'] = $this->makeUrlToController('club/search');
        if(empty($this->query))
        {
            $this->settings['clubs'] = $ClubModel->getAllClubs();
        }
        else
        {
            $this->settings['clubs'] = $ClubModel->getClubsByQuery($data->query);
            $this->settings['QUERY'] = $data->query;
        }
        $this->setOutput('club/searchResults.tpl');
    }

    public function photos($clubId)
    {
        $ClubModel = Factory::ModelFactory('club/ClubModel');
        $ClubInfo = $ClubModel->getClubById($clubId);
        $ClubPhotosModel = Factory::ModelFactory('photos/PhotosClubModel');
        $ClubPhotos = $ClubPhotosModel->getClubPhotos($ClubInfo->id);

        $this->settings['activeTab'] = 'ClubPhotos';
        $this->settings['clubPhotos'] = $ClubPhotos;

        $this->settings['club'] = $ClubInfo;
        $this->setOutput('club/photos.tpl');
    }

    public function tunes($clubId)
    {
        $this->_setCities();

        $this->setScriptUser('setters/tunesClubSetter.js');
        
        $ClubModel = Factory::ModelFactory('club/ClubModel');
        $ClubInfo = $ClubModel->getClubById($clubId);

        $this->_checkUserAndRedirect($ClubInfo->userId);


        $this->settings['club'] = $ClubInfo;

        $this->settings['sessionHash'] = $this->getSessionParameters('hashUser');
        $this->settings['activeTab'] = 'ClubTunes';

        $this->setOutput('club/tunes.tpl');
    }


    public function catalog()
    {
        $this->settings['headNavActive'] = 'ClubsHeadNavActive';
        $ClubModel = Factory::ModelFactory('club/ClubModel');

        $this->_setCities();

        $this->settings['clubs'] = $ClubModel->getAllClubs();
        $this->setOutput('club/catalogClub.tpl');
    }


    private function _setCities()
    {
        $CityModel = Factory::ModelFactory('city/CityModel');
        $this->settings['cities'] = $CityModel->getAllCities();
    }



    private function _checkUserAndRedirect($UserId)
    {
        if($UserId != $this->getCurrentUser())
        {
            $this->redirectToController('index');
            die;
        }
    }




}