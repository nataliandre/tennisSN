<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 17.06.16
 * Time: 02:48
 */
class photos extends Controller
{
    public function  __construct() {
        parent::__construct();
        if(!$this->bIsAuthentificated()){
            $this->redirectToController('auth/login');
        }

    }

    private $_upload_tmp_dir = 'files/images/tmp/';
    private $_upload_trumb_dir = 'files/images/trumb/';

    public function add(){

        $this->settings['actionNextStep'] = $this->makeUrlToController('photos/doAddAction');
        $this->settings['FlashMessage'] = $this->getFlashMessage();
        $this->setCSSUser('cropper/jquery.Jcrop.min.css');
        $this->setScriptUser('cropper/jquery.Jcrop.min.js');
        if($this->getSessionParameters('photoRoute')){
            $this->settings['photoRoute'] = $this->getSessionParameters('photoRoute');
        }

        $this->setOutput('photos/add.tpl');
    }

    public function doAddAction(){
        $data = $this->oGetRequestObject();
        $files = $this->oGetFilesObject();
        if($data->cropParams == ""){
            $NewFileNameBody =   Generator::generateImageName();
            $UploadFiles = new Upload($files->avatar);
            $UploadFiles->file_new_name_body =$NewFileNameBody;
            $UploadFiles->Process($this->_upload_tmp_dir);

            $NewFileName = $this->_upload_tmp_dir.$UploadFiles->file_dst_name;


            if($UploadFiles->processed){
                $this->setSessionParameters('photoRoute',$NewFileName);
                $this->redirectToController('photos/add');
                die;
            }else{
                $Iformer = new Informer(ErrorsDetector::errorFileNotUploaded());
                $this->setFlashMessage($Iformer->getErrorMessage());
                $this->redirectToController('photos/add');
                die;
            }
        }else{
            $cropParams = json_decode($data->cropParams);
            foreach ($cropParams as $key=>$value){
                $cropParams->{$key} = round($value);
            }
            $CroppedImage = new Upload($this->getSessionParameters('photoRoute'));
            $CroppedImage->image_crop = $cropParams->y1." ".$cropParams->x2." ".$cropParams->y2." ".$cropParams->x1;
            $CroppedImage->Process($this->_upload_trumb_dir);
            if($CroppedImage->processed){
                $UserModel = $this->modelLoadToVar('user/UserModel');
                $UserModel->saveUserAvatar($CroppedImage->file_dst_name,$this->getSessionParameters('userId'));
                $CroppedImage->clean();
                $this->deleteSessionParameters('photoRoute');
                $this->redirectToController('user/photos');

            }else{
                $Informer = new Informer(ErrorsDetector::errorFileNotUploaded());
                $this->setFlashMessage($Informer->getErrorMessage());
                $this->redirectToController('photos/add');
                die;
            }
        }
    }

}