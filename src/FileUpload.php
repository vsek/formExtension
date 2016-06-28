<?php

namespace App\Form;

use \Nette\Utils\Html;

/**
 * Description of FileUpload
 *
 * @author Vsek
 */
class FileUpload extends \Nette\Forms\Controls\TextInput{
    
    private $imageOnly = true;
    private $buttonText = 'Select file';
    private $multiple = false;
    
    /**
     * Nastavi text tlacitka
     * @param string $buttonText
     */
    public function setButtonText($buttonText){
        $this->buttonText = $buttonText;
    }
    
    public function __construct($label = NULL, $multiple = false, $imageOnly = true) {
        parent::__construct($label);
        
        $this->imageOnly = $imageOnly;
        $this->multiple = $multiple;
    }
    
    public function getControl() {
        $input = parent::getControl();
        $input->class = 'hidden';
        
        //$input = Html::el('input')->id($this->getHtmlId() . '_file');

        $timestamp = time();
        $input->timestamp($timestamp);
        $input->token(md5('unique_salt' . $timestamp));
        $input->upload($this->imageOnly ? '/js/uploadifive/uploadifive-image-only.php' : '/js/uploadifive/uploadifive.php');
        $input->buttonText($this->buttonText);
        $input->multi($this->multiple ? 'true' : 'false');
        $input->class('uploadifive');

        $control = Html::el()->addHtml($input);
        
        //edit - zobrazim obrazek
        if($this->getValue() != ''){
            if(!$this->multiple){
                if($this->imageOnly){
                    $image = Html::el('img')->src($this->getParent()->getParent()->link('Image:preview', $this->getValue(), 100, 100));
                    $image->class('deafultValue');
                    $control->addHtml($image);
                }else{
                    $link = Html::el('a')->href('/images/upload/' . substr($this->getValue(), 0, 4) . '/' . $this->getValue())->setText($this->getValue());
                    $link->class('deafultValue');
                    $control->addHtml($link);
                }
            }else{
                
            }
        }
        if(!$this->isRequired() && $this->getValue() != null){
            $delete = Html::el('a')->class('delete button1')->setText($this->getForm()->getPresenter()->translator->translate('admin.grid.delete'))->href('#');
            $control->addHtml($delete);
        }
        
        return $control;
    }
    
    public function getValue() {
        $value = parent::getValue();
        if($this->multiple){
            $images = array();
            foreach(explode(',', $value) as $img){
                if($img != ''){
                    $images[] = $img;
                }
            }
            return $images;
        }else{
            return $value;
        }
    }
}
