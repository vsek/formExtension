<?php

namespace App\AdminModule;

/**
 * Description of FormAdmin
 *
 * @author Vsek
 */
class Form extends \Nette\Application\UI\Form{
    public function render(...$args){
        $renderer = $this->getRenderer();
        $renderer->wrappers['controls']['container'] = 'table class="form"';
        $renderer->wrappers['pair']['container'] = 'tr';
        $renderer->wrappers['label']['container'] = 'td';
        $renderer->wrappers['control']['container'] = 'td';
        
        parent::render(...$args);
    }
    
    /**
     * 
     * @return \App\Form\CkEditor
     */
    public function addCkEditor($name, $label = NULL, $cols = 40, $rows = 10, $type = 'all'){
        return $this[$name] = new \App\Form\CkEditor($label, $cols, $rows, $type);
    }
    
    /**
    * Adds control that allows the user to upload files.
    * @return \App\Form\Date
    */
    public function addDate($name, $label = NULL, $dateFormatUI = 'd.m.yy', $dateFormat = 'j.n.Y')
    {
           return $this[$name] = new \App\Form\Date($label, $dateFormatUI, $dateFormat);
    }
    
    /**
    * Adds control that allows the user to upload files.
    * @param  string  control name
    * @param  string  label
    * @param  bool  allows to upload multiple files
    * @return \App\Form\FileUpload
    */
    public function addUpload($name, $label = NULL, $multiple = FALSE, $onlyImage = true)
    {
           return $this[$name] = new \App\Form\FileUpload($label, $multiple, $onlyImage);
    }
}
