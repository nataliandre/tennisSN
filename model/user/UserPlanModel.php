<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 17.07.16
 * Time: 12:27
 */
class UserPlanModel
{
    const TABLE_LABLE = 'tbluserplan';

    public function saveUserPlan($data,$userId)
    {
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." WHERE user_id=\"$userId\"";
        $rows =  R::getAll($SQL);
        $UserPlan = R::convertToBean(self::TABLE_LABLE,$rows[0]);
        if($UserPlan->id == 0){ $UserPlan = R::dispense(self::TABLE_LABLE);}
        $UserPlan->userId =  $userId;
        $UserPlan->rangeMondayMin = $data->rangeMondayMin;
        $UserPlan->rangeMondayMax = $data->rangeMondayMax;
        $UserPlan->playInrangeMonday = $data->playInrangeMonday;
        

        $UserPlan->rangeTuesdayMin = $data->rangeTuesdayMin;
        $UserPlan->rangeTuesdayMax = $data->rangeTuesdayMax;
        $UserPlan->playInrangeTuesday = $data->playInrangeTuesday;

        $UserPlan->rangeWednesdayMin = $data->rangeWednesdayMin;
        $UserPlan->rangeWednesdayMax = $data->rangeWednesdayMax;
        $UserPlan->playInrangeWednesday = $data->playInrangeWednesday;

        $UserPlan->rangeThursdayMin = $data->rangeThursdayMin;
        $UserPlan->rangeThursdayMax = $data->rangeThursdayMax;
        $UserPlan->playInrangeThursday = $data->playInrangeThursday;

        $UserPlan->rangeFridayMin = $data->rangeFridayMin;
        $UserPlan->rangeFridayMax = $data->rangeFridayMax;
        $UserPlan->playInrangeFriday = $data->playInrangeFriday;

        $UserPlan->rangeSaturdayMin = $data->rangeSaturdayMin;
        $UserPlan->rangeSaturdayMax = $data->rangeSaturdayMax;
        $UserPlan->playInrangeSaturday = $data->playInrangeSaturday;

        $UserPlan->rangeSundayMin = $data->rangeSundayMin;
        $UserPlan->rangeSundayMax = $data->rangeSundayMax;
        $UserPlan->playInrangeSunday = $data->playInrangeSunday;

        R::store($UserPlan);

    }

    public function getUserPlanByUserId($userId)
    {
        $SQL = "SELECT * FROM ".self::TABLE_LABLE." WHERE user_id=\"$userId\"";
        $rows =  R::getAll($SQL);
        $UserPlan = R::convertToBean(self::TABLE_LABLE,$rows[0]);
        
        if($UserPlan->id == 0){return false;}
        return $UserPlan;
    }


}