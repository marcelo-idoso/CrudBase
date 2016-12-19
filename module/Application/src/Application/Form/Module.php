<?php

namespace Application\Form;

use Base\Form\AbstractForm;
use Application\Form\Filter\ModuleFilter;

class Module extends AbstractForm{
    
    public function __construct() {
        parent::__construct('Module');
        $filter = new ModuleFilter();
        $this->setInputFilter($filter->getInputFilter());
        
        $this->add(array(
            'name' => 'nome',
            'type' => 'Text',
            'options' => array(
                'label' => 'Nome:'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            )
        ));
        
       
        
    }
}
