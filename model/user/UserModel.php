<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 09.06.16
 * Time: 23:46
 */
class UserModel extends Model{
    const TABLE_LABLE = 'tbluser';
    const WHERE_ = " WHERE ";
    const AND_ = " AND ";
    const OR_ = " OR ";

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
        $user->canCatchRequests = true;
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

    public function getUserByUserMail($mail)
    {
        $SQL = "SELECT * FROM tbluser WHERE tbluser.email=\"".$mail."\"";
        $rows = R::getAll($SQL);
        $user = R::convertToBean(self::TABLE_LABLE,$rows[0]);
        return $user->id;
    }


    public function getUserByHash($Hash)
    {
        $SQL = "SELECT * FROM tbluser WHERE tbluser.hash=\"".$Hash."\"";
        $rows = R::getAll($SQL);
        $user = R::convertToBean(self::TABLE_LABLE,$rows[0]);
        return $user;
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
    public function authentificateUser($data,$isForgotPasswordAction = false){
        $SQL = "SELECT * FROM tbluser WHERE tbluser.email=\"".$data->email."\"";
        $rows = R::getAll($SQL);
        $user = R::convertToBean('tbluser',$rows[0]);
        if($user->id == 0){
            $informer = new Informer('Пользователя с таким email не существует');
            return $informer->getErrorMessage();
        }
        if($isForgotPasswordAction)
        {
            return true;
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
        $user = $this->_getUserOptions($user);
        return $user;
    }

    public function getAllUsers($userId){
        $SQL = "SELECT * FROM tbluser WHERE NOT tbluser.id =\"".$userId."\"";
        $rows = R::getAll($SQL);
        $users = R::convertToBeans('tbluser',$rows);
        return $users;
    }


    public function getUsersWithFilters($data){
        /**
         *   [cityId] => 3
         *   [levelId] => 2
         *   [professionalId] => 2
         */
        $SQL = "SELECT * FROM ".self::TABLE_LABLE.self::WHERE_.self::TABLE_LABLE.".can_catch_requests = 1 ".self::AND_;
        $sqlWhereConditions = false;
        if($data->cityId)
        {
            $sqlWhereConditions = '';
            $sqlWhereConditions.= self::TABLE_LABLE.".city_id = '".$data->cityId."'";
        }
        if($data->levelId)
        {
            if($sqlWhereConditions){
                $sqlWhereConditions.= self::AND_;
            }
            $sqlWhereConditions.= self::TABLE_LABLE.".level_id = '".$data->levelId."'";

        }

        if($data->professionalId)
        {
            if($sqlWhereConditions){
                $sqlWhereConditions.= self::AND_;
            }
            $sqlWhereConditions.= self::TABLE_LABLE.".professional_id = '".$data->professionalId."'";

        }

        if($sqlWhereConditions)
        {
            $SQL.=' ( '.$sqlWhereConditions.' ) ';
        }

        $rows = R::getAll($SQL);
        $users = R::convertToBeans('tbluser',$rows);
        if($data->playDays){
            foreach ($users as $key => $user)
            {
                if(!$this->_checkUserPlayingDays($data,$user))
                {
                    unset($users[$key]);
                }
            }
        }
        return $users;
    }

    private function _checkUserPlayingDays($data,$user)
    {
        $UserPlanModel = Factory::ModelFactory('user/UserPlanModel');
        $UserPlan = $UserPlanModel->getUserPlanByUserId($user->id);
        if($UserPlan->id == 0){return true;}
        $methodName = "playInrange".$data->playDays;
        if($UserPlan->{$methodName})
        {
            return false;
        }
        if($data->startPlay)
        {
            $methodName = "range".$data->playDays."Min";
            if($data->startPlay < $UserPlan->{$methodName})
            {
                return false;
            }
        }
        if($data->endPlay)
        {
            $methodName = "range".$data->playDays."Max";
            if($data->endPlay > $UserPlan->{$methodName})
            {
                return false;
            }
        }
        return true;
    }



    public function setParametr($data,$userId){
        $user = R::load('tbluser',$userId);
        $user->{$data->column} = $data->value;
        R::store($user);
    }

    public function getUsersByQuery($QUERY,$userId){
        $QUERY_CAP = ucfirst($QUERY);
        $QUERY_MIN = strtolower($QUERY);
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." 
                WHERE ".self::TABLE_LABLE.".name LIKE '%$QUERY%' OR
                ".self::TABLE_LABLE.".name LIKE '%$QUERY_CAP%' OR
                ".self::TABLE_LABLE.".name LIKE '%$QUERY_MIN%' OR
                ".self::TABLE_LABLE.".surname LIKE '%$QUERY%' OR
                ".self::TABLE_LABLE.".surname LIKE '%$QUERY_CAP%' OR
                ".self::TABLE_LABLE.".surname LIKE '%$QUERY_MIN%' AND
                NOT ".self::TABLE_LABLE.".id='$userId'"
        ;
        $rows = R::getAll($SQL);
        $users = R::convertToBeans(self::TABLE_LABLE,$rows);
        $users = $this->deleteEmptyElement($users);
        if(empty($users)){return false;}
        return $users;
    }



    private function  _getUserOptions($user){
        if(!is_null($user->cityId) ){
            $CityModel = Factory::ModelFactory('city/CityModel');
            $user->cityId = $CityModel->getCityById($user->cityId);
        }
        if(!is_null($user->tshortSizeId)){
            $TShortSizeModel = Factory::ModelFactory('options/TShortSizeModel');
            $user->tshortSizeId =  $TShortSizeModel->getById($user->tshortSizeId);
        }

        if(!is_null($user->handId)){
            $HandModel = Factory::ModelFactory('options/HandModel');
            $user->handId =  $HandModel->getById($user->handId);
        }

        if(!is_null($user->professionalId)){
            $ProfessionalSkillsModel = Factory::ModelFactory('options/ProfessionalSkillsModel');
            $user->professionalId =  $ProfessionalSkillsModel->getById($user->professionalId);
        }
        //print_r($user->professionalId);

        if(!is_null($user->levelId)){
            $GameLevelModel = Factory::ModelFactory('options/GameLevelModel');
            $user->levelId =  $GameLevelModel->getById($user->levelId);
        }
        return $user;
    }

    
}