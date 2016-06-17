<?php

/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 15.06.16
 * Time: 14:33
 */
class CityModel extends Model
{
    public function __construct()
    {
        
    }
    
    public function addNewCity($sTitle){
        $City = R::dispense('tblcity');
        $City->title = $sTitle;
        R::store($City);
    }

    public function getAllCities(){
        $SQL = "SELECT * FROM tblcity";
        $rows = R::getAll($SQL);
        $Cities = R::convertToBeans('tblcity', $rows);
        return $Cities;
    }

    public function trashAllCities(){
        $SQL = "SELECT * FROM tblcity";
        $rows = R::getAll($SQL);
        $Cities = R::convertToBeans('tblcity', $rows);
        foreach ($Cities as $City){
            R::trash($City);
        }
    }

}