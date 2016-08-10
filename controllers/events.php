<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 12.07.16
 * Time: 12:47
 */
class events extends Controller
{
    public function __construct() {
        parent::__construct();
    }


    public function view()
    {
       
        
        $this->setOutput('events/index.tpl');
    }



}