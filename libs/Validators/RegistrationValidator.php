<?php

/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 15.06.16
 * Time: 10:45
 */
class RegistrationValidator
{
    public function __construct()
    {
        
    }
    
    public static function validateDataFirstStep($data){
        $validateErrors = "";
        if($data->phone == ""){
            $Informer = new Informer(ErrorsDetector::errorEmptyFieldValue("телефон"));
            $validateErrors = $Informer->getErrorMessage();
        }
        if($data->surname == ""){
            $Informer = new Informer(ErrorsDetector::errorEmptyFieldValue("фамилия"));
            $validateErrors = $Informer->getErrorMessage();
        }
        if($data->name == ""){
            $Informer = new Informer(ErrorsDetector::errorEmptyFieldValue("имя"));
            $validateErrors = $Informer->getErrorMessage();
        }
        if($data->email == "" || !filter_var($data->email, FILTER_VALIDATE_EMAIL)){
            $Informer = new Informer(ErrorsDetector::errorInvalidEmail());
            $validateErrors = $Informer->getErrorMessage();
        }
        if($validateErrors == ""){
            return false;
        }else{
            return $validateErrors;
        }
    }


    public static function validateDataSecondStep($data){
        $validateErrors ="";
        if($data->passwd1 != $data->passwd2){
            $Informer = new Informer(ErrorsDetector::errorPasswordDontMatch());
            $validateErrors = $Informer->getErrorMessage();
        }
        if(strlen($data->passwd1)<6){
            $Informer = new Informer(ErrorsDetector::errorPasswordIsShort());
            $validateErrors = $Informer->getErrorMessage();
        }
        if(md5($data->confirmCode) != $data->activationCodeSession){
            $Informer = new Informer(ErrorsDetector::errorActivationCodeDontMatch());
            $validateErrors = $Informer->getErrorMessage();
        }
        if($validateErrors == ""){
            return false;
        }else{
            return $validateErrors;
        }
    }


}