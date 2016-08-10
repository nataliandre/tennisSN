<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 07.08.16
 * Time: 12:50
 */
class RatingLinkModel
{

    const TABLE_LABLE = 'tblratinglink';


    public function setRatingLink($UserId,$LinkBody,$LinkId)
    {
        $Links = $this->checkIfRatingLinkExist($UserId,$LinkId);

        if(!$Links)
        {

            $Link = R::dispense(self::TABLE_LABLE);
            $Link->linkBody = $LinkBody;
            $Link->userId = $UserId;
            $Link->linkId = $LinkId;

            R::store($Link);

        }else{

            current($Links)->linkBody = $LinkBody;
            R::store(current($Links));

        }
    }


    public function checkIfRatingLinkExist($UserId,$LinkId)
    {
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." WHERE link_id='".$LinkId."' AND user_id='".$UserId."'";
        $Links = R::getAll($SQL);
        $Links = R::convertToBeans(self::TABLE_LABLE,$Links);
        if(current($Links)->id == 0){return false;}
        return $Links;
    }



    public function getRatingLinksForUser($userId)
    {
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." WHERE user_id = ".$userId;
        $rows = R::getAll($SQL);
        $Links = R::convertToBeans(self::TABLE_LABLE,$rows);
        if(current($Links)->id == 0){return false;}
        return $Links;
    }



}