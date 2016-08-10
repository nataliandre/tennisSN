<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 18.06.16
 * Time: 17:24
 */
class FormAddValidator
{


    public function __construct()
    {
    }

    public function validateClubAddForm($data){
        $validateErrors = "";
        if($data->info == ""){
            $Informer = new Informer(ErrorsDetector::errorEmptyFieldValue("Информацыя"));
            $validateErrors = $Informer->getErrorMessage();
        }
        if($data->location == ""){
            $Informer = new Informer(ErrorsDetector::errorEmptyFieldValue("Расположение"));
            $validateErrors = $Informer->getErrorMessage();
        }
        if($data->title == ""){
            $Informer = new Informer(ErrorsDetector::errorEmptyFieldValue("Название клуба"));
            $validateErrors = $Informer->getErrorMessage();
        }

        if($validateErrors == ""){
            return false;
        }else{
            return $validateErrors;
        }
    }

    public function validateTournamentAddForm($data){
        $validateErrors = "";
        if($data->info == ""){
            $Informer = new Informer(ErrorsDetector::errorEmptyFieldValue("Информацыя"));
            $validateErrors = $Informer->getErrorMessage();
        }
        if($data->startDate == ""){
            $Informer = new Informer("Укажимте дату начала турнира");
            $validateErrors = $Informer->getErrorMessage();
        }
        if($data->endDate == ""){
            $Informer = new Informer("Укажимте дату окончания турнира");
            $validateErrors = $Informer->getErrorMessage();
        }
        if($data->countPlayers == "") {
            $Informer = new Informer(ErrorsDetector::errorEmptyFieldValue("К-во игроков"));
            $validateErrors = $Informer->getErrorMessage();
        }else {
            if ($data->countPlayers > 32) {
                $Informer = new Informer("Максимальное количество игроков - 32");
                $validateErrors = $Informer->getErrorMessage();
            }
            if ($data->countPlayers < 2) {
                $Informer = new Informer("Минимальное количество игроков - 2");
                $validateErrors = $Informer->getErrorMessage();
            }
        }
        if($data->location == ""){
            $Informer = new Informer(ErrorsDetector::errorEmptyFieldValue("Расположение"));
            $validateErrors = $Informer->getErrorMessage();
        }
        if($data->title == ""){
            $Informer = new Informer(ErrorsDetector::errorEmptyFieldValue("Название клуба"));
            $validateErrors = $Informer->getErrorMessage();
        }



        if($validateErrors == ""){
            return false;
        }else{
            return $validateErrors;
        }
    }

}