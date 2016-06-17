<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 09.06.16
 * Time: 23:46
 */
class UserModel extends Model{


    public function __construct() {
    }
    
    public $email;
    public $name;
    public $surname;
    public $phone;
    public $passwd;
    public $hash;


    /**
     * createUser
     * comment after use
     */
    public function setUsers(){
            $this->_createUserTable();
    }

    private function _createUserTable(){

    }

    public function iAddUserInformationSrartRegistrationAction($data){
        $user = R::dispense('tbluser');
        $user->email = $data->email;
        $user->name = $data->name;
        $user->surname = $data->surname;
        $user->phone = $data->phone;
        $id = R::store($user);
        unset($user);
        return $id;
    }

    public function vUpdateUserInformationPasswordAction($data){
        $userId = $data->userId;
        unset($data->userId);
        $user = R::load('tbluser',$userId);
        $user->passwd = md5($data->passwd1);
        R::store($user);
    }

    /**
     * @param $data
     * @return bool
     */
    public function checkEmailForExist($data){
        $SQL = "SELECT * FROM tbluser WHERE tbluser.email=\"".$data->email."\"";
        $rows = R::getAll($SQL);
        $user = R::convertToBean('tbluser',$rows[0]);
        if($user->id == 0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function authentificateUser($data){
        $SQL = "SELECT * FROM tbluser WHERE tbluser.email=\"".$data->email."\"";
        $rows = R::getAll($SQL);
        $user = R::convertToBean('tbluser',$rows[0]);
        if($user->id == 0){
            $informer = new Informer('Пользователя с таким email не существует');
            return $informer->getErrorMessage();
        }
        if(md5($data->passwd) == $user->passwd){
            return $user->id;
        }
        else{
            $informer = new Informer('Неверный пароль');
            return $informer->getErrorMessage();
        }
    }


    public function saveUserAvatar($path,$userId){
        $user = R::load('tbluser',$userId);
        $user->avatar = $path;
        R::store($user);
    }

    /**
     * @param $data
     * @return array
     */
    public function getUserFromId($userId){
        $user = R::load('tbluser',$userId);
        return $user;
    }

    public function getAllUsers($userId){
        $SQL = "SELECT * FROM tbluser WHERE NOT tbluser.id =\"".$userId."\"";
        $rows = R::getAll($SQL);
        $users = R::convertToBeans('tbluser',$rows);
        return $users;
    }

    
}