<?php

/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 15.06.16
 * Time: 10:45
 */
class RegistarationValidator
{
    public function __construct()
    {
        
    }
    
    public static function validateDataFirstStep($data){
        $validateErrors = "";
        if($data->email == "" || filter_var($data->email, FILTER_VALIDATE_EMAIL)){
            $Informer = new Informer("Email не верний");
            $validateErrors = $Informer->getErrorMessage();
        }
        if($data->name == ""){
            $Informer = new Informer("Некоректное имя");
            $validateErrors = $Informer->getErrorMessage();
        }
        if($data->surname == ""){
            $Informer = new Informer("Некоректная фамилия");
            $validateErrors = $Informer->getErrorMessage();
        }
        if($data->phone == ""){
            $Informer = new Informer("Некоректнинй телефон");
            $validateErrors = $Informer->getErrorMessage();
        }
        if($validateErrors == ""){
            return false;
        }else{
            return $validateErrors;
        }
    }


}