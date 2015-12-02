<?php

namespace App\AdminModule;

/**
 * Description of FormAdmin
 *
 * @author Vsek
 */
class Form extends \Nette\Application\UI\Form{
    public function render() {
        $renderer = $this->getRenderer();
        $renderer->wrappers['controls']['container'] = 'table class="form"';
        $renderer->wrappers['pair']['container'] = 'tr';
        $renderer->wrappers['label']['container'] = 'td';
        $renderer->wrappers['control']['container'] = 'td';
        
        parent::render();
    }
    
    /**
     * 
     * @return \App\Extensions\FormSpawEditor
     */
    public function addSpawEditor($name, $label = NULL, $cols = 40, $rows = 10, $type = 'all'){
        return $this[$name] = new \App\Form\FormSpawEditor($label, $cols, $rows, $type);
    }
    
    /**
    * Adds control that allows the user to upload files.
    * @return \App\Extensions\Date
    */
    public function addDate($name, $label = NULL, $dateFormatUI = 'd.m.yy', $dateFormat = 'j.n.Y')
    {
           return $this[$name] = new \App\Form\Date($label, $dateFormatUI, $dateFormat);
    }
}
