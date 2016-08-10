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
    private $_upload_gallery_dir = 'files/images/gallery/';
    private $_upload_thrumb_dir = 'files/images/trumb/';
    private $_allowed_types_images = [
        'image/png',
        'image/jpeg',
        //'image/tiff',
        //'image/gif',
        'image/bmp'
    ];
    private $_type_thrumb_dir = [
        'userAvatar',
        'tournamentPhotoAvatar',
        'clubPhotoAvatar'
    ];


    public function add(){

        $this->settings['actionNextStep'] = $this->makeUrlToController('photos/doAddAction');
        $this->settings['FlashMessage'] = $this->getFlashMessage();
        $this->setCSSUser('cropper/jquery.Jcrop.min.css');
        $this->setScriptUser('cropper/jquery.Jcrop.min.js');
        $this->settings['dataRequest'] = $this->oGetRequestObject();
        if($this->getSessionParameters('photoRoute')){
            $this->settings['photoRoute'] = $this->getSessionParameters('photoRoute');
        }

        $this->setOutput('photos/add.tpl');
    }

    public function doAddAction(){
        $data = $this->oGetRequestObject();

        $GetParams = '?';
        if(isset($data->type)) {
            $GetParams.= 'type=' . $data->type . '&';
        }
        if(isset($data->entityId)){
            $GetParams.= 'entityId=' . $data->entityId;
        }

        $files = $this->oGetFilesObject();
        if($data->cropParams == ""){
            $NewFileNameBody =   Generator::generateImageName();
            $FileType = $files->avatar['type'];
            if(!in_array($FileType,$this->_allowed_types_images)){
                $Iformer = new Informer(ErrorsDetector::errorNotAllowedExternsion());
                $this->setFlashMessage($Iformer->getErrorMessage());
                $this->redirectToController('photos/add');
                die;
            }
            $UploadFiles = new Upload($files->avatar);
            $UploadFiles->file_new_name_body =$NewFileNameBody;
            $UploadFiles->Process($this->_upload_tmp_dir);

            $NewFileName = $this->_upload_tmp_dir.$UploadFiles->file_dst_name;


            if($UploadFiles->processed){
                $this->setSessionParameters('photoRoute',$NewFileName);


                $this->redirectToController('photos/add'.$GetParams);
                die;
            }else{
                $Iformer = new Informer(ErrorsDetector::errorFileNotUploaded());
                $this->setFlashMessage($Iformer->getErrorMessage());
                $this->redirectToController('photos/add'.$GetParams);
                die;
            }
        }else{
            $cropParams = json_decode($data->cropParams);
            $RequestObject = $this->oGetRequestObject();
            foreach ($cropParams as $key=>$value){
                $cropParams->{$key} = round($value);
            }
            $CroppedImage = new Upload($this->getSessionParameters('photoRoute'));
            $CroppedImage->image_crop = $cropParams->y1." ".$cropParams->x2." ".$cropParams->y2." ".$cropParams->x1;
            $DIR = $this->_upload_gallery_dir;
            if(in_array($RequestObject->type,$this->_type_thrumb_dir)){
                $DIR = $this->_upload_thrumb_dir;
            }
            $CroppedImage->Process($DIR);
            if($CroppedImage->processed){

                $data = [
                        'path' => $CroppedImage->file_dst_name,
                        'origin' => $this->getSessionParameters('photoRoute')
                    ];
                if(!isset($RequestObject->type)) {$this->_loadUserPhoto($data);}
                if($RequestObject->type == 'userAvatar'){$this->_loadUserAvatar($data);}
                if($RequestObject->type == 'tournamentPhotos'){$this->_loadTournamentPhoto($data,$RequestObject->entityId);}
                if($RequestObject->type == 'clubPhotos'){$this->_loadClubPhotos($data,$RequestObject->entityId);}
                if($RequestObject->type == 'tournamentPhotoAvatar'){$this->_loadTournamentPhotoAvatar($data,$RequestObject->entityId);}
                if($RequestObject->type == 'clubPhotoAvatar'){$this->_loadClubPhotoAvatar($data,$RequestObject->entityId);}

                $CroppedImage->clean();
                $this->deleteSessionParameters('photoRoute');
                $this->redirectToController('user/photos');

            }else{
                $Informer = new Informer(ErrorsDetector::errorCroppingFileUploaded());
                $this->setFlashMessage($Informer->getErrorMessage());
                $this->redirectToController('photos/add'.$GetParams);
                die;
            }
        }
    }


    private function _loadUserPhoto($data){
        $PhotosUserModel = Factory::ModelFactory('photos/PhotosUserModel');
        $data['userId'] = $this->getCurrentUser();
        $PhotosUserModel->addNewPhoto((object)$data);
    }

    private function _loadTournamentPhoto($data,$tournamentId){
        $PhotosTournamentModel = Factory::ModelFactory('photos/PhotosTournamentModel');
        $data['tournamentId'] = $tournamentId;
        $TournamentModel = Factory::ModelFactory('tournament/TournamentModel');
        $Tournament = $TournamentModel->getTournamentById($tournamentId);
        if($Tournament->headId == $this->getCurrentUser()){
            $PhotosTournamentModel->addNewPhoto((object)$data);
        }

    }

    private function _loadClubPhotos($data,$clubId)
    {
        $ClubModel = Factory::ModelFactory('club/ClubModel');
        $Club = $ClubModel->getClubById($clubId);
        $data['clubId'] = $clubId;
        if($Club->userId == $this->getCurrentUser())
        {
            $data = (object)$data;
            $PhotosClubModel = Factory::ModelFactory('photos/PhotosClubModel');
            $PhotosClubModel->addNewPhoto($data);
        }
    }

    private function _loadClubPhotoAvatar($data,$clubId)
    {
        $ClubModel = Factory::ModelFactory('club/ClubModel');
        $Club = $ClubModel->getClubById($clubId);
        if($Club->userId == $this->getCurrentUser())
        {
            $data = (object)$data;
            $ClubModel->saveClubAvatar($data->path,$clubId);
        }
    }


    private function _loadTournamentPhotoAvatar($data,$tournamentId){
        $TournamentModel = Factory::ModelFactory('tournament/TournamentModel');
        $data['tournamentId'] = $tournamentId;
        $Tournament = $TournamentModel->getTournamentById($tournamentId);
        if($Tournament->headId == $this->getCurrentUser()) {
            $data = (object)$data;
            $TournamentModel->saveTournamentAvatar($data->path, $tournamentId);
        }
    }

    public function _loadUserAvatar($data)
    {
        $UserModel = Factory::ModelFactory('user/UserModel');
        $UserId = $this->getCurrentUser();
        if($UserId !=0){
            $data = (object)$data;
            $UserModel->saveUserAvatar($data->path,$UserId);
        }
        
        
    }



}