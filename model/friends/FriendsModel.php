<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 14.06.16
 * Time: 19:23
 */
class FriendsModel extends Model
{

    public $firstUser;
    public $secondUser;
    public $confirmedFriends;


    public function __construct()
    {

    }

    /**
     * @param $data
     *
     */
    public function setFriendsRequest($data){

        if(!$this-> _checkTheInComingRequest($data)){ // if no common requests do new request
            $friends = R::dispense('tblfriends');
            $friends->firstUser = $data->firstUser;
            $friends->secondUser = $data->secondUser;
            $friends->confirmedFriends = false;
            R::store($friends);
        }else{
            $this->_setOutComingRequestConfirmedTrue($data);
        }
    }

    /**
     * @param $data
     */
    public function deleteFriendsRequest($data){
        $relId = $this->checkFriendRel($data,true);
        $friends = R::load('tblfriends',$relId);
        R::trash($friends);
    }

    /**
     * @param $data
     * dismis the friends relationships
     */
    public function killFriendsRequest($data){
        $SQL = "SELECT * FROM tblfriends WHERE tblfriends.first_user=\"".$data->firstUser."\" AND tblfriends.second_user=\"".$data->secondUser."\"";
        $rows = R::getAll($SQL);
        $friends = R::convertToBean('tblfriends',$rows[0]);
        R::trash($friends);
    }

    /**
     * @param $data
     * @return mixed
     * change user places
     */
    private function _revertTheDataUsers($data){
        $firstUser = $data->firstUser;
        $secondUser = $data->secondUser;
        $data->firstUser = $firstUser;
        $data->secondUser = $secondUser;
        return $data;
    }

    /**
     * @param $data
     * @return bool
     * check out comming request
     */
    private function _checkTheInComingRequest($data){
        $data = $this->_revertTheDataUsers($data);
        return $this->checkFriendRequest($data);
    }

    /**
     * @param $data
     * confirm common outcoming request
     */
    private function _setOutComingRequestConfirmedTrue($data){
        $data = $this->_revertTheDataUsers($data);
        $SQL = "SELECT * FROM tblfriends WHERE tblfriends.first_user=\"".$data->firstUser."\" AND tblfriends.second_user=\"".$data->secondUser."\"  AND tblfriends.confirmed_friends=0";
        $rows = R::getAll($SQL);
        $friends = R::convertToBean('tblfriends',$rows[0]);
        $friends->confirmedFriends = true;
        R::store($friends);
    }

    /**
     * @param $data
     * @return bool
     * function check if current user has friends request from viewed
     */
    public function checkFriendRequest($data){
        $SQL = "SELECT * FROM tblfriends WHERE tblfriends.first_user=\"".$data->firstUser."\" AND tblfriends.second_user=\"".$data->secondUser."\"  AND tblfriends.confirmed_friends=0";
        return $this->_checkIfResultNotEmptyBySQL($SQL);
    }

    /**
     * @param $data
     * @return bool
     * function checks if current user is in friends of viewed user
     */
    public function checkFriendRel($data,$returnId = false){
        $SQL = "SELECT * FROM tblfriends WHERE 
                ((tblfriends.first_user=\"".$data->firstUser."\" AND tblfriends.second_user=\"".$data->secondUser."\")
                OR 
                (tblfriends.second_user=\"".$data->firstUser."\" AND tblfriends.first_user=\"".$data->secondUser."\"))
                AND tblfriends.confirmed_friends=1";
        return $this->_checkIfResultNotEmptyBySQL($SQL,$returnId);
    }

    /**
     * @param $SQL
     * @return bool
     * function checks if this SQL has results
     */
    private function _checkIfResultNotEmptyBySQL($SQL,$retrunId = false){
        $rows = R::getAll($SQL);
        $friends = R::convertToBean('tblfriends',$rows[0]);
        if(!$retrunId){ return ($friends->id == 0) ? false : true; }
        else{ return ($friends->id == 0) ? false : $friends->id; }
    }


    public function getNewFriendsRequests($userId){
        $SQL = "SELECT * FROM tblfriends WHERE tblfriends.second_user=\"".$userId."\" AND tblfriends.confirmed_friends=0";
        $rows = R::getAll($SQL);
        $iCountRows = count($rows);
        if($iCountRows == 0){
            return false;
        }
        else{
            return $iCountRows;
        }

    }

    public function getFriendsRequest($userId){
        $SQL = "SELECT * FROM tblfriends WHERE tblfriends.second_user=\"".$userId."\" AND tblfriends.confirmed_friends=0";
        $rows = R::getAll($SQL);
        $requests = R::convertToBeans('tblfriends',$rows);
        return (count($requests) == 0) ? false : $requests;
    }

    public function getFriendsUsers($userId){
        $SQL = "SELECT * FROM tblfriends WHERE tblfriends.second_user=\"".$userId."\" OR tblfriends.first_user=\"".$userId."\" AND tblfriends.confirmed_friends=1";
        $rows = R::getAll($SQL);
        $requests =$this->_deleteEmptyRows(R::convertToBeans('tblfriends',$rows));

        return (count($requests) == 0) ? false : $requests;
    }

    private function _deleteEmptyRows($friends){
        foreach ($friends as $key=>$friend){
            if($this->_detectEmptyRow($friend)){
                unset($friends[$key]);
            }

        }
        return $friends;
    }

    private function _detectEmptyRow($friend){
        return ($friend->secondUser == 0 || $friend->firstUser == 0) ? true : false;
    }

    public function confirmFriendsRequest($data){
        $SQL = "SELECT * FROM tblfriends WHERE tblfriends.first_user=\"".$data->secondUser."\" AND tblfriends.second_user=\"".$data->firstUser."\"";
        $rows = R::getAll($SQL);
        $friends = R::convertToBean('tblfriends',$rows[0]);
        $friends->confirmedFriends = true;
        R::store($friends);
    }

    


}