<?php

/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 15.06.16
 * Time: 14:31
 */
class Build extends Controller
{
    public function  __construct() {
        parent::__construct();
        $this->settings['classBodyCss'] = 'bg__tennis__image';

    }



    public function buildCities(){
        $CitiesArray = ['Киев','Харьков',"Одесса","Львов"];
        $CitiesModel = $this->modelLoadToVar('city/CityModel');
        foreach ($CitiesArray as $item){
            $CitiesModel->addNewCity($item);
        }
        print_r($CitiesModel->getAllCities);
    }
}