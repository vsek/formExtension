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
     * @return \App\Form\FormSpawEditor
     */
    public function addSpawEditor($name, $label = NULL, $cols = 40, $rows = 10, $type = 'all'){
        return $this[$name] = new \App\Form\FormSpawEditor($label, $cols, $rows, $type);
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
    * @return Nette\Forms\Controls\UploadControl
    */
    public function addUpload($name, $label = NULL, $multiple = FALSE, $onlyImage = true)
    {
           return $this[$name] = new \App\Form\FileUpload($label, $multiple, $onlyImage);
    }
}