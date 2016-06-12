<?php
/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 09.06.16
 * Time: 23:01
 */
class Registration extends Controller{
    public function  __construct() {
        parent::__construct();
        $this->settings['classBodyCss'] = 'bg__tennis__image';
        if($this->bIsAuthentificated()){
            $this->redirectToController('user/page');
        }
    }
    public function start(){

        $this->settings['actionNextStep'] = $this->makeUrlToController('registration/doStartAction');

        $this->setOutput('registration/start.tpl');
    }

    public function doStartAction(){
        
        $data = $this->oGetRequestObject();
        if(!empty($data)) {
            /* send confirm email */

            //add newUser and get id
            $this->modelLoad('user/UserModel');
            $this->settings['idNewUser'] = $this->model->iAddUserInformationSrartRegistrationAction($data);
            $this->setSessionParameters('userId', $this->settings['idNewUser']);

            $token = $this->tokenGenerate();
            $dataMailSend['activationCode'] = $token;
            $tplBody = $this->getMailTemplate('confirmRegistration', $dataMailSend);
            $mailer = new Mailer($data->email, 'Регистрация нового пользователя', $tplBody);
            $mailer->send();

            $this->redirectToController('registration/confirmMail');
            //
        }else{
            $this->redirect($this->makeUrlToController('error'));
        }
    }


    public function confirmMail(){
        $this->setScriptUser('checkers/ActivationCodeChecker.js');
        $this->settings['actionNextStep'] = $this->makeUrlToController('registration/doConfirmMailAction');
        $this->settings['idNewUser'] = $this->getSessionParameters('userId');
        $this->setOutput('registration/confirmMail.tpl');
    }

    public function doConfirmMailAction(){
        $data = $this->oGetRequestObject();
        $this->modelLoad('user/UserModel');
        $this->settings['idNewUser'] = $this->model->vUpdateUserInformationPasswordAction($data);
        $this->redirectToController('registration/addPhoto');
    }


    public function addPhoto(){
        $this->setScriptUser('cropper/cropper.js');
        $this->setScriptUser('cropper/main.js');
        $this->setCssUser('cropper/cropper.css');
        $this->setCssUser('cropper/main.css');
        $this->settings['idNewUser'] = $this->getSessionParameters('userId');
        $this->settings['actionNextStep'] = $this->makeUrlToController('registration/doAddPhotoAction');
        $this->setOutput('registration/addPhoto.tpl');
    }

    public function doAddPhotoAction(){
        $idNewUserId = $this->getSessionParameters('userId');
        $this->vAuthentificateUser($idNewUserId);
        $this->deleteSessionParameters('userId');
        $this->redirectToController('user/page');
    }

    public function otherInfo(){

    }
}