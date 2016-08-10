<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 07.07.16
 * Time: 23:40
 */
class GamesResultsModel extends Model
{
    const TABLE_LABLE = 'tblgamesresults';
    public function __construct(){}
    
    public function addGameResult($data)
    {
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." WHERE game_id=\"$data->gameId\"";
        $rows =  R::getAll($SQL);
        $result = R::convertToBean(self::TABLE_LABLE,$rows[0]);

        $NewRecord = true;
        if($result->id == 0)
        {
            $NewRecord = false;
            $result = R::dispense(self::TABLE_LABLE);
        }
        $result->gameId = $data->gameId;
        $result->userResult = $data->userResult;
        $result->opponentResult = $data->opponentResult;
        $result->userSet1 = $data->userSet1;
        $result->opponentSet1 = $data->opponentSet1;
        $result->userSet2 = $data->userSet2;
        $result->opponentSet2 = $data->opponentSet2;
        $result->userSet3 = $data->userSet3;
        $result->opponentSet3 = $data->opponentSet3;


            if($NewRecord)
            {
                if($result->userConfirmed)
                {
                    $result->opponentConfirmed = true;
                    $result->userConfirmed = false;
                }else{
                    $result->opponentConfirmed = false;
                    $result->userConfirmed = true;
                }

            }
            else
            {
                $result->opponentConfirmed = false;
                $result->userConfirmed = true;
            }


        if($result->opponentResult > $result->userResult)
        {
            $result->userWin = false;
            $result->opponentWin = true;
        }else{
            $result->userWin = true;
            $result->opponentWin = false;
        }

        if(isset($data->userSet4))
        {
            $result->userSet4 = $data->userSet4;
            $result->opponentSet4 = $data->opponentSet4;
        }
        if(isset($data->userSet5))
        {
            $result->userSet5 = $data->userSet5;
            $result->opponentSet5 = $data->opponentSet5;
        }
        R::store($result);
    }


    public function getGameResultsById($GameResultsId)
    {
        $GameResults = R::load(self::TABLE_LABLE,$GameResultsId);
        $GamesModel = Factory::ModelFactory('games/GamesModel');
        $GameResults->game_id = $GamesModel->getGameFromId($GameResults->game_id);
        return $GameResults;
    }





    public function getGameResultByGameId($gameId)
    {
        $SQL = 'SELECT * FROM '.self::TABLE_LABLE.' WHERE '.self::TABLE_LABLE.'.game_id='.$gameId;
        $rows = R::getAll($SQL);
        $result = R::convertToBean(self::TABLE_LABLE,$rows[0]);
        if($result->id == 0){return false;}
        return $result;
    }
    
    public function getGamesResultsFromArray($GamesIdArray)
    {
        $GamesIdLine = implode(',',$GamesIdArray);
        if($GamesIdLine)
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." WHERE ".self::TABLE_LABLE.".game_id IN ($GamesIdLine) ORDER BY id DESC";
        $rows = R::getAll($SQL);

        $results = R::convertToBeans(self::TABLE_LABLE, $rows);
        if(current($results)->id == 0){return false;}
        $GamesModel = Factory::ModelFactory('games/GamesModel');
        foreach ($results as $key => $result)
        {
            $results[$key]->game_id = $GamesModel->getGameFromId($result->gameId);
        }
        return $results;
    }
    


    public function confirmOpponentGameResults($data,$userId)
    {
        $GameResults = R::load(self::TABLE_LABLE,$data->gameResultId);
        if($GameResults->id == 0){return false;}

        $GamesModel = Factory::ModelFactory('games/GamesModel');
        $Game = $GamesModel->getGameFromId($GameResults->gameId);

        if($Game->opponentId->id == $userId)
        {
            $GameResults->opponentConfirmed = true;
            R::store($GameResults);
        }
    }

    

}