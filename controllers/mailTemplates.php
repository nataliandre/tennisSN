<?php
class mailTemplates extends Controller{
    private $_routeMailTplFolder = 'mailTemplates/';
    public function __construct()
    {
        parent::__construct();
        if($this->bEmptyPostData()){
            echo 'Permission denied';
            die;
        }

    }

    public function confirmRegistration(){
        $this->settings['data'] = $this->oGetRequestObject();
        $this->_setMailTemplate('confirmRegistration');
    }

    /**
     * @param $nameMailTemplate string
     */
    private function _setMailTemplate($nameMailTemplate){
        $this->setOutput($this->_routeMailTplFolder.$nameMailTemplate.'.tpl');
    }


}