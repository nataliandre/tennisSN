<?php

/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 17.06.16
 * Time: 11:20
 */
class GamesModel extends Model
{
    const TABLE_LABLE  = "tblgames";


    public function __construct() {
    }

    public function setGameRequest($data,$userId){
        $game = R::dispense(self::TABLE_LABLE);
        $game->userId = $userId;
        $game->opponentId = $data->opponentId;
        $game->date = $data->gameDate;
        $game->gameTime = $data->hours.":".$data->minutes;
        $game->cityId = $data->cityId;
        $game->requestTime = date("H:i");
        $game->confirmed = false;
        $game->active = true;
        $game->viewed = false;
        $game->deleted = false;
        $game->opponentVisible = true;
        $game->userVisible = true;
        $game->userCancelGame = false;
        $game->opponentCancelGame = false;
        $game->quickGame = false;

        $game->opponentWantToCancelRequest = false;
        $game->userWantToCancelRequest = false;

        $game->hasResult = false;
        $game->gamePlace =$data->gamePlace;
        $game->countSets = $data->countSets;
        $id = R::store($game);
        return $id;
    }


    public function setQuickGame($GameId)
    {
        $Game = R::load(self::TABLE_LABLE,$GameId);
        $Game->quickGame = true;
        R::store($Game);
    }

    public function getQuickGames($userId)
    {
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." WHERE (".self::TABLE_LABLE.".user_id='".$userId."' OR ";
        $SQL.= self::TABLE_LABLE.".opponent_id='$userId') AND ".self::TABLE_LABLE.".quick_game=1 ";
        return $this->_getGamesFromSQL($SQL);
    }





    public function getGameRequests($userId,$newRequests = false){
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." WHERE ";
        if(!$newRequests)
        {
            $SQL .=  "(".self::TABLE_LABLE.".opponent_id='$userId' OR
                    ".self::TABLE_LABLE.".user_id='$userId') AND ";
        }
        else
        {
            $SQL .=  self::TABLE_LABLE.".opponent_id='$userId' AND ";
        }

            $SQL .= self::TABLE_LABLE.".deleted=0 AND ".self::TABLE_LABLE.".opponent_visible=1 AND NOT ".self::TABLE_LABLE.".quick_game = 1 ";
        if($newRequests){
            $SQL .= " AND ".self::TABLE_LABLE.".viewed=0 ";
        }
            $SQL.= "ORDER BY ".self::TABLE_LABLE.".id, ".self::TABLE_LABLE.".confirmed "
        ;

        $rows = R::getAll($SQL);
        $games = R::convertToBeans(self::TABLE_LABLE,$rows);
        $UserModel = Factory::ModelFactory('user/UserModel');
        $CityModel = Factory::ModelFactory('city/CityModel');
        foreach ($games as $Key=>$Game){
            $games[$Key]->user_id = $UserModel->getUserFromId($Game->user_id);
            $games[$Key]->opponent_id = $UserModel->getUserFromId($Game->opponent_id);
            $this->_checkActivationOfGame($Game->id);
            $games[$Key]->city_id = $CityModel->getCityById($Game->city_id);
        }

