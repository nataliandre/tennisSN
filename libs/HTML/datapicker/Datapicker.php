<?php


class Datapicker
{

    public $script = false;
    public $minDateNow = false;
    public $bootstrap = false;
    public $startDate = false;
    public $name;
    public $class = '';
    public $value = '';

    public function __construct($params)
    {




        
    }

    public function setParams($params){
        $params = Functions::arrayToObject($params);
        if(isset($params->type)){
            switch ($params->type){
                //tMDB = timeMinDateBootstrap
                case 'tMDB':
                    $this->script = true;
                    $this->bootstrap = true;
                    $this->minDateNow = true;
                    break;
                //tCDB = timeCustomDateBootstrap
                case 'tCDB':
                    $this->script = true;
                    $this->bootstrap = true;
                    $this->minDateNow = false;
                    $this->startDate = $params->startDate;
                    break;
                default:
                    break;
            }
        }
        $this->name = $params->name;
        $this->id = $params->id;
        if(isset($params->class)){
            $this->class = $params->class;
        }
        if(isset($params->value)){
            $this->value = $params->value;
        }
    }

    public function make(){
        $DATAPICKER = '';
        if($this->bootstrap && $this->script){
            $DATAPICKER .= $this->_getInputBootstarapNScriptBody();
            $DATAPICKER .= $this->_getScriptMinDateNow();
        }
        return $DATAPICKER;

    }

    private function _getInputBootstarapNScriptBody(){
        $RETURN  = '<input type="text" ';
        $RETURN .= 'class="form-control ';
        $RETURN .=  $this->class;
        $RETURN .=  '" id="';
        $RETURN .=  $this->id;
        $RETURN .=  '" name="';
        $RETURN .=  $this->name;
        $RETURN .=  '" value="';
        $RETURN .=  $this->value;
        $RETURN .=   '"/>';
        return $RETURN;
    }

    private function  _getScriptMinDateNow(){
        $RETURN  = '<script>';
        $RETURN .= '$("#';
        $RETURN .= $this->id;
        $RETURN .= '").datepicker({';
        if($this->minDateNow){
            $RETURN .= 'minDate: new Date(),';
        }
        $RETURN .='startDate:';
        if(!$this->startDate){
            $RETURN .= 'new Date()';
        }
        else{
            $RETURN .= 'new Date('.$this->startDate.')';
        }
        $RETURN .= '});';
        $RETURN .= '$("#';
        $RETURN .= $this->id;
        $RETURN .= '").html(new Date());';
        $RETURN .= '</script>';
        return $RETURN;
    }

}