<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 18.06.16
 * Time: 21:10
 */
class ClubRelationModel
{
    const TABLE_LABLE = 'tblclubsrel';

    public function __construct() {
    }

    public function addClubRelation($userId,$clubId){
        $clubRel = R::dispense(self::TABLE_LABLE);
        $clubRel->userId = $userId;
        $clubRel->clubId = $clubId;
        $idClub = R::store($clubRel);
        return $idClub;
    }

    public function deleteUserFromClub($userId,$clubId)
    {
        $SQL = "SELECT * FROM tblclubsrel WHERE tblclubsrel.user_id='$userId' AND tblclubsrel.club_id='$clubId'";
        $rows = R::getAll($SQL);
        $clubRels = R::convertToBeans(self::TABLE_LABLE,$rows);
        foreach ($clubRels as $clubRel)
        {
            R::trash($clubRel);
        }
    }

    public function getUserClubs($userId){
        $SQL = "SELECT * FROM tblclubsrel WHERE tblclubsrel.user_id='$userId'";
        $rows = R::getAll($SQL);
        $clubRels = R::convertToBeans('tblclubsrel',$rows);
        $ClubModel = Factory::ModelFactory('club/ClubModel');
        $Clubs = array();
        if($clubRels[1]->id==0){return false;}
        foreach ($clubRels as $clubRel){
            if(is_null($clubRel->club_id)){ continue; }
            $Clubs[] = $ClubModel->getClubById($clubRel->club_id);
        }
        return $Clubs;
    }

    public function getUsersFromClub($cluId,$limit = false){
        $SQL = "SELECT * FROM tblclubsrel WHERE tblclubsrel.club_id='$cluId'";
        if($limit){
            $SQL.= " LIMIT ".$limit;
        }
        $rows = R::getAll($SQL);
        $UserRels = R::convertToBeans('tblclubsrel',$rows);
        $UserModel = Factory::ModelFactory('user/UserModel');
        if(current($UserRels)->id==0){return false;}
        $Users = array();
        foreach ($UserRels as $User)
        {
            $Users[] = $UserModel->getUserFromId($User->user_id);
        }
        return $Users;
    }


    public function getCountUsersFromClub($cluId)
    {
        $SQL = "SELECT * FROM tblclubsrel WHERE tblclubsrel.club_id='$cluId'";
        $rows = R::getAll($SQL);
        $UserRels = R::convertToBeans('tblclubsrel',$rows);
        return count($UserRels);
    }
}