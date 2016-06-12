<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 11.06.16
 * Time: 12:27
 */
class Informer
{
    private $_sMessage = '';
    private $_sErrorInformer = 'Ошибка!';
    private $_sSuccessInformer = 'Информация: ';
    private $_sWarningInformer = 'Внимание!';
    public function __construct($sMessage) {
        $this->_sMessage = $sMessage;
    }

    /**
     * @return string
     */
    public function getErrorMessage(){
        return $this->_generateInformerTemplate('alert-danger',$this->_sMessage,$this->_sErrorInformer);
    }

    /**
     * @return string
     */
    public function getWarningMessage(){
        return $this->_generateInformerTemplate('alert-warning',$this->_sMessage,$this->_sWarningInformer);
    }

    /**
     * @return string
     */
    public function getSuccessMessage(){
        return $this->_generateInformerTemplate('alert-success',$this->_sMessage,$this->_sSuccessInformer);
    }

    /**
     * @param $sType
     * @param $sMessage
     * @param $sInformer
     * @return string
     */
    private function _generateInformerTemplate($sType,$sMessage,$sInformer){
        $message = '<div class="alert '.$sType.'">';
        $message.= '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
        $message.= '<strong>'.$sInformer.'</strong> ';
        $message.= $sMessage;
        $message.= '</div>';
        return $message;
    }

}