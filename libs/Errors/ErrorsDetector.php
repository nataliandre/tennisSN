<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 14.06.16
 * Time: 20:25
 */
class ErrorsDetector
{
    public static function errorCantGetDataFromBase(){
        return 'В базе нет такой записи';
    }

    public static function errorEmailAlreadyExist(){
        return 'Пользователь с таким email уже сущетвует';
    }

    public static function errorGamesResultsAlreadyExist()
    {
        return 'Результат к зтой игре уже заполнено';
    }

    public static function errorInvalidEmail(){
        return 'Email не верний';
    }
    public static function errorEmptyFieldValue($sField){
        return 'Пустое значение поля '.$sField;
    }

    public static function errorActivationCodeDontMatch(){
        return 'Код активации не верний';
    }

    public static function errorPasswordDontMatch(){
        return 'Пароли не совпадают';
    }

    public static function errorPasswordIsShort(){
        return 'Пароль должен бить длиннее 6 символов';
    }

    public static function errorFileNotUploaded(){
        return 'Ошибка загрузки файла';
    }

    public  static function errorNotAllowedExternsion(){
        return 'Неверное расширение файла';
    }

    public static function errorCroppingFileUploaded(){
        return 'Ошибка обрезки изображения';
    }


}