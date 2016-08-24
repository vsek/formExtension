<?php

namespace App\Form;

use \Nette\Utils\Html;
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
        $container = Html::el()->addHtml(parent::getControl());
        $javascript = Html::el();
        $javascript->setHtml('<script type="text/javascript">'
                . '$(document).ready(function(){'
                    . '$("#' . $this->getHtmlId() . '").datepicker({'
                        . 'dateFormat: "' . $this->formatUi . '"'
                    . '});'
                . '});'
                . '</script>');

        $container->addHtml($javascript);
        
        return $container;
    }
    
    public function setValue($value) {
        if($value instanceof DateTime){
            $value = $value->format($this->format);
        }
        parent::setValue($value);
    }
}
