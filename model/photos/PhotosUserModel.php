<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 17.06.16
 * Time: 02:44
 */
class PhotosUserModel extends Model
{
    public function __construct() {
    }

    public function addNewPhoto($data){
        $photos = R::dispense('tblphotos');
        $photos->data = date("Y-m-d");
        $photos->time = data("H:i");
        $photos->path = $data->path;
        $photos->origin = $data->origin;
        $photos->userId = $data->userId;
        R::store($photos);
    }


    public function getUserPhotos($userId){
        $SQL = "SELECT * FROM tblphotos WHERE user_id='$userId'";
        $rows = R::getAll($SQL);
        $photos = R::convertToBeans('tblphotos',$rows);
        return $photos;
    }



}