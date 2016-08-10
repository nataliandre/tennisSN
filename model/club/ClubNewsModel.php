<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 25.07.16
 * Time: 11:24
 */
class ClubNewsModel extends Model
{
    const TABLE_LABLE = 'tblclubnews';

    public function addNews($data)
    {
        $News = R::dispense(self::TABLE_LABLE);
        $News->clubId = $data->clubId;
        $News->message = $data->message;
        $News->date = date("Y-m-d H:i:s");
        R::store($News);
    }

    public function getClubNewsByClubId($clubId)
    {
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." 
                WHERE club_id = '".$clubId."' 
                ORDER BY date DESC";
        $rows = R::getAll($SQL);
        $News = R::convertToBeans(self::TABLE_LABLE,$rows);
        return $News;
    }


}