<?php
/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 09.06.16
 * Time: 23:01
 */
class Registration extends Controller{
    public function  __construct() {
        parent::__construct();
    }
    public function start(){
        


        $this->setOutput('registration/start.tpl');
    }
    public function checkOut(){
        $this->setOutput('registration/checkOut.tpl');
    }
    public function addPhoto(){
        $this->setOutput('registration/addPhoto.tpl');
    }
    public function otherInfo(){
        $this->setOutput('registration/otherInfo.tpl');
    }
}