        return $games;
    }




    /**
     * @param $userId
     * @param bool $newRequests
     * @return array
     * I get incoming requests
     */
    public function getIncomingGameRequests($userId,$newRequests = false)
    {
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." WHERE
                    ".self::TABLE_LABLE.".opponent_id='$userId' AND
                    ".self::TABLE_LABLE.".deleted=0 AND
                    ".self::TABLE_LABLE.".opponent_visible=1 AND
                    NOT ".self::TABLE_LABLE.".quick_game = 1 ";
        if($newRequests){
            $SQL .= " AND ".self::TABLE_LABLE.".viewed=0 ";
        }
        $SQL.= "ORDER BY ".self::TABLE_LABLE.".id DESC, ".self::TABLE_LABLE.".confirmed ASC";
        return $this->_getGamesFromSQL($SQL,__METHOD__);
    }

    /**
     * @param $userId
     * @param bool $newRequests
     * @return games
     * I get outgoing requests
     */
    public function getOutgoingRequests($userId,$newRequests = false)
    {
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." WHERE
                    ".self::TABLE_LABLE.".user_id='$userId' AND
                    ".self::TABLE_LABLE.".deleted = 0 AND
                    ".self::TABLE_LABLE.".user_visible = 1 AND 
                   NOT  ".self::TABLE_LABLE.".quick_game = 1 ";
        if($newRequests){
            $SQL .= " AND ".self::TABLE_LABLE.".viewed=0 ";
        }
        $SQL.= "ORDER BY ".self::TABLE_LABLE.".id DESC, ".self::TABLE_LABLE.".confirmed ASC";
        return $this->_getGamesFromSQL($SQL);
    }
    
    
    public function getGameFromId($GameId)
    {
        $Game = R::load(self::TABLE_LABLE,$GameId);
        $UserModel = Factory::ModelFactory('user/UserModel');
        $CityModel = Factory::ModelFactory('city/CityModel');
        $Game->user_id = $UserModel->getUserFromId($Game->user_id);
        $Game->opponent_id = $UserModel->getUserFromId($Game->opponent_id);
        $Game->city_id = $CityModel->getCityById($Game->city_id);
        return $Game;
    }
    

    /**
     * @param $SQL
     * @return games array
     */
    private function _getGamesFromSQL($SQL,$Method = false)
    {
        $rows = R::getAll($SQL);
        $games = R::convertToBeans(self::TABLE_LABLE,$rows);
        $UserModel = Factory::ModelFactory('user/UserModel');
        $CityModel = Factory::ModelFactory('city/CityModel');
        $GamesResultsModel = Factory::ModelFactory('games/GamesResultsModel');
        foreach ($games as $Key=>$Game){

            $HasGameResult = (boolean)$GamesResultsModel->getGameResultByGameId($Game->id);
            if($Method == 'GamesModel::getIncomingGameRequests') {
                $this->_setViewedTrue($Game->id);
            }
            if($HasGameResult)
            {
                unset($games[$Key]);
                continue;
            }

            $games[$Key]->user_id = $UserModel->getUserFromId($Game->user_id);
            $games[$Key]->opponent_id = $UserModel->getUserFromId($Game->opponent_id);
            $this->_checkActivationOfGame($Game->id);
            $games[$Key]->city_id = $CityModel->getCityById($Game->city_id);

        }

        return $games;
    }


    private function _setViewedTrue($gameId)
    {
        $Game = R::load(self::TABLE_LABLE,$gameId);
        $Game->viewed = true;
        R::store($Game);
    }




    public function getCountGameRequests($userId){
        $CountGames = count($this->getGameRequests($userId,true));
        return ($CountGames ==0) ? false : $CountGames;
    }



    public function _checkActivationOfGame($gameId){
        $game = R::load(self::TABLE_LABLE,$gameId);
        if(strtotime($game->date) < strtotime(date("Y-m-d"))){
            $game->active = false;
            R::store($game);
        }
        return false;
    }
    
    public function vConfirmGameById($data,$userId){
        $game = R::load(self::TABLE_LABLE,$data->gameId);
        if($userId == $game->opponentId){
            $game->confirmed = true;
            R::store($game);
        }
    }

    public function vConfirmGameByIdWithoutVerification($gameId){
        $game = R::load(self::TABLE_LABLE,$gameId);
        $game->confirmed = true;
        R::store($game);
    }

    public function vUnConfirmGameById($data,$userId){
        $game = R::load(self::TABLE_LABLE,$data->gameId);
        if($userId == $game->opponentId){
            $game->confirmed = false;
            $game->opponentVisible = false;
            R::store($game);
        }
    }

    public function vFailureGameByIdWithoutVerification($gameId){
            $game = R::load(self::TABLE_LABLE,$gameId);
            $game->confirmed = false;
            $game->opponentVisible = false;
            R::store($game);
    }



    public function vDeleteConfirmGameById($data,$userId){
        $game = R::load(self::TABLE_LABLE,$data->gameId);
        if($userId == $game->opponentId){
            $game->opponentVisible = false;
            R::store($game);
        }
    }

    public function getUserWins($userId)
    {
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." WHERE ".self::TABLE_LABLE.".user_id='$userId')";
        $rows = R::getAll($SQL);
        $games = R::convertToBeans(self::TABLE_LABLE,$rows);
        $GamesResultsModel = Factory::ModelFactory('games/GamesResultsModel');
        foreach ($games as $key => $game){

        }


    }

    public function vDeleteGameById($data,$userId)
    {
        $game = R::load(self::TABLE_LABLE,$data->gameId);
        R::trash($game);
    }


    public function forceCancelRequest($data,$userId)
    {
        $game = R::load(self::TABLE_LABLE,$data->gameId);
        if($game->userId == $userId){
            $game->userWantToCancelRequest = true;
        }
        elseif($game->opponentId == $userId)
        {
            $game->opponentWantToCancelRequest = true;
        }
        R::store($game);
    }



}