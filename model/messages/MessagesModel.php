<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 13.06.16
 * Time: 20:17
 */
class MessagesModel extends Model
{

    public $body;
    public $senderId;
    public $recipientId;
    public $time;
    public $data;




    public function __construct() {
    }

    public function sendMessage($data){
        $message = R::dispense('tblmessages');
        $message->body = $data->body;
        $message->senderId = $data->senderId;
        $message->recipientId = $data->recipientId;
        $message->time = date('H:i');
        $message->data = date("Y-m-d");
        $message->isReaded = false;
        R::store($message);
        return $message;
    }

    public function getMessageHistory($userId,$currentUser){
        $SQL = "SELECT * FROM tblmessages WHERE 
                (tblmessages.sender_id=\"".$userId."\" AND tblmessages.recipient_id=\"".$currentUser."\")
                OR 
                (tblmessages.sender_id=\"".$currentUser."\" AND tblmessages.recipient_id=\"".$userId."\")";

        $rows = R::getAll($SQL);
        $messages = R::convertToBeans('tblmessages',$rows);
        $this->setMessagesHistoryReadedStatus($userId,$currentUser);
        return $messages;
    }

    /**
     * @param $userId
     * @param $currentUser
     */
    public function setMessagesHistoryReadedStatus($userId,$currentUser){
        $SQL = "SELECT * FROM tblmessages WHERE 
                tblmessages.sender_id=\"".$userId."\" AND tblmessages.recipient_id=\"".$currentUser."\"";
        $rows = R::getAll($SQL);
        $messages = R::convertToBeans('tblmessages',$rows);
        foreach ($messages as $message){
            $message->isReaded = true;
            R::store($message);
        }
    }

    public function getNewMessagesCount($userId){
        $SQL = "SELECT tblmessages.sender_id,tblmessages.recipient_id 
                FROM tblmessages 
                    WHERE 
                    tblmessages.recipient_id=\"".$userId."\"
                    AND
                    tblmessages.is_readed=FALSE
                 ";
        $rows = R::getAll($SQL);
        $messages = R::convertToBeans('tblmessages',$rows);
        return (count($messages) != 0) ? count($messages) : false;
    }


    public function getMessagesCurrentUser($userId){
        $SQL = "SELECT *
                FROM tblmessages 
                    WHERE 
                    tblmessages.sender_id=\"".$userId."\"
                    OR 
                    tblmessages.recipient_id=\"".$userId."\"
                ORDER BY tblmessages.id DESC
                 ";
        $rows = R::getAll($SQL);
        $messages = R::convertToBeans('tblmessages',$rows);

        $Users = $this->_getDistinctUsers($messages,$userId);
        $UserModel = Factory::ModelFactory('user/UserModel');
        $UserMessage = array();
        foreach ($Users as $User){
            $UserMessageNode['infoUser'] = $UserModel->getUserFromId($User);
            $UserMessageNode['lastMessage'] = $this->_getLastMessageFromUser($User,$userId);
            $UserMessage[]=$UserMessageNode;
        }
        return (empty($UserMessage)) ? false : $UserMessage;
    }


    private function _getLastMessageFromUser($userId,$currentUserId)
    {
        $SQL ="SELECT * FROM tblmessages WHERE 
                (tblmessages.sender_id=\"".$userId."\" AND tblmessages.recipient_id=\"".$currentUserId."\")
                OR 
                (tblmessages.sender_id=\"".$currentUserId."\" AND tblmessages.recipient_id=\"".$userId."\")
                ORDER BY tblmessages.id DESC
                LIMIT 1;";
        $rows = R::getAll($SQL);
        $LastMessage = R::convertToBean('tblmessages',$rows[0]);
        return $LastMessage;
    }

    /**
     * @param $messages
     * @param $userId
     * @return array
     */
    private function _getDistinctUsers($messages,$userId)
    {
        $Users = array();
        foreach ($messages as $message){
            if(!in_array($message->senderId,$Users) && (int)$message->senderId != (int)$userId)
                $Users[] = $message->senderId;
            if(!in_array($message->recipientId,$Users) && (int)$message->recipientId != (int)$userId)
                $Users[] = $message->recipientId;
        }

        return $Users;
    }










}