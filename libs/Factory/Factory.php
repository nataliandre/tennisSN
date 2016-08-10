<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 17.06.16
 * Time: 00:19
 */
class Factory
{

    const HELPERS_DIR = 'app/Helpers/';

    const TranslationJSONExtensions = '.json';

    public static function ModelFactory($filePath){
        $FullFilePath = 'model/'.$filePath.'.php';
        $GLOBALS['REQUIRED']->setREQUIRED($FullFilePath);
        $model = explode('/',$filePath);
        $class = end($model);
        return new $class();
    }


    public static function ValidatorsFactory($filePath){
        $FullFilePath = 'libs/Validators/'.$filePath.'.php';
        $GLOBALS['REQUIRED']->setREQUIRED($FullFilePath);
        $model = explode('/',$filePath);
        $class = end($model);
        return new $class();
    }

    public static function FiltersFactory($filePath){
        $FullFilePath = 'libs/Filters/'.$filePath.'.php';
        $GLOBALS['REQUIRED']->setREQUIRED($FullFilePath);
        $model = explode('/',$filePath);
        $class = end($model);
        return new $class();
    }

    public static function HTMLGeneratorFactory($filePath,$params = false){
        $FullFilePath = 'libs/HTML/'.$filePath.'.php';
        $GLOBALS['REQUIRED']->setREQUIRED($FullFilePath);
        $model = explode('/',$filePath);
        $class = end($model);
        if($params){
            return new $class($params);
        }
        return new $class();
    }

    public static function TranslationJSONFactory($filePath)
    {
        $FullFilePath = 'translation/'.$filePath.self::TranslationJSONExtensions;
        $TranslationContent = file_get_contents($FullFilePath);
        $TranslationObject = json_decode($TranslationContent);
        return $TranslationObject;
    }

    public static function HelpersFactory($filePath,$FactoryMethod = false)
    {
        $FullFilePath = self::HELPERS_DIR.$filePath.'.php';
        $GLOBALS['REQUIRED']->setREQUIRED($FullFilePath);
        if($FactoryMethod == 'NoStatic')
        {
            $helper = explode('/',$filePath);
            $class = end($helper);
            return new $class();
        }
    }

}