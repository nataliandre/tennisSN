<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 12.06.16
 * Time: 14:06
 */
class Person extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function view($id){
        $this->modelLoad('user/UserModel');
        $this->settings['user'] = $this->model->getUserFromId($id);

        
        if($this->settings['user']->id == 0){
            $this->setOutput('person/404.tpl');
        }else {
            $this->setOutput('person/view.tpl');
        }
    }
}