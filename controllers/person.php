<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 12.06.16
 * Time: 14:06
 */
class Person extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->settings['photosPath'] = $this->makeUrlToController($this->_upload_trumb_dir);
    }
    private $_upload_trumb_dir = 'files/images/gallery/';
    private $_photos_on_main_page = 4;

    public function view($id){
        if($this->getCurrentUser() == $id){
            $this->redirectToController('user/page');
            die;
        }
        $this->modelLoad('user/UserModel');
        $this->settings['user'] = $this->model->getUserFromId($id);
        $this->settings['sessionHash'] = $this->getSessionParameters('hashUser');
        $this->_setHasFriendsRequest($id);
        $this->settings['newGameRequestLink'] = $this->makeUrlToController('games/add/');
        $PhotosUserModel = Factory::ModelFactory('photos/PhotosUserModel');
        $this->settings['userPhotos'] = $PhotosUserModel->getUserPhotos($id,$this->_photos_on_main_page);

        $this->setEndScriptUser('setters/friendsSetter.js');

        $this->_getUserPlan($id);

        if($this->settings['user']->id == 0){
            $this->setOutput('person/404.tpl');
        }else {
            $this->setOutput('person/view.tpl');
        }
    }

    private function _setHasFriendsRequest($secondUser){
        $FriendsModel = $this->modelLoadToVar('friends/FriendsModel');
        $data = $this->oGetRequestObject();
        $data->secondUser = $secondUser;
        $data->firstUser = $this->getSessionParameters('idUser');

        $this->settings['hasFriendsRequest'] = $FriendsModel->checkFriendRequest($data);
        $this->settings['isInFriends'] = $FriendsModel->checkFriendRel($data);
    }


    private function _getUserPlan($userId)
    {
        $UserPlanModel = Factory::ModelFactory('user/UserPlanModel');
        $UserPlan = $UserPlanModel->getUserPlanByUserId($userId);
        Factory::HelpersFactory('UserPlanHelper');
        if($UserPlan)
        {
            $this->settings['UserPlan'] = UserPlanHelper::convertUserPlanToArray($UserPlan);
        }
    }



}