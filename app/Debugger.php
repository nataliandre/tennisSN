<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 17.07.16
 * Time: 23:33
 */
class Debugger
{
    public static function run($value,$var_dump = false)
    {
        echo '<pre>';
        if($var_dump)
        {
            var_dump($value);
        }
        else
        {
            print_r($value);
        }
        echo '</pre>';
        die;
    }
}