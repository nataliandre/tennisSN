<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 17.07.16
 * Time: 18:10
 */
class UserPlanHelper
{

    
    public static function convertUserPlanToArray($UserPlan)
    {
        $UserPlanTitlesRU = self::getDaysInWeekRu();

        $UserPlanTitles = self::getDaysInWeek();


        $UserPlanArray = array();
        foreach ($UserPlanTitles as $key => $value)
        {
            $UserPlanNode = array();
            $UserPlanNode['title'] = $UserPlanTitlesRU[$key];
            $MaxMethodName = 'range'.$value.'Max';
            $UserPlanNode['maxValue'] = current(explode('.',$UserPlan->{$MaxMethodName})).':00';
            $MinMethodName = 'range'.$value.'Min';
            $UserPlanNode['minValue'] = current(explode('.',$UserPlan->{$MinMethodName})).':00';
            $PlayDayMethodName = 'playInrange'.$value;
            $UserPlanNode['playDay'] = $UserPlan->{$PlayDayMethodName};
            $UserPlanArray[] = (object)$UserPlanNode;
        }
        return $UserPlanArray;
    }


    public static function getDaysInWeekRu()
    {
        return [
            'Понедельник', 'Вторник',
            'Середа', 'Четверг',
            'Пятница', 'Субота',
            'Воскресенье'
        ];
    }

    public static function getDaysInWeek()
    {
        return [
            'Monday', 'Tuesday',
            'Wednesday', 'Thursday',
            'Friday', 'Saturday',
            'Sunday'
        ];
    }


}