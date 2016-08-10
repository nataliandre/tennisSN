<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 18.06.16
 * Time: 15:30
 */
class ClubModel extends Model
{
    const TABLE_LABLE = 'tblclubs';

    public function __construct() {
    }

    public function addClub($data){
        $club = R::dispense(self::TABLE_LABLE);
        $club->title    = $data->title;
        $club->location = $data->location;
        $club->cityId   = $data->cityId;
        $club->userId   = $data->userId;
        $club->info     = $data->info;
        $club->date     = date("Y-m-d");
        $club->avatar   = false;
        $idClub = R::store($club);
        $ClubrelationModel = Factory::ModelFactory('club/ClubRelationModel');
        $ClubrelationModel->addClubRelation($data->userId,$idClub);
        return $idClub;
    }

    public function saveClubAvatar($path,$clubId)
    {
        $club = R::load(self::TABLE_LABLE,$clubId);
        $club->avatar = $path;
        R::store($club);
    }

    public function getClubById($clubId){
        $club = R::load(self::TABLE_LABLE,$clubId);
        if($club->id == 0){
            return false;
        }
        $CityModel = Factory::ModelFactory('city/CityModel');
        $club->city_id = $CityModel->getCityById($club->city_id);
        return $club;
    }


    public function getUserCreatorClubs($userId){
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." WHERE ".self::TABLE_LABLE.".user_id='$userId'";
        $rows = R::getAll($SQL);
        $clubs = R::convertToBeans(self::TABLE_LABLE,$rows);
        return $clubs;
    }
    
    public function getAllClubs(){
        $SQL = "SELECT * FROM ".self::TABLE_LABLE;
        $rows = R::getAll($SQL);
        $clubs = R::convertToBeans(self::TABLE_LABLE, $rows);
        return $clubs;
    }
    public function getClubsByQuery($QUERY){
        $QUERY_CAP = ucfirst($QUERY);
        $QUERY_MIN = strtolower($QUERY);
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." 
                WHERE ".self::TABLE_LABLE.".title LIKE '%$QUERY%' OR
                ".self::TABLE_LABLE.".title LIKE '%$QUERY_CAP%' OR
                ".self::TABLE_LABLE.".title LIKE '%$QUERY_MIN%' "
        ;
        $rows = R::getAll($SQL);
        $clubs = R::convertToBeans(self::TABLE_LABLE,$rows);
        $clubs = $this->deleteEmptyElement($clubs);
        if(empty($clubs)){return false;}
        return $clubs;
    }

    public function setParametr($data,$clubId)
    {
        $Club = R::load(self::TABLE_LABLE,$clubId);
        $Club->{$data->column} = $data->value;
        R::store($Club);
    }




}