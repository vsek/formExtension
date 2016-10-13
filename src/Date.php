<?php

namespace App\Form;

use Nette\Utils\DateTime;

/**
 * Description of Date
 *
 * @author Vsek
 */
class Date extends \Nette\Forms\Controls\TextInput{
    
    private $formatUi;
    private $format;
    
    public function __construct($label = NULL, $formatUI = 'd.m.yy', $format = 'j.n.Y') {
        parent::__construct($label);
        $this->format = $format;
        $this->formatUi = $formatUI;
    }
    
    public function getControl() {
        return parent::getControl()->class('jqueryuiDate')->dateFormat($this->formatUi);
    }
    
    public function setValue($value) {
        if($value instanceof DateTime){
            $value = $value->format($this->format);
        }
        parent::setValue($value);
    }
}
