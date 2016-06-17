<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 17.06.16
 * Time: 01:31
 */
class RequiredRoutes
{
    public $_REQUIRED;
    public function __construct(){

    }

    public function setREQUIRED($FilePath){
        if(!isset($this->_REQUIRED[$FilePath])){
            require $FilePath;
            $this->_REQUIRED[$FilePath] = true;
        }
    }




}