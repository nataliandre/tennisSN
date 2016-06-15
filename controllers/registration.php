<?php
/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 09.06.16
 * Time: 23:01
 */
class Registration extends Controller{

    private $_main_acrtion = 'registration/start';
    private $_upload_tmp_dir = 'files/images/tmp/';
    private $_upload_trumb_dir = 'files/images/trumb/';

    public function  __construct() {
        parent::__construct();
        $this->settings['classBodyCss'] = 'bg__tennis__image';
        if($this->bIsAuthentificated()){
            $this->redirectToController('user/page');
        }
    }
    public function start(){

        $this->settings['actionNextStep'] = $this->makeUrlToController('registration/doStartAction');
        $this->settings['FlashMessage'] = $this->getFlashMessage();
        $this->setOutput('registration/start.tpl');
    }

    public function doStartAction(){
        
        $data = $this->oGetRequestObject();
        if(!empty($data)) {
            $this->getRegistrationValidator();
            $validationResult = RegistrationValidator::validateDataFirstStep($data);
            $UserModel = $this->modelLoadToVar('user/UserModel');
            if(!$UserModel->checkEmailForExist($data)){
                $Informer = new Informer(ErrorsDetector::errorEmailAlreadyExist());
                $this->setFlashMessage($Informer->getErrorMessage());
                $this->redirectToController($this->_main_acrtion);
                die;
            }
            if($validationResult){
                $this->setFlashMessage($validationResult);
                $this->redirectToController('registration/start');
                die;
            }

            /* send confirm email */

            //add newUser and get id
            $this->setSessionParameters('registrationSession',true);

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
            $this->redirect($this->makeUrlToController($this->_main_acrtion));
        }
    }


    public function confirmMail(){
        if($this->getSessionParameters('registrationSession')) {
            $this->settings['actionNextStep'] = $this->makeUrlToController('registration/doConfirmMailAction');
            $this->settings['idNewUser'] = $this->getSessionParameters('userId');
            $this->settings['FlashMessage'] = $this->getFlashMessage();
            $this->setOutput('registration/confirmMail.tpl');
        }else{
            $this->redirectToController($this->_main_acrtion);
        }
    }

    public function doConfirmMailAction(){
        $data = $this->oGetRequestObject();
        if(!empty($data) && $this->getSessionParameters('registrationSession')) {
            $this->getRegistrationValidator();

            $data->activationCodeSession = $this->getSessionParameters('token');
            $validationResult = RegistrationValidator::validateDataSecondStep($data);
            if($validationResult){
                $this->setFlashMessage($validationResult);
                $this->redirectToController('registration/confirmMail');
                die;
            }
            $this->modelLoad('user/UserModel');
            $this->settings['idNewUser'] = $this->model->vUpdateUserInformationPasswordAction($data);
            $this->redirectToController('registration/addPhoto');
        }else{
            $this->redirectToController($this->_main_acrtion);
        }
    }


    public function addPhoto(){
        if($this->getSessionParameters('registrationSession')) {
            $this->setCSSUser('cropper/jquery.Jcrop.min.css');
            $this->setScriptUser('cropper/jquery.Jcrop.min.js');
            $this->settings['idNewUser'] = $this->getSessionParameters('userId');
            $this->settings['actionNextStep'] = $this->makeUrlToController('registration/doAddPhotoAction');
            $this->settings['FlashMessage'] = $this->getFlashMessage();
            if($this->getSessionParameters('avatarRoute')){
                $this->settings['avatarRoute'] = $this->getSessionParameters('avatarRoute');
            }
            $this->setOutput('registration/addPhoto.tpl');
        }else{
            $this->redirectToController($this->_main_acrtion);
        }
    }

    public function doAddPhotoAction(){
        if($this->getSessionParameters('registrationSession')) {
            $data = $this->oGetRequestObject();
            $files = $this->oGetFilesObject();
            if($data->cropParams == ""){
                   $NewFileNameBody =   Generator::generateImageName();
                   $UploadFiles = new Upload($files->avatar);
                   $UploadFiles->file_new_name_body =$NewFileNameBody;
                   $UploadFiles->Process($this->_upload_tmp_dir);

                   $NewFileName = $this->_upload_tmp_dir.$UploadFiles->file_dst_name;


                   if($UploadFiles->processed){
                        $this->setSessionParameters('avatarRoute',$NewFileName);
                        $this->redirectToController('registration/addPhoto');
                        die;
                   }else{
                        $Iformer = new Informer(ErrorsDetector::errorFileNotUploaded());
                        $this->setFlashMessage($Iformer->getErrorMessage());
                        $this->redirectToController('registration/addPhoto');
                        die;
                   }
            }else{
                $cropParams = json_decode($data->cropParams);
                foreach ($cropParams as $key=>$value){
                    $cropParams->{$key} = round($value);
                }
                $CroppedImage = new Upload($this->getSessionParameters('avatarRoute'));
                $CroppedImage->image_crop = $cropParams->w." ".$cropParams->h;
                $CroppedImage->image_x = $cropParams->x;
                $CroppedImage->image_y = $cropParams->y;
                $CroppedImage->Process($this->_upload_trumb_dir);
                if($CroppedImage->processed){
                    $UserModel = $this->modelLoadToVar('user/UserModel');
                    $UserModel->saveUserAvatar($CroppedImage->file_dst_name,$this->getSessionParameters('userId'));
                    $CroppedImage->clean();
                    $idNewUserId = $this->getSessionParameters('userId');
                    $this->vAuthentificateUser($idNewUserId);
                    $this->deleteSessionParameters('userId');
                    $this->redirectToController('user/page');
                }else{
                    $Informer = new Informer(ErrorsDetector::errorFileNotUploaded());
                    $this->setFlashMessage($Informer->getErrorMessage());
                    $this->redirectToController('registration/addPhoto');
                    die;
                }
            }
        }else {
            $this->redirectToController($this->_main_acrtion);
        }
    }

    public function otherInfo(){

    }
}