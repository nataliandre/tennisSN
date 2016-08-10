<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 25.06.16
 * Time: 12:56
 */
class PhotosClubModel
{

    const TABLE_LABLE = 'tblphotosclub';

    public function __construct() {
    }

    public function addNewPhoto($data){
        $photos = R::dispense(self::TABLE_LABLE);
        $photos->data = date("Y-m-d");
        $photos->time = date("H:i");
        $photos->path = $data->path;
        $photos->origin = $data->origin;
        $photos->clubId = $data->clubId;
        R::store($photos);
    }


    public function getClubPhotos($clubId,$limit = false){
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." WHERE club_id='$clubId' ORDER BY id DESC";
        if($limit){$SQL.=" LIMIT ".$limit;}
        $rows = R::getAll($SQL);
        $photos = R::convertToBeans(self::TABLE_LABLE,$rows);
        return $photos;
    }

}