<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 19.07.16
 * Time: 16:38
 */
class forgot extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->bIsAuthentificated())
        {
          $this->redirect($this->makeUrlToController('index'));
            die;
        }
    }


    public function getEmail(){
        $this->settings['actionForm'] = $this->makeUrlToController('forgot/sendEmail');
        $this->settings['FlashMessage'] = $this->getFlashMessage();
        $this->setOutput('forgot/indexForgot.tpl');
    }

    public function sendEmail()
    {
        $data = $this->oGetRequestObject();
        $UserModel = Factory::ModelFactory('user/UserModel');
        $idUser = $UserModel->authentificateUser($data,true);
       
        if(is_bool($idUser))
        {
            $UserId = $UserModel->getUserByUserMail($data->email);
            $this->hashGenerate($UserId);
            $this->_sendConfirmMail($data->email);
            
            $this->_setSuccessSendEmailMessage();
            $this->redirectToController('forgot/getEmail');
        }else{
            $this->setFlashMessage($idUser);
            $this->redirectToController('forgot/getEmail');
        }
    }

    public function confirmPassword()
    {

        $this->settings['actionForm'] = $this->makeUrlToController('forgot/doConfirmPassword');

        $data = $this->oGetRequestObject();
        if(!$data->confirmCode)
        {
            $FlashMessage = $this->getFlashMessage();
            if(empty($FlashMessage)){$this->redirectToController('index');}
            $this->settings['FlashMessage'] = $FlashMessage;
            $this->settings['accessToChangePassword'] = false;
        }

        $UserHash = $this->getSessionParameters('hashUser');
        if(md5($data->confirmCode)==md5($UserHash))
        {
            $UserModel = Factory::ModelFactory('user/UserModel');
            $User = $UserModel->getUserByHash(md5($data->confirmCode));
            if(md5($data->confirmCode) == $User->hash)
            {
                $this->settings['accessToChangePassword'] = true;
                $this->settings['userId'] = $User->id;
                $this->settings['confirmCode'] = $data->confirmCode;
            }
            else
            {
                $Informer = new Informer("Пользователя не найдено");
                $this->settings['FlashMessage'] = $Informer->getErrorMessage();
                $this->settings['accessToChangePassword'] = false;
            }
          
        }else
        {
            $Informer = new Informer("Код устарел");
            $this->settings['FlashMessage'] = $Informer->getErrorMessage();
            $this->settings['accessToChangePassword'] = false;
        }


        $this->setOutput('forgot/changePassword.tpl');
    }


    public function doConfirmPassword()
    {
        $data = $this->oGetRequestObject();
        //stdClass Object ( [userId] => 22 [confirmCode] => 7fwJqm3BPk [passwd1] => 150197aa [passwd2] => 150197aa )
        if(!$data->confirmCode)
        {
            $Informer = new Informer("Код активации пуст!");
            $this->setFlashMessage($Informer->getErrorMessage());
            $this->_redirectToConfirmPasswordAction();
        }
        $UserHash = $this->getSessionParameters('hashUser');
        if(md5($data->confirmCode)==md5($UserHash))
        {
            if($data->passwd1 != $data->passwd2)
            {
                $Informer = new Informer("Пароли не совпадают!");
                $this->setFlashMessage($Informer->getErrorMessage());
                $this->_redirectToConfirmPasswordAction();
            }else
            {
                $UserModel = Factory::ModelFactory('user/UserModel');
                $UserModel->vUpdateUserInformationPasswordAction($data);
                $Informer = new Informer("Пароль успешно изменен!");
                $this->setFlashMessage($Informer->getSuccessMessage());
                $this->deleteSessionParameters('hashUser');
                $this->redirectToController('forgot/succcessRebootPassword');
                die;
            }

        }
        else
        {
            $Informer = new Informer("Код активации не верен!");
            $this->setFlashMessage($Informer->getErrorMessage());
            $this->_redirectToConfirmPasswordAction();
        }

    }


    public function succcessRebootPassword()
    {
        $FlashMessage = $this->getFlashMessage();
        if(empty($FlashMessage))
        {
            $this->redirectToController('index');
        }
        $this->settings['FlashMessage'] = $FlashMessage;
        $this->setOutput('forgot/passwordChanged.tpl');
    }


    private function _redirectToConfirmPasswordAction()
    {
        $this->redirectToController('forgot/confirmPassword');
    }


    private function _setSuccessSendEmailMessage()
    {
        $Informer = new Informer("Сообщение с кодом восстановления отправлено!");
        $this->setFlashMessage($Informer->getSuccessMessage());
    }

    private function _sendConfirmMail($email)
    {
        $MailData['confirmCode'] =  $this->getSessionParameters('hashUser');
        $tplBody = $this->getMailTemplate('changePassword', (object)$MailData);
        $mailer = new Mailer($email, 'Смена пароля', $tplBody);
        $mailer->send();
    }







}