<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 06.08.16
 * Time: 17:08
 */
class Config
{

    private $_Config = null;


    public function __construct($filepath)
    {
        $StringFileContains = file_get_contents($filepath);
        $this->_Config = json_decode($StringFileContains);
    }

    public function __call($name, $arguments)
    {
        return $this->_Config->{$name};
    }


}