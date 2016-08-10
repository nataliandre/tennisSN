<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 22.06.16
 * Time: 23:47
 */
class HTMLGenerator
{
    
    public static function datapickerGenerator($params){
        $Datapicker = Factory::HTMLGeneratorFactory('datapicker/Datapicker');
        $Datapicker->setParams($params);
        return $Datapicker->make();
    }

    public static function rengepickerGenerator($params){
        $Rangepicker = Factory::HTMLGeneratorFactory('rangepicker/Rangepicker',$params);
        return $Rangepicker;
    }
    

}