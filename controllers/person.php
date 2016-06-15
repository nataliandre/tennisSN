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
    }

    public function view($id){
        $this->modelLoad('user/UserModel');
        $this->settings['user'] = $this->model->getUserFromId($id);
        $this->settings['sessionHash'] = $this->getSessionParameters('hashUser');
        $this->_setHasFriendsRequest($id);


        $this->setEndScriptUser('setters/friendsSetter.js');
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



}