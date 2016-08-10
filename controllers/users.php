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
        $this->settings['routeUserPage'] = $this->makeUrlToController('person/view/');

    }

    public function friends(){
        $this->tab_active = 'linkFriendsPage';

        $UserModel = $this->modelLoadToVar('user/UserModel');
        $FriendsModel  = $this->modelLoadToVar('friends/FriendsModel');

        $this->settings['sessionHash'] = $this->getSessionParameters('hashUser');
        $this->settings['searchAction'] = $this->makeUrlToController('users/search');
        $this->settings['friendsRequestsLink'] = $this->makeUrlToController('users/requests');

        $this->_setFriends($FriendsModel);
        $this->setOutput('users/friends.tpl');
    }

    public function requests(){
        $this->setEndScriptUser('setters/confirmFriendsRequest.js');
        $this->settings['sessionHash'] = $this->getSessionParameters('hashUser');
        $FriendsModel  = $this->modelLoadToVar('friends/FriendsModel');
        $this->_setFriendsRequests($FriendsModel);
        $this->setOutput('users/requests.tpl');
    }



    public function search(){
        $data = $this->oGetRequestObject();
        $UsersFriends = Factory::ModelFactory('user/UserModel');
        $this->settings['users'] = $UsersFriends->getUsersByQuery($data->query,$this->getCurrentUser());
        $this->settings['QUERY'] = $data->query;

        $this->setOutput('users/search.tpl');
    }


    public function players()
    {
        $data = $this->oGetRequestObject();
        


        $this->setOutput('users/players.tpl');
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