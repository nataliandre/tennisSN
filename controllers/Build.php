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
//
//
//    public function buildCities(){
//        $CitiesArray = ['Киев','Харьков',"Одесса","Львов"];
//        $CitiesModel = $this->modelLoadToVar('city/CityModel');
//        $CitiesModel->trashAllCities();
//        foreach ($CitiesArray as $item){
//            $CitiesModel->addNewCity($item);
//        }
//        print_r($CitiesModel->getAllCities());
//    }
//
//      public function hands(){
//            $HandsArray = ['Левая','Правая'];
//            $HandsModel = Factory::ModelFactory('options/HandModel');
//            $HandsModel->trashAll();
//            foreach ($HandsArray as $Hand){
//                $HandsModel->addNew($Hand);
//            }
//            print_r($HandsModel->getAll());
//      }
//
//        public function gameLevel(){
//             $GameLevelArray = ['5'];
//             $GameLevelModel = Factory::ModelFactory('options/GameLevelModel');
//             $GameLevelModel->trashAll();
//             foreach ($GameLevelArray as $GameLevel){
//                 $GameLevelModel->addNew($GameLevel);
//             }
//             print_r($GameLevelModel->getAll());
//        }

//          public function professionalSkills()
//          {
//              $ProfessionalSkillsArray =  ['Любитель','КМС','МС','Тренер'];
//              $ProfessionalSkillsModel =  Factory::ModelFactory('options/ProfessionalSkillsModel');
//              $ProfessionalSkillsModel->trashAll();
//              foreach ($ProfessionalSkillsArray as $PrSc){
//                  $ProfessionalSkillsModel->addNew($PrSc);
//              }
//              print_r($ProfessionalSkillsModel->getAll());
//
//
//          }

//          public function tshortSize(){
//              $TShortSizeArray = ['S','M','L','XL'];
//              $TShortSizeModel = Factory::ModelFactory('options/TShortSizeModel');
//              $TShortSizeModel->trashAll();
//              foreach ($TShortSizeArray as $TShortSize){
//                  $TShortSizeModel->addNew($TShortSize);
//              }
//              print_r($TShortSizeModel->getAll());
//          }


}