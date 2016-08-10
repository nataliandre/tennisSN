<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 19.07.16
 * Time: 16:09
 */
class GameResultHelper
{

    public $GameResults = false;

    public function __construct()
    {

    }

    public function setGameResults($GameResults)
    {
        $this->GameResults = $GameResults;
    }

    public function __call($name, $arguments)
    {
        if($this->GameResults)
        {
            return $this->GameResults->{$name};
        }
    }

    public function getParam($ParamName)
    {
        if($this->GameResults)
        {
            return $this->GameResults->{$ParamName};
        }
    }

    public function toString()
    {
        return json_encode($this->GameResults);
    }

}