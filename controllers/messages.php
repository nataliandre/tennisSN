<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 14.06.16
 * Time: 19:48
 */
class Messages extends Controller
{
    public function  __construct() {
        parent::__construct();
        if(!$this->bIsAuthentificated()){
            $this->redirectToController('auth/login');
        }

    }

    public function send($userId){

        $UserModel = $this->modelLoadToVar('user/UserModel');
        $this->setEndScriptUser('setters/messageSetter.js');
        $this->settings['secondUser'] = $UserModel->getUserFromId($userId);
        $this->settings['currentUser'] = $UserModel->getUserFromId($this->getCurrentUser());
        $MessagesModel = $this->modelLoadToVar('messages/MessagesModel');
        $this->settings['userMessages'] = $MessagesModel->getMessageHistory($userId,$this->getCurrentUser());
        $this->settings['sessionHash'] = $this->getSessionParameters('hashUser');
        $this->settings['currentDate'] = date("Y-m-d");
        $this->setOutput('messages/send.tpl');
    }




}