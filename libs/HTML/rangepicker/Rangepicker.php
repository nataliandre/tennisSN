<?php



class Rangepicker
{
    
    public $objectId;
    public $startVal;
    public $endVal;
    public $enabled = true;



    public function __construct($Data)
    {
        if(is_object($Data)) {
            $this->objectId = $Data->objectId;
            $this->startVal = $Data->startVal;
            $this->endVal = $Data->endVal;
            if(isset($Data->enabled)){
                $this->enabled = $Data->enabled;
            }

        }

    }

    /**
     * @return string
     */
    public function getScriptStructure()
    {
        $BODY  = '<script>';
        $BODY .= 'var '.$this->objectId.' =  document.getElementById(\''.$this->objectId.'\');';

        $BODY .= 'noUiSlider.create('.$this->objectId.', {';
        $BODY .= 'start: ['.$this->startVal.','.$this->endVal.'],';
        $BODY .= 'connect: true,
                  snap: true,';
        $BODY .= 'tooltips: [ true,true],';
        $BODY .= ' range: { \'min\': [ 4 ],';
        $percent = 5;
        for($i = 5;$i <= 24;$i++){
            $BODY .= '\''.$percent.'%\' : ['.$i.'],';
            $percent+=5;
        }
        $BODY .= '\'max\': [ 24 ]}';
        $BODY .= '}); ';
        if(!$this->enabled)
        {
            $BODY .= $this->objectId . '.setAttribute(\'disabled\', true);';
        }
        $BODY .= $this->objectId . '.noUiSlider.on(\'update\', function( values, handle ){';
        $BODY .= '$(".input'.$this->objectId.'[data-handler=\""+handle+"\"]").val(values[handle]);';
        $BODY .= '});';
        $BODY .= '</script>';
        return $BODY;
    }

    public function getDivObject()
    {
        return '<div id="'.$this->objectId.'"></div>';
    }

    public function setInputHandlers()
    {
        $BODY  = '<input type="hidden" value="'.$this->startVal.'" name="'.$this->objectId.'Min" data-handler="0" class="input'.$this->objectId.'" />';
        $BODY .= '<input type="hidden" value="'.$this->endVal.'" name="'.$this->objectId.'Max" data-handler="1" class="input'.$this->objectId.'" />';
        return $BODY;
    }

    public function initializeDisableFunction()
    {
        $BODY = '<script>';
        $BODY.= 'function toggle ( element ){
	                if ( this.checked ) {
		                element.setAttribute(\'disabled\', true);
	                } else {
		                element.removeAttribute(\'disabled\');
	                }
                }';
        $BODY.= '</script>';
        return $BODY;
    }


    public function getDisabler()
    {

        $BODY  = '<input type="checkbox" value="1" id="checkbox'.$this->objectId.'"';
        if(!$this->enabled){
             $BODY .= ' checked ';
        }
        $BODY .= ' name="playIn'.$this->objectId.'"/>';

        return $BODY;
    }


    public function getDisablerScript()
    {
        $BODY  = '<script>';
        $BODY .= 'document.getElementById(\'checkbox'.$this->objectId.'\').addEventListener(\'click\', function(){
	                    toggle.call(this, '.$this->objectId.');
                  });';
        $BODY.= '</script>';
        return $BODY;
    }









}