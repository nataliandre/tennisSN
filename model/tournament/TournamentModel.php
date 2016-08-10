<?php

/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 22.06.16
 * Time: 09:54
 */
class TournamentModel extends Model
{
    const TABLE_LABLE = 'tbltournament';
    public function __construct() {
    }

    public function addTournament($data){
        $tour = R::dispense(self::TABLE_LABLE);
        $tour->title    = $data->title;
        $tour->location = $data->location;
        $tour->cityId   = $data->cityId;
        $tour->headId   = $data->userId;
        $tour->info     = $data->info;
        $tour->date     = date("Y-m-d");
        $tour->startDate = $data->startDate;
        $tour->endDate = $data->endDate;
        $tour->countPlayers = $data->countPlayers;
        $tour->avatar   = false;
        $tour->views = 1;
        $idTour = R::store($tour);
        return $idTour;
    }

    public function increaseTournamentViews($tournamentId)
    {
        $tour= R::load(self::TABLE_LABLE,$tournamentId);
        $tour->views++;
        R::store($tour);
    }

    public function getTournamentById($tournamentId){
        $tour= R::load(self::TABLE_LABLE,$tournamentId);
        if($tour->id == 0){
            return false;
        }
        $CityModel = Factory::ModelFactory('city/CityModel');
        $tour->city_id = $CityModel->getCityById($tour->city_id);
        return $tour;
    }

    public function saveTournamentAvatar($path,$tournamentId){
        $tour = R::load(self::TABLE_LABLE,$tournamentId);
        $tour->avatar = $path;
        R::store($tour);
    }


    public function getUserTournamentsAdministrate($userId){
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." WHERE ".self::TABLE_LABLE.".head_id='$userId'";
        $rows = R::getAll($SQL);
        $tour = R::convertToBeans(self::TABLE_LABLE,$rows);
        return $tour;
    }

    public function getAllTournaments(){
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." ORDER BY ".self::TABLE_LABLE.".views";
        $rows = R::getAll($SQL);
        $tour = R::convertToBeans(self::TABLE_LABLE,$rows);
        return $tour;
    }

    public function getTournamentsByQuery($QUERY){
        $QUERY_CAP = ucfirst($QUERY);
        $QUERY_MIN = strtolower($QUERY);
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." 
                WHERE ".self::TABLE_LABLE.".title LIKE '%$QUERY%' OR
                ".self::TABLE_LABLE.".title LIKE '%$QUERY_CAP%' OR
                ".self::TABLE_LABLE.".title LIKE '%$QUERY_MIN%'";
        $rows = R::getAll($SQL);
        $tour = R::convertToBeans(self::TABLE_LABLE,$rows);
        $tour = $this->deleteEmptyElement($tour);
        if(empty($tour)){return false;}
        return $tour;
    }


    public function setParametr($data,$tournamentId){
        $tournament = R::load(self::TABLE_LABLE,$tournamentId);
        $tournament->{$data->column} = $data->value;
        R::store($tournament);
    }



}