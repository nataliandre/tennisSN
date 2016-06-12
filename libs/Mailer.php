<?php

/**
 * Created by PhpStorm.
 * User: andrijmoroz
 * Date: 10.06.16
 * Time: 00:40
 */
class Mailer
{
    private $_sHolder = 'tennistest@webstudiomandarin.com';
    private $_sAdresant;
    private $_sSubject;
    private $_tplBody;

    /**
     * Mailer constructor.
     * @param $sAdresant
     * @param $sSubject
     * @param $tplBody
     */
    public function __construct($sAdresant,$sSubject,$tplBody){
        $this->_sAdresant = $sAdresant;
        $this->_sSubject = $sSubject;
        $this->_tplBody = $tplBody;
    }

    /**
     * send email
     */
    public function send(){
        $sTo = $this->_sAdresant;
        $sFrom = $this->_sHolder;
        $sMessage = $this->_tplBody;
        $sSubject = "=?utf-8?B?".base64_encode($this->_sSubject)."?=".$this->_sSubject;
        $sHeaders = "From: $sFrom\r\nReply-to: $sFrom\r\nContent-type: text/html; charset=utf-8";
        mail($sTo, $sSubject, $sMessage, $sHeaders);
    }

}