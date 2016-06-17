<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 17.06.16
 * Time: 00:19
 */
class Factory
{

    public static function ModelFactory($filePath){
        $FullFilePath = 'model/'.$filePath.'.php';
        $GLOBALS['REQUIRED']->setREQUIRED($FullFilePath);
        $model = explode('/',$filePath);
        $class = end($model);
        return new $class();
    }

}