<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 25.06.16
 * Time: 12:56
 */
class PhotosTournamentModel
{

    const TABLE_LABLE = 'tblphotostournament';

    public function __construct() {
    }

    public function addNewPhoto($data){
        $photos = R::dispense(self::TABLE_LABLE);
        $photos->data = date("Y-m-d");
        $photos->time = date("H:i");
        $photos->path = $data->path;
        $photos->origin = $data->origin;
        $photos->tournamentId = $data->tournamentId;
        R::store($photos);
    }


    public function getTournamentPhotos($tournmentId,$limit = false){
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." WHERE tournament_id='$tournmentId' ORDER BY id DESC";
        if($limit){$SQL.=" LIMIT ".$limit;}
        $rows = R::getAll($SQL);
        $photos = R::convertToBeans(self::TABLE_LABLE,$rows);
        return $photos;
    }

}