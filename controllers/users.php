<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 14.06.16
 * Time: 18:50
 */
class Users extends Controller
{
    public function  __construct() {
        parent::__construct();
        if(!$this->bIsAuthentificated()){
            $this->redirectToController('auth/login');
        }

    }

    public function friends(){
        $this->tab_active = 'linkFriendPage';

        $UserModel = $this->modelLoadToVar('user/UserModel');
        $this->settings['allUsers'] = $UserModel->getAllUsers($this->getSessionParameters('idUser'));
        $this->settings['routeUserPage'] = $this->makeUrlToController('person/view/');
        $FriendsModel  = $this->modelLoadToVar('friends/FriendsModel');
        $this->setEndScriptUser('setters/confirmFriendsRequest.js');
        $this->settings['sessionHash'] = $this->getSessionParameters('hashUser');
        $this->_setFriendsRequests($FriendsModel);
        $this->_setFriends($FriendsModel);
        $this->setOutput('users/friends.tpl');

    }

    private function _setFriendsRequests($FriendsModel){
        $this->_connectUsersToFriendsRel($FriendsModel,'friendsRequest');
    }

    private function _setFriends($FriendsModel){
        $this->_connectUsersToFriendsRel($FriendsModel,'friendsUsers',true);
    }

    private function _connectUsersToFriendsRel($FriendsModel,$sType,$checkTheType = false){
        $sMethod = 'get';
        $sMethod.= ucfirst($sType);
        

        $this->settings[$sType] = $FriendsModel->$sMethod($this->getCurrentUser());
        if($this->settings[$sType]) {
            $UserModel = $this->modelLoadToVar('user/UserModel');

            foreach ($this->settings[$sType] as $REQ_NO=>$REQ_VAL){
                if(!$checkTheType) {
                    $this->settings[$sType][$REQ_NO] = $UserModel->getUserFromId($REQ_VAL->first_user);
                }else{
                    if($REQ_VAL->first_user != $this->getCurrentUser()){
                        $this->settings[$sType][$REQ_NO] = $UserModel->getUserFromId($REQ_VAL->first_user);
                    }else{
                        $this->settings[$sType][$REQ_NO] = $UserModel->getUserFromId($REQ_VAL->second_user);
                    }
                }
            }
        }
    }



